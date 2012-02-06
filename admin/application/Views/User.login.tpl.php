<!doctype html>
<html lang="en-us">
<head>
<meta charset="utf-8">

<title>White Label</title>

<meta name="description" content="">


<!-- Apple iOS and Android stuff -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="viewport"
	content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">


<!-- Use Google CDN for jQuery and jQuery UI -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

</head>
<body id="login">
	<header>
		<a href="<?=site_url();?>/admin/">
			<div id="logo"></div>
		</a>
	</header>
	<section id="content">
		<form action="<?=site_url();?>/admin/User/submit/" id="loginform"
			method="post">
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