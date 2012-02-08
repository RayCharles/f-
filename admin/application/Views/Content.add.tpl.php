<form action="<?= site_url();?>/admin/Content/addContentAJAX/" method="POST"
	autocomplete="off" id="content_form"
>
	<fieldset>
		<label><?=ucwords($lang['add_contents']);?></label>
		<fieldset>
			<section>
				<label><?= ucwords($lang['title']);?></label>
				<div>
					<input type="text" class="text" name="content_title" id="content_title"
						placeholder="<?= ucwords($lang['title']);?>" required
					/> <input type="hidden" name="content_author" value="<?= $user[0]->user_id;?>" />
				</div>
			</section>
		</fieldset>
		<fieldset>
			<section>
				<label><?= ucwords($lang['content']);?></label>
				<div>
					<textarea class="html" id="content_content" name="content" rows="10" cols="55"
						placeholder="<?= ucwords($lang['content']);?> " required
					></textarea>
				</div>
			</section>
		</fieldset>
		<fieldset>
			<section>
				<label><?= ucwords($lang['tags']);?></label>
				<div>
					<input type="text" class="text" name="tags" id="tags"
						placeholder="<?= ucwords($lang['tags']);?>"
					/> <span><?= ucwords($lang['separate_tags']);?></span>
				</div>
			</section>
			<section>
				<label><?=ucwords($lang['categories']);?></label>
				<div id="categories">
						<? foreach(Functions::get_all_cats() as $cat) :?>
						<input type="checkbox" class="checkbox" id="<?= $cat->Slug;?>" name="cats[]"
						value="<?= $cat->idCategories;?>"
					> <span><?= $cat->Name;?></span>
						<? endforeach;?>
					</div>
				<a href="#" id="add_category">+<?=ucwords($lang['add_a_cat']);?></a>
				<div id="add_category_" style="display: none;">
					<input type="text" id="new_category" value=""
						placeholder="<?= ucwords($lang['new_cat']);?>" disabled="true"
					/> <a href="#" id="save_cat"><?= ucwords($lang['save_a_cat']);?></a><a href="#"
						id="save_cat_cancel"
					><?= ucwords($lang['cancel']);?></a>
				</div>
			</section>
		</fieldset>
		<fieldset>
			<section>
				<div>
					<input type="hidden" name="content_status" id="content_status" value="0" />
					<?=ucwords($lang['content_status']);?>: <span id="content_status_"><?= ucwords($lang[Functions::content_status()]);?></span>
					<a href="#" id="change_content_status"><?= ucwords($lang['edit']);?></a>
					<div id="change_content_status_" style="display: none;">
						<select id="content_statuses">
							<? foreach (Functions::get_all_content_statuses() as $key => $status) :?>
							<option value="<?= $key;?>"><?= ucwords($lang[$status]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_status"><?= ucwords($lang['save']);?></a>
					</div>
				</div>
				<div>
					<input type="hidden" name="content_type" id="content_type" value="0" />
					<?=ucwords($lang['content_type']);?>: <span id="content_type_"><?= ucwords($lang[Functions::content_type()]);?></span>
					<a href="#" id="change_content_type"><?= ucwords($lang['edit']);?></a>
					<div id="change_content_type_" style="display: none;">
						<select id="content_types">
							<? foreach (Functions::get_all_content_types() as $key => $type) :?>
							<option value="<?= $key;?>"><?= ucwords($lang[$type]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_type"><?= ucwords($lang['save']);?></a>
					</div>
				</div>
				<div>
					<input type="hidden" name="content_visibility" id="content_visibility" value="0" />
				<?=ucwords($lang['visibility']);?>: <span id="content_visibility_"><?= ucwords($lang[Functions::content_visibility()]);?></span>
					<a href="#" id="change_content_visibility"><?= ucwords($lang['edit']);?></a>
					<div id="change_content_visibility_" style="display: none;">
						<select id="content_visibilities">
							<? foreach (Functions::get_all_content_visibilities() as $k => $v) :?>
							<option value="<?= $k;?>"><?= ucwords($lang[$v]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_visibility"><?= ucwords($lang['save']);?></a>
					</div>
				</div>
				<button class="yellow icon i_presentation"><?=ucwords($lang['preview']);?></button>
				<button class="red small icon i_cross"><?=ucwords($lang['move_to_trash']);?></button>
				<button class="blue big icon i_tick" id="save"><?=ucwords($lang['save']);?></button>
				<button class="green big icon i_cloud_upload" id="publish"><?=ucwords($lang['publish']);?></button>
			</section>
		</fieldset>
	</fieldset>
</form>
<script type="text/javascript" src="<?= $assets;?>/js/jquery.form.js"></script>
<script type="text/javascript" src="<?= $assets;?>/js/jquery.ptags.min.js"></script>
<script>
$(document).ready(function() {

	/*CAT--------------------------------------------------------------*/
	$('#add_category').click(function(e) {
		e.preventDefault();
		$('#add_category_').show();
		$('#add_category').hide();
		$('#new_category').removeAttr("disabled");

		$('#save_cat_cancel').click(function(e) {
			e.preventDefault();
			$('#new_category').attr("disabled", "disabled");
			$('#add_category_').hide();
			$('#add_category').show();
		});

		$('#save_cat').click(function(e) {//if not empty!!!
			e.preventDefault();
			if (!$('#new_category').val()) {
				return false; //show message
			}
			$.ajax({
				  url: '<?= site_url();?>/admin/Content/newCat/',
				  type: "GET",
				  data: 'Name=' + $('#new_category').val(),
				  beforeSend: function() {$('#add_category_').hide()},
				  success: function( data ) {
					  data = $.parseJSON(data);
				    if (console && console.log){
				      console.log( 'Success', data );
				    }
				    $('#categories').append('<input type="checkbox" class="checkbox" id="' + data.Slug + '" name="cats[]" value="' + data.idCategories + '"> <span>' + data.Name + '</span>');
				    $('#new_category').attr("disabled", "disabled");
					$('#add_category').show();
					//todo: Show message
				  }
				});
		});
	});
	/*CAT END----------------------------------------------------------*/
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
	/*TOGGLES--------------------------------------------------------------*/
	$('#change_content_status').click(function(e){
		e.preventDefault();
		
		$('#change_content_status_').show();
		$('#change_content_status').hide();

		$('#save_content_status').click(function(e){
			e.preventDefault();
			$('#content_status_').html($('#content_statuses :selected').html());
			$('#change_content_status_').hide();
			$('#change_content_status').show();
			$('#content_status').val($('#content_statuses').val());
		});
	});

	$('#change_content_type').click(function(e){
		e.preventDefault();
		
		$('#change_content_type_').show();
		$('#change_content_type').hide();

		$('#save_content_type').click(function(e){
			e.preventDefault();
			$('#content_type_').html($('#content_types :selected').html());
			$('#change_content_type_').hide();
			$('#change_content_type').show($('#content_types').val());
		});
	});
	$('#change_content_visibility').click(function(e){
		e.preventDefault();
		
		$('#change_content_visibility_').show();
		$('#change_content_visibility').hide();

		$('#save_content_visibility').click(function(e){
			e.preventDefault();
			$('#content_visibility_').html($('#content_visibilities :selected').html());
			$('#change_content_visibility_').hide();
			$('#change_content_visibility').show($('#content_visibilities').val());
		});
	});
	/*TOGGLES END----------------------------------------------------------*/
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
	/*PTAGS----------------------------------------------------------------*/
	loadjscssfile("<?= $assets;?>/css/jquery.ptags.default.css", "css");
	loadjscssfile("<?= $assets;?>/css/jquery-ui-1.8.17.custom.css", "css");
	$('#tags').ptags({
	    ptags_sortable: {
	        tolerance: 'pointer',
	        handle: '.ui-ptags-tag-text'
	    }
	});
	/*PTAGS END------------------------------------------------------------*/
/*^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
	/*AJAXFORM-------------------------------------------------------------*/
    var options = { 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#content_form').ajaxForm(options); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
    alert('About to submit: \n\n' + queryString); 

    if (!$('#content_title').val() || !$('#content_content').val()) {
        alert('FALSE NOT FILLED');
        return false;
    }
 
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText, xhr, $form)  { 
    // for normal html responses, the first argument to the success callback 
    // is the XMLHttpRequest object's responseText property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'xml' then the first argument to the success callback 
    // is the XMLHttpRequest object's responseXML property 
 
    // if the ajaxForm method was passed an Options Object with the dataType 
    // property set to 'json' then the first argument to the success callback 
    // is the json data object returned by the server 
 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText);
    //window.location = "<?= site_url();?>/admin/Content/update/" + responseText; 
} 
/*AJAXFORM END-------------------------------------------------------------*/
</script>