<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">

<title>White Label</title>

<meta name="description" content="">


<!-- Apple iOS and Android stuff -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link rel="apple-touch-icon-precomposed" href="img/icon.png">
<link rel="apple-touch-startup-image" href="img/startup.png">
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">

<!-- Google Font and style definitions -->
<link rel="stylesheet"
	href="http://fonts.googleapis.com/css?family=PT+Sans:regular,bold">
<link rel="stylesheet" href="<?=$assets;?>/css/style.css">

<!-- include the skins (change to dark if you like) -->
<link rel="stylesheet" href="<?=$assets;?>/css/light/theme.css"
	class="theme">

<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css">
	<![endif]-->

<!-- Use Google CDN for jQuery and jQuery UI -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<!-- Loading JS Files this way is not recommended! Merge them but keep their order -->

<!-- some basic functions -->
<script src="<?=$assets;?>/js/functions.js"></script>

<!-- all Third Party Plugins -->
<script src="<?=$assets;?>/js/plugins.js"></script>

<!-- Whitelabel Plugins -->
<script src="<?=$assets;?>/js/wl_Alert.js"></script>
<script src="<?=$assets;?>/js/wl_Dialog.js"></script>
<script src="<?=$assets;?>/js/wl_Form.js"></script>

<!-- configuration to overwrite settings -->
<script src="<?=$assets;?>/js/config.js"></script>

<!-- the script which handles all the access to plugins etc... -->
<script src="<?=$assets;?>/js/login.js"></script>
</head>
<body id="login">
	<header>
		<a href="<?=site_url();?>/admin/">
			<div id="logo"></div>
		</a>
	</header>
	<section id="content">
		<form action="<?=site_url();?>/admin/User/submit/" id="loginform"
			data-ajax="false" method="post">
			<fieldset>
				<section>
					<label for="username"><?=ucwords($lang['username']);?></label>
					<div>
						<input type="text" id="username" name="username" autofocus>
					</div>
				</section>
				<section>
					<label for="password"><?=ucwords($lang['password']);?></label>
					<div>
						<input type="password" id="password" name="password">
					</div>
					<div>
						<input type="checkbox" id="remember" name="remember"><label
							for="remember" class="checkbox"><?=ucwords($lang['remember_me']);?></label>
					</div>
				</section>
				<section>
					<div>
						<button class="fr">Login</button>
					</div>
				</section>
				<section>
					<div>
						<label><a href="<?=site_url();?>/admin/User/reset/"><?=ucwords($lang['lost_password']);?> </a></label>
						<label><a href="<?=site_url();?>/admin/User/register/"><?=ucwords($lang['register']);?> </a></label>
					</div>
				</section>
			</fieldset>
		</form>
	</section>
	<footer>Copyright by xXx</footer>

</body>
</html>