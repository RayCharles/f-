	<form action="<?= site_url();?>/admin/Settings/saveAJAX/" method="POST"
		id="settings_form">
		<fieldset>
			<label><?= ucwords($lang['general']);?> <?= ucwords($lang['settings']);?></label>
			<section>
				<label><?= ucwords($language['site']);?> <?= ucwords($language['title']);?></label>
				<div>
					<input type="text" id="site_title" name="site_title" class="text"
						value="<?= $_settings['site_title']?>" required
						placeholder="<?= ucwords($language['site']);?> <?= ucwords($language['title']);?>" />
					<span><?= $lang['selectatitle'];?></span>
				</div>
			</section>
			<section>
				<label><?= ucwords($lang['admin']);?> <?= ucwords($lang['email']);?></label>
				<div>
					<input type="email" id="admin_email" name="admin_email"
						class="email" value="<?= $_settings['admin_email']?>" required
						placeholder="<?= ucwords($language['admin']);?> <?= ucwords($language['email']);?>" />
					<span><?= $lang['admin_email_info'];?></span>
				</div>
			</section>
			<section>
				<label><?= ucwords($lang['are_users_allowed_to_register']);?></label>
				<div>
					<input type="checkbox" id="allowed_to_register"
						name="allowed_to_register" class="checkbox" /> <span><?= $lang['are_users_allowed_to_register_info'];?></span>
				</div>
			</section>
			<section>
				<label><?= ucwords($lang['new_user_role']);?></label>
				<div>
					<select name="new_user_role" id="new_user_role">
						<option value="1"><?= ucwords($lang['admin']);?></option>
						<option value="2"><?= ucwords($lang['editor']);?></option>
						<option value="3"><?= ucwords($lang['author']);?></option>
						<option value="4"><?= ucwords($lang['contributor']);?></option>
						<option value="5"><?= ucwords($lang['subscriber']);?></option>
					</select>
				</div>
			</section>
			<section>
				<label><?= ucfirst($lang['date_format']);?></label>
				<div>
					<input type="text" class="text" id="date_format" name="data_format"
						value="<?= $_settings['date_format'];?>"
						placeholder="<?= ucfirst($lang['date_format']);?>" />
				</div>
			</section>
			<section>
				<div>
					<button><?= ucwords($lang['save']);?></button>
				</div>
			</section>
		</fieldset>
	</form>

