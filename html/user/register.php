<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Регистрация | CharityWishTree.com </title>

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
				<h1 class="cntr theme-title"><i class="icon-user"></i> Регистрация</h1>
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
					<input type="text" name="name" required placeholder="Имя" value="<?php echo $name; ?>">
					<input type="text" name="surname" required placeholder="Фамилия" value="<?php echo $surname; ?>">
					<input type="email" name="email" required placeholder="Email"  value="<?php echo $email; ?>" >
					<input type="text" name="phone" required placeholder="Телефон"  value="<?php echo $phone; ?>">
					<input type="password" name="password" required placeholder="Пароль">
					<input type="password" name="passwordr" required placeholder="Повторите пароль">
					
					<div class="cntr row">
						<button class="btn" type="submit" name="user_register">Регистрация</button>
					</div>
				</form>
			</div>
			<div class="column-6 pd20 cntr">
				<div style="border-left:1px solid #eaeaea;">
					<div class="pd30"></div>
					<div class="pd30"></div>
					<p>У вас уже есть аккаунт?</p><br>
					<a class="btn" href="<?php Page::uri(); ?>login">Вход в личный кабинет</a>
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