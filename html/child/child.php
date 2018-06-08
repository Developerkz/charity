<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title><?php echo $child["name"]." ".$child["surname"]; ?> | CharityWishTree.com </title>

	<meta name="keywords" content="">
	<meta name="description" content="">

</head>


<body>

<!-- get Header -->
<?php include_once(P."html/template/header.php"); ?>
<!-- end Header -->


<!-- start Content -->
<div class="content">

	<!-- Children -->
	<div class="wrapper">

		<div class="pd20"></div>

		<!-- Breadcrumps -->
		<div class="breadcrump">
			<a href="<?php Page::uri(); ?>">Главная</a>
			<i class="icon-arrow-right"></i>
			<a href="<?php Page::uri(); ?>children">Ребенки</a>
			<i class="icon-arrow-right"></i>
			<span class="gray-text"><?php echo $child["name"]." ".$child["surname"]; ?></span>
		</div>

		<div class="pd15"></div>
		<div class="row">
			<div class="column-8">
				<div class="view-item pd20">
					<img src="<?php Page::uri();Page::getChildImage();echo $child["image"]; ?>" 
					alt="<?php echo $child["name"]." ".$child["surname"]; ?>" 
					title="<?php echo $child["name"]." ".$child["surname"]; ?>">
				</div>
				<div class="view-info">
					<div class="column-3 cntr pd20">
						<div class="percentage">
							<?php echo $percentage; ?>%
						</div>
					</div>
					<div class="column-3 cntr pd20">
						<div class="donate-info">
							<p class="gray-text ftext">Помогли</p>
							<p class="donate-text"><?php echo $donate_people; ?></p>
							<p class="gray-text ftext">человек</p>
						</div>
					</div>
					<div class="column-3 cntr pd20">
						<div class="donate-info">
							<p class="gray-text ftext">Собрано</p>
							<p class="donate-text"><?php echo $donate_money; ?></p>
							<p class="gray-text ftext">KZT</p>
						</div>
					</div>
					<div class="column-3 cntr pd20">
						<div class="donate-info">
							<p class="gray-text ftext">Нужен</p>
							<p class="donate-text"><?php echo $total_money; ?></p>
							<p class="gray-text ftext">KZT</p>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="column-4">
				<div class="pd20">
					<h1 class="theme-title"><?php echo $child["name"]." ".$child["surname"]; ?></h1>
					<p class="gray-text ftext"><b>Возраст:</b> <?php echo $child["age"]; ?> лет</p>
					<p class="gray-text ftext"><b>Диагноз:</b> <?php echo $child["diagnosis"]; ?></p>
					<p class="gray-text ftext"><b>Навыки:</b> <?php echo $child["skills"]; ?></p>
					<p class="gray-text ftext"><b>Мечта:</b> <?php echo $child["wish"]; ?></p><br>
					<p class="gray-text ftext"><b>Собираемся купить:</b>
						Ссылка: 
						<a target="_blank" rel="nofollow" href="<?php echo $child["tobuy"]; ?>">
							<?php echo substr($child["tobuy"], 0,50)."..."; ?>
								
							</a>
					</p>
					<div class="pd20"></div>
					<div class="cntr pd30">
						<a class="btn" href="#modal">Пожертвовать</a>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="pd20"></div>
		<div class="row">
			<h1 class="theme-title">Список помогающих людей</h1>
			<?php if(count($donates) == 0): ?>
				<p class="gray-text">Список пуст</p>
				<br>
			<?php endif;?>
			<?php foreach ($donates as $donate): ?>
				<div class="donates">
					<div class="percentage column-2 cntr">
						<?php echo intval(($donate["total"]/$total_money)*100); ?>%
					</div>
					<div class="column-8">
						<?php $donateUser = User::getUserByEmail($donate["email"]); ?>
						<h1><?php echo $donateUser["surname"]." ".$donateUser["name"]; ?></h1>
						<p><?php echo $donate["total"]; ?> KZT</p>
					</div>
					<div class="clear"></div>
				</div> 
			<?php endforeach; ?>
		</div>
		<div class="clear"></div>

	</div>
</div>
<div class="pd30"></div>
<!-- end Content -->




<!-- get Modal -->
<div id="modal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Пожертвование</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body form">    
       	<form method="POST">
       		<?php if(!User::isAuth()): ?>
	       		<input type="text" name="name" placeholder="Имя" required>
	       		<input type="text" name="surname" placeholder="Фамилия" required>
	       		<input type="email" name="email" placeholder="Email" required>
	       		<input type="text" name="phone" placeholder="Телефон" required>
	       		<br>
	       		<br>
	       	<?php endif;?>
       		<label>Сумма(KZT)</label>
       		<input type="number" name="sum" placeholder="" required>
       		<br><br>
       		<label>Тип оплаты</label>
       		<div class="row payments">
       			<?php $i = 0; foreach($payments as $pay): $i++;?>
	       			<div class="column-6 cntr pd20">
	       				<input type="radio" id="payment<?php echo $pay["paymentID"]; ?>" 
	       				name="payment" value="<?php echo $pay["paymentID"]; ?>" 
	       				<?php if($i == 1): ?> checked <?php endif; ?>> 
	       				<label for="payment<?php echo $pay["paymentID"]; ?>">
	       					<img src="<?php Page::uri();Page::getPaymentImage();echo $pay["img"]; ?>"
	       					alt="payment<?php echo $pay["title"]; ?>" title="payment<?php echo $pay["title"]; ?>">
	       				</label>
	       			</div>
	       			<?php if($i%2 == 0): ?></div><div class="row"><?php endif; ?>
	       		<?php endforeach; ?>
       			<div class="clear"></div>
       		</div>
       		<div class="cntr">
       			<button type="submit" name="donate" class="btn">Пожертвовать</button>
       		</div>

       	</form>
      </div>
    </div>
  </div>
</div>
<!-- end Modal -->



<!-- get Footer -->
<?php include_once(P."html/template/footer.php"); ?>
<!-- end Footer -->

<!-- get JavaScripts -->
<?php include_once(P."html/template/scripts.php"); ?>
<!-- end JavaScript -->

</body>

</html>