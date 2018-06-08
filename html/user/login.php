<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Вход | CharityWishTree.com </title>

	<meta name="keywords" content="">
	<meta name="description" content="">

</head>


<body>

<!-- get Header -->
<?php include_once(P."html/template/header.php"); ?>
<!-- end Header -->


<!-- start Content -->
<div class="content">
	<div class="wrapper">
		<div class="pd20"></div>

		<div class="form bg-white shadow">
			<div class="column-6 pd20">
				<h1 class="cntr theme-title"><i class="icon-user"></i> Вход</h1>
				<?php 
				if(isset($errors) AND is_array($errors)): 
					foreach($errors as $error):
						?>
							<p class="errors"><?php echo $error; ?></p>
						<?php
					endforeach;
				endif;
				?>
				<form method="POST">
					<input type="email" name="email" required placeholder="Email" value="<?php echo $email; ?>">
					<input type="password" name="password" required placeholder="Пароль">
					<div class="row">
						<br>
						<div class="column-6">
							<input type="checkbox" name="remember" id="remember" value="iRemember"> <label for="remember">Запомнить</label>
						</div>
						<div class="column-6">
							<a style="float:right" href="<?php Page::uri(); ?>remind">Забыли пароль?</a>
						</div>
						<div class="clear"></div>
					</div>
					<div class="cntr row">
						<button class="btn" type="submit" name="user_login">Вход</button>
					</div>
				</form>
			</div>
			<div class="column-6 pd20 cntr">
				<div style="border-left:1px solid #eaeaea;">
					<div class="pd30"></div>
					<div class="pd30"></div>
					<p>У вас нет аккаунт?</p><br>
					<a class="btn" href="<?php Page::uri(); ?>register">Регистрация</a>
					<div class="pd30"></div>
					<div class="pd30"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>

		<div class="pd20"></div>
	</div>
</div>
<!-- end Content -->



<!-- get Footer -->
<?php include_once(P."html/template/footer.php"); ?>
<!-- end Footer -->

<!-- get JavaScripts -->
<?php include_once(P."html/template/scripts.php"); ?>
<!-- end JavaScript -->

</body>

</html>