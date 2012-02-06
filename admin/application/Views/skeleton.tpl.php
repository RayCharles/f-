<?

$auth = Authentication::getInstance ();
$user = $auth->get_user_data ();
?>
<html lang="en-us">
<head>
<meta charset="utf-8">

<title><?=ucwords($language['administration']);?></title>

<meta name="description" content="">
<meta name="author" content="RayCharles">

<!-- Apple iOS and Android stuff -->
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Apple iOS and Android stuff - don't remove! -->
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

<!-- Use Google CDN for jQuery and jQuery UI -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<script type="text/javascript" src="<?= $assets;?>/js/functions.js"></script>
</head>
<body>
	<li><a href="<?=site_url();?>/admin/User/logout"><?=ucwords($lang['logout']);?></a></li>
	<li><a href="#" id="wl_config"><?= $user[0]->DisplayName;?></a></li>
	<li><a href="<?= site_url();?>/admin/Settings/Index"><?=ucwords($lang['settings']);?></a></li>
	<li><a href="<?= site_url();?>/">Home</a></li>
	<h3><?= $user[0]->DisplayName;?></h3>
	<span><?= $user[0]->user_username;?></span>
	<p>
		<img
			src="http://gravatar.com/avatar/<?= md5(strtolower(trim($user[0]->user_email)));?>?d=identicon" />
	</p>
	<header> </header>


	<li class="i_house"><a href="<?=site_url();?>/admin/"
		class="<?= $IndexController;?>"><span><?=ucwords($lang['dashboard']);?></span></a></li>

	<li><a href="<?=site_url();?>/admin/Content/Index"><span><?= ucwords($lang['display_all_contents']);?></span></a></li>
	<li><a href="<?=site_url();?>/admin/Content/Add"><span><?= ucwords($lang['add_contents']);?></span></a></li>

	<li><a href="<?=site_url();?>/admin/Settings/Index"><span><?= ucwords($lang['general']);?> <?= ucwords($lang['settings']);?></span></a></li>

	<li><a href="<?=site_url();?>/admin/User/Index"><span><?= $user[0]->DisplayName;?></span></a></li>
	<li><a href="<?=site_url();?>/admin/User/all"><span><?= ucwords($lang['users']);?></span></a></li>




	<section id="content">
		<?= $main_contents;?>
		</section>
	<footer>Footer</footer>
</body>
</html>