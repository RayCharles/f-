<div class="g12 nodrop">
	<h1><?=ucwords($lang['contents']);?></h1>
</div>
<div class="g12">
	<table class="datatable">
		<thead>
			<tr>
				<th><?= ucwords($lang['title']);?></th>
				<th><?= ucwords($lang['content']);?></th>
				<th><?= ucwords($lang['author']);?></th>
				<th><?= ucwords($lang['last_time_edited']);?></th>
				<th><?= ucwords($lang['content_created']);?></th>
				<th><?= ucwords($lang['content_published']);?></th>
				<th><?= ucwords($lang['content_status']);?></th>
				<th><?= ucwords($lang['content_type']);?></th>
				<th><?= ucwords($lang['other']);?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th><?= ucwords($lang['title']);?></th>
				<th><?= ucwords($lang['content']);?></th>
				<th><?= ucwords($lang['author']);?></th>
				<th><?= ucwords($lang['last_time_edited']);?></th>
				<th><?= ucwords($lang['content_created']);?></th>
				<th><?= ucwords($lang['content_published']);?></th>
				<th><?= ucwords($lang['content_status']);?></th>
				<th><?= ucwords($lang['content_type']);?></th>
				<th><?= ucwords($lang['other']);?></th>
			</tr>
		</tfoot>
		<tbody>
			<? foreach ($contents as $content) :?>
			<? $user = User::get($content->content_author);?>
			<tr>
				<td><?= $content->content_title;?></td>
				<td><?= Functions::shorten($content->content);?></td>
				<td><?= $user->DisplayName;?></td>
				<td><?= date(Settings::get('date_format'), $content->content_edited);?></td>
				<td><?= date(Settings::get('date_format'), $content->content_created);?></td>
				<td><?= date(Settings::get('date_format'), $content->content_published);?></td>
				<td><?= ucwords($lang[Functions::content_status($content->content_status)]);?></td>
				<td><?= ucwords($lang[Functions::content_type($content->content_type)]);?></td>
				<td><?= $content->content_comments;?> "<?= $content->content_visibility; //@todo: implement icons?>"</td>
			</tr>
			<? endforeach;?>
		</tbody>
	</table>
</div>