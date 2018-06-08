<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Изменить пароль | CharityWishTree.com </title>

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

		<div class="column-8 pd20">
			<div class="form bg-white shadow my-donates" >
				<h1 class="theme-title">Изменить пароль</h1>
				
				<?php 
				if(isset($errors) AND is_array($errors)): 
					foreach($errors as $error):
						?>
							<p class="errors"><?php echo $error; ?></p>
						<?php
					endforeach;
				endif;
				?>
				<div class="row">
					<form method="POST">
						<input type="text" name="passwordo" placeholder="Старый пароль" required>
						<br><br>
						<input type="text" name="password" placeholder="Новый пароль" required>
						<input type="text" name="passwordr" placeholder="Новый пароль" required>
						<div class="cntr row">
							<button class="btn" type="submit" name="change_password">Изменить</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="column-4 pd20">
			<div class="bg-white shadow pd20">
				<div class="account-info">
					<h2 class="gray-text"><?php echo $user["name"]." ".$user["surname"]; ?></h2>
					<p class="gray-text"><?php echo $user["email"]; ?></p>
				</div>
				<div class="account-menu">
					<a href="<?php Page::uri(); ?>account"><i class="icon-login"></i> Аккаунт</a>
					<a href="<?php Page::uri(); ?>account/change-password"><i class="icon-settings"></i> Изменить пароль</a>
					<a href="<?php Page::uri(); ?>logout"><i class="icon-power"></i> Выход</a>
				</div>
			</div>
		</div>

		<div class="clear"></div>
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