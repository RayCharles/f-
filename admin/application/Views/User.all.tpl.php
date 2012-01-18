<div class="g12 nodrop">
	<h1><?=ucwords($lang['users']);?></h1>
</div>
<div class="g12">
	<table class="datatable">
		<thead>
			<tr>
				<th><?= ucwords($lang['username']);?></th>
				<th><?= ucwords($lang['display_name']);?></th>
				<th><?= ucwords($lang['email']);?></th>
				<th><?= ucwords($lang['last_time_logged_in']);?></th>
				<th><?= ucwords($lang['user_status']);?></th>
				<th><?= ucwords($lang['user_registered']);?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td><?= ucwords($lang['username']);?></td>
				<td><?= ucwords($lang['display_name']);?></td>
				<td><?= ucwords($lang['email']);?></td>
				<td><?= ucwords($lang['last_time_logged_in']);?></td>
				<td><?= ucwords($lang['user_status']);?></td>
				<td><?= ucwords($lang['user_registered']);?></td>
			</tr>
		</tfoot>
		<tbody>
			<? foreach ($users as $user) :?>
				<tr>
				<td><?= $user->user_username;?></td>
				<td><?= $user->DisplayName;?></td>
				<td><?= $user->user_email;?></td>
				<td><?= date(Settings::get('date_format'), $user->user_last_login);?></td>
				<td><?= $user->user_status;?></td>
				<td><?= date(Settings::get('date_format'),$user->user_registered);?></td>
			</tr>
			<? endforeach;?>
		</tbody>
	</table>
</div>