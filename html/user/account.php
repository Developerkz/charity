<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Личный кабинет | CharityWishTree.com </title>

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
			<div class="bg-white shadow my-donates" >
				<h1 class="theme-title">Мои пожертвование</h1>
				<div class="row">
					<?php if(count($donates) == 0): ?>
						<p class="gray-text">Список пуст</p>
						<div class="pd20"></div>
					<?php endif;?>
					<?php foreach($donates as $donate): ?>
						<div class="donate-item">
							<h3 class="gray-text">Пожертвование №<?php echo $donate["uniqueID"]; ?></h3>
							<p class="gray-text">
								Ребенек:
								<?php $child = Child::get($donate["childID"]); ?>
								<?php echo $child["name"]." ".$child["surname"]; ?>
							</p>
							<p class="gray-text">
								Статус:
								<?php if($donate["status"] == "0"):?>Не о<?php else: ?>О<?php endif; ?>плачен
							</p>
							<p class="gray-text">
								Сумма: 
								<?php echo $donate["total"]; ?> KZT
							</p>
							<p class="gray-text">
								Время: 
								<?php echo Date::getTime($donate["oDate"]); ?>
							</p>
						</div>
					<?php endforeach; ?>
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