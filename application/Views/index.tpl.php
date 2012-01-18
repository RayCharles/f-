<? foreach ($forum as $f) :?>
<div>
	<a href="#"><?=$f->forum_name;?></a> <span><?=$f->forum_desc;?></span>
	<div class="forum_date_created"><?=date("d, M Y", $f->forum_created);?></div>
</div>
<?endforeach;?>