<?

$auth = Authentication::getInstance ();
$user = $auth->get_user_data ();
?>
<html lang="en-us">
<head>
<meta charset="utf-8">

<title><?=ucwords($language['administration']);?></title>

<meta name="description" content="">
<meta name="author" content="revaxarts.com">


<!-- Google Font and style definitions -->
<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
<link rel="stylesheet" href="<?=$assets;?>/css/style.css">

<!-- include the skins (change to dark if you like) -->
<link rel="stylesheet" href="<?=$assets;?>/css/light/theme.css"
	id="themestyle">
<!-- <link rel="stylesheet" href="css/dark/theme.css" class="theme"> -->

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css">
	<![endif]-->

<!-- Apple iOS and Android stuff -->
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed"
	href="apple-touch-icon-precomposed.png">

<!-- Apple iOS and Android stuff - don't remove! -->
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

<!-- Use Google CDN for jQuery and jQuery UI -->
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<!-- Loading JS Files this way is not recommended! Merge them but keep their order -->

<!-- some basic functions -->
<script src="<?=$assets;?>/js/functions.js"></script>

<!-- all Third Party Plugins -->

<script src="<?=$assets;?>/js/plugins.js"></script>
<script src="<?=$assets;?>/js/editor.js"></script>
<script src="<?=$assets;?>/js/calendar.js"></script>
<script src="<?=$assets;?>/js/flot.js"></script>
<script src="<?=$assets;?>/js/elfinder.js"></script>
<script src="<?=$assets;?>/js/datatables.js"></script>

<!-- all Whitelabel Plugins -->

<script src="<?=$assets;?>/js/wl_Alert.js"></script>
<script src="<?=$assets;?>/js/wl_Autocomplete.js"></script>
<script src="<?=$assets;?>/js/wl_Breadcrumb.js"></script>
<script src="<?=$assets;?>/js/wl_Calendar.js"></script>
<script src="<?=$assets;?>/js/wl_Chart.js"></script>
<script src="<?=$assets;?>/js/wl_Color.js"></script>
<script src="<?=$assets;?>/js/wl_Date.js"></script>
<script src="<?=$assets;?>/js/wl_Editor.js"></script>
<script src="<?=$assets;?>/js/wl_File.js"></script>
<script src="<?=$assets;?>/js/wl_Dialog.js"></script>
<script src="<?=$assets;?>/js/wl_Fileexplorer.js"></script>
<script src="<?=$assets;?>/js/wl_Form.js"></script>
<script src="<?=$assets;?>/js/wl_Gallery.js"></script>
<script src="<?=$assets;?>/js/wl_Number.js"></script>
<script src="<?=$assets;?>/js/wl_Password.js"></script>
<script src="<?=$assets;?>/js/wl_Slider.js"></script>
<script src="<?=$assets;?>/js/wl_Store.js"></script>
<script src="<?=$assets;?>/js/wl_Time.js"></script>
<script src="<?=$assets;?>/js/wl_Valid.js"></script>
<script src="<?=$assets;?>/js/wl_Widget.js"></script>

<!-- configuration to overwrite settings -->
<script src="<?=$assets;?>/js/config.js"></script>

<!-- the script which handles all the access to plugins etc... -->
<script src="<?=$assets;?>/js/script.js"></script>
</script>


</head>
<body>
	<div id="pageoptions">
		<ul>
			<li><a href="<?=site_url();?>/admin/User/logout"><?=ucwords($lang['logout']);?></a></li>
			<li><a href="#" id="wl_config"><?= $user[0]->DisplayName;?></a></li>
			<li><a href="<?= site_url();?>/admin/Settings/Index"><?=ucwords($lang['settings']);?></a></li>
			<li><a href="<?= site_url();?>/">Home</a></li>
		</ul>
		<div>
			<h3><?= $user[0]->DisplayName;?></h3>
			<span><?= $user[0]->user_username;?></span>
			<p>
				<img
					src="http://gravatar.com/avatar/<?= md5(strtolower(trim($user[0]->user_email)));?>?d=identicon" />
			</p>
		</div>
	</div>

	<header>
		<div id="logo">
			<a href="test.html">Logo Here</a>
		</div>
		<div id="header">
			<ul id="headernav">
				<li><ul>
						<li><a href="icons.html">Icons</a><span>300+</span></li>
						<li><a href="#">Submenu</a><span>4</span>
							<ul>
								<li><a href="#">Just</a></li>
								<li><a href="#">another</a></li>
								<li><a href="#">Dropdown</a></li>
								<li><a href="#">Menu</a></li>
							</ul></li>
						<li><a href="<?= site_url();?>/admin/Settings/Index/">Settings</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="wizard.html">Wizard</a><span>Bonus</span></li>
					</ul></li>
			</ul>
			<div id="searchbox">
				<form id="searchform" action="<?= site_url();?>/admin/Search/">
					<input type="search" name="query" id="search"
						placeholder="<?=ucwords($lang['search']);?>">
				</form>
			</div>
		</div>
	</header>

	<nav>
		<ul id="nav">
			<li class="i_house"><a href="<?=site_url();?>/admin/"
				class="<?= $IndexController;?>"><span><?=ucwords($lang['dashboard']);?></span></a></li>
			<li class="i_list_images"><a class="<?= $ContentController;?>"><span><?= ucwords($lang['contents'])?></span></a>
				<ul>
					<li><a href="<?=site_url();?>/admin/Content/Index"><span><?= ucwords($lang['display_all_contents']);?></span></a></li>
				</ul></li>
			<li class="i_book"><a><span>Documentation</span></a>
				<ul>
					<li><a href="doc-alert.html"><span>Alert Boxes</span></a></li>
				</ul></li>
			<li class="i_settings"><a class="<?= $SettingsController;?>"><span><?=ucwords($lang['settings']);?></span></a>
				<ul>
					<li><a href="<?=site_url();?>/admin/Settings/Index"><span><?= ucwords($lang['general']);?> <?= ucwords($lang['settings']);?></span></a></li>
				</ul></li>
			<li class="i_user"><a class="<?= $UserController;?>"><span><?= ucwords($lang['user']);?></span></a>
				<ul>
					<li><a href="<?=site_url();?>/admin/User/Index"><span><?= $user[0]->DisplayName;?></span></a></li>
					<li><a href="<?=site_url();?>/admin/User/all"><span><?= ucwords($lang['users']);?></span></a></li>
				</ul></li>
		</ul>
	</nav>



	<section id="content">
		<?= $main_contents;?>
		</section>
	<footer>Footer</footer>
</body>
</html>