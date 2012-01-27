<div class="g12 nodrop">
	<form action="<?= site_url();?>/admin/Content/addContentAJAX/"
		method="POST" autocomplete="off" id="content_form">
		<fieldset>
			<label><?=ucwords($lang['add_contents']);?></label>
			<fieldset>
				<section>
					<label><?= ucwords($lang['title']);?></label>
					<div>
						<input type="text" class="text" name="content_title"
							id="content_title" placeholder="<?= ucwords($lang['title']);?>"
							required />
					</div>
				</section>
			</fieldset>
			<fieldset>
				<section>
					<label><?= ucwords($lang['content']);?></label>
					<div>
						<textarea class="html" id="content_content" name="content"
							rows="5" cols="2" placeholder="<?= ucwords($lang['content']);?> "
							required></textarea>
					</div>
				</section>
			</fieldset>
			<fieldset>
				<section>
					<label><?= ucwords($lang['tags']);?></label>
					<div>
						<input type="text" class="text" name="tags" id="tags"
							placeholder="<?= ucwords($lang['tags']);?>" /> <span><?= ucwords($lang['separate_tags']);?></span>
					</div>
				</section>
				<section>
					<label><?=ucwords($lang['categories']);?></label>
					<div>
						<? foreach(Functions::get_all_cats() as $cat) :?>
						<input type="checkbox" class="checkbox" id="<?= $cat->slug;?>"
							name="<?= $cat->slug;?>" value="<?= $cat->idCategories;?>"> <span><?= $cat->Name;?></span>
						<? endforeach;?>
					</div>
					<a href="#" id="add_category">+<?=ucwords($lang['add_a_cat']);?></a>
				</section>
			</fieldset>
			<fieldset>
				<section>
					<div>
						<blockquote class="custom">
					<?=ucwords($lang['content_status']);?>: <span id="content_status"><?= ucwords($lang[Functions::content_status()]);?></span>
							<p>
								<a href="#" id="change_content_status"><?= ucwords($lang['edit']);?></a>
							</p>
						</blockquote>
						<blockquote class="custom">
					<?=ucwords($lang['content_type']);?>: <span id="content_type"><?= ucwords($lang[Functions::content_type()]);?></span>
							<p>
								<a href="#" id="change_content_type"><?= ucwords($lang['edit']);?></a>
							</p>
						</blockquote>
						<blockquote class="custom">
					<?=ucwords($lang['visibility']);?>: <span id="content_type"><?= ucwords($lang[Functions::content_visibility()]);?></span>
							<p>
								<a href="#" id="change_content_type"><?= ucwords($lang['edit']);?></a>
							</p>
						</blockquote>
					</div>
				</section>
				<section>
					<div>
						<button class="yellow icon i_presentation"><?=ucwords($lang['preview']);?></button>
						<button class="red small icon i_cross"><?=ucwords($lang['move_to_trash']);?></button>
					</div>
					<div>
						<button class="blue big icon i_tick" id="save"><?=ucwords($lang['save']);?></button>
						<button class="green big icon i_cloud_upload" id="publish"><?=ucwords($lang['publish']);?></button>k
					</div>
				</section>
			</fieldset>
		</fieldset>
	</form>
</div>
<script>
$(document).ready(function() {
	$('#content_form').wl_Form({
		onSuccess: function(data, status){
			if(window.console){
				console.log(status);
				console.log(data);
			};
			$.msg(data);
		},
		onError: function(status, error, jqXHR){
			$.msg("Callback on Error\nError Status: "+status+"\nError Msg: "+error);
		}
	});
})
</script>