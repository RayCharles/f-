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
					/>
					<input type="hidden" name="content_author" value="<?= $user[0]->user_id;?>" />
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
				<div>
						<? foreach(Functions::get_all_cats() as $cat) :?>
						<input type="checkbox" class="checkbox" id="<?= $cat->Slug;?>" name="cats[]"
						value="<?= $cat->idCategories;?>"
					> <span><?= $cat->Name;?></span>
						<? endforeach;?>
					</div>
				<a href="#" id="add_category">+<?=ucwords($lang['add_a_cat']);?></a>
			</section>
		</fieldset>
		<fieldset>
			<section>
					<?=ucwords($lang['content_status']);?>: <span id="content_status"><?= ucwords($lang[Functions::content_status()]);?></span>
				<a href="#" id="change_content_status"><?= ucwords($lang['edit']);?></a>
				<div id="change_content_status_" style="display: none;">
					<select id="content_statuses">
							<? foreach (Functions::get_all_content_statuses() as $status) :?>
							<option value="<?= ucwords($lang[$status]);?>"><?= ucwords($lang[$status]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_status"><?= ucwords($lang['save']);?></a>
				</div>
					<?=ucwords($lang['content_type']);?>: <span id="content_type"><?= ucwords($lang[Functions::content_type()]);?></span>
				<a href="#" id="change_content_type"><?= ucwords($lang['edit']);?></a>
				<div id="change_content_type_" style="display: none;">
					<select id="content_types">
							<? foreach (Functions::get_all_content_types() as $type) :?>
							<option value="<?= ucwords($lang[$type]);?>"><?= ucwords($lang[$type]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_type"><?= ucwords($lang['save']);?></a>
				</div>
				</blockquote>
					<?=ucwords($lang['visibility']);?>: <span id="content_visibility"><?= ucwords($lang[Functions::content_visibility()]);?></span>
				<a href="#" id="change_content_visibility"><?= ucwords($lang['edit']);?></a>
				<div id="change_content_visibility_" style="display: none;">
					<select id="content_visibilities">
							<? foreach (Functions::get_all_content_visibilities() as $v) :?>
							<option value="<?= ucwords($lang[$v]);?>"><?= ucwords($lang[$v]);?></option>
							<? endforeach;?>
						</select> <a href="#" id="save_content_visibility"><?= ucwords($lang['save']);?></a>
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
	
	/*TOGGLES--------------------------------------------------------------*/
	$('#change_content_status').click(function(e){
		e.preventDefault();
		
		$('#change_content_status_').show();
		$('#change_content_status').hide();

		$('#save_content_status').click(function(e){
			e.preventDefault();
			$('#content_status').html($('#content_statuses').val());
			$('#change_content_status_').hide();
			$('#change_content_status').show();
		});
	});

	$('#change_content_type').click(function(e){
		e.preventDefault();
		
		$('#change_content_type_').show();
		$('#change_content_type').hide();

		$('#save_content_type').click(function(e){
			e.preventDefault();
			$('#content_type').html($('#content_types').val());
			$('#change_content_type_').hide();
			$('#change_content_type').show();
		});
	});
	$('#change_content_visibility').click(function(e){
		e.preventDefault();
		
		$('#change_content_visibility_').show();
		$('#change_content_visibility').hide();

		$('#save_content_visibility').click(function(e){
			e.preventDefault();
			$('#content_visibility').html($('#content_visibilities').val());
			$('#change_content_visibility_').hide();
			$('#change_content_visibility').show();
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
 
    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        '\n\nThe output div should have already been updated with the responseText.');
    window.location = "<?= site_url();?>/admin/Content/update/" + responseText; 
} 
/*AJAXFORM END-------------------------------------------------------------*/
</script>