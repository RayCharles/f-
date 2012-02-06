
	<form action="<?= site_url();?>/admin/User/saveUserAJAX/" method="POST"
		id="settings_form">
		<fieldset>
			<legend><label><?= ucwords($lang['user']);?> <?= ucwords($lang['settings']);?></label></legend>
			<section>
				<label><?= ucwords($language['user']);?> <?= ucwords($language['displayname']);?></label>
				<div>
					<input type="text" id="DisplayName" name="DisplayName" class="text"
						value="<?= $_user->DisplayName;?>" required
						placeholder="<?= ucwords($language['user']);?> <?= ucwords($language['DisplayName']);?>" />
					<span><?= $lang['yourdisplayname'];?></span>
				</div>
			</section>
			<section>
				<label><?= ucwords($lang['your']);?> <?= ucwords($lang['email']);?></label>
				<div>
					<input type="email" id="user_email" name="user_email" class="email"
						value="<?= $_user->user_email;?>" required
						placeholder="<?= ucwords($language['your']);?> <?= ucwords($language['email']);?>" />
					<span><?= $lang['user_email_info'];?></span>
				</div>
			</section>
		</fieldset>
		<fieldset>
			<label><?= ucwords($lang['change']);?> <?= ucwords($lang['your']);?> <?= ucwords($lang['password']);?></label>
			<section>
				<label><?= ucwords($lang['your']);?> <?= ucwords($lang['new']);?> <?= ucwords($lang['password']);?></label>
				<div>
					<input type="password" id="user_passwrod" name="user_password"
						class="password" placeholder="" /> <span><?= $lang['your_new_email'];?></span>
				</div>
				<input type='hidden' name="user_id" id="user_id"
					value="<?= $_user->user_id;?>" />
			</section>
		</fieldset>
		<fieldset>
			<section>
				<div>
					<button><?= ucwords($lang['save']);?></button>
				</div>
			</section>
		</fieldset>
	</form>