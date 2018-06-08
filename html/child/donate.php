<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Пожертвование №<?php echo $id; ?> | CharityWishTree.com </title>

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
		<h1 class="theme-title">Пожертвование №<?php echo $id; ?> </h1>
		<div class="row donate pd30" >
			<div class="column-6" style="border-right: 1px solid #ccc">
				<p class="gray-text ftext"><b>ФИО:</b> <?php echo $donateUser["name"]." ".$donateUser["surname"]; ?></p>
				<p class="gray-text ftext"><b>Email:</b> <?php echo $donateUser["email"]; ?></p>
				<p class="gray-text ftext"><b>Телефон:</b> <?php echo $donateUser["phone"]; ?></p>
				<p class="gray-text ftext"><b>Время:</b> <?php echo Date::getTime($donate["oDate"]); ?></p>
				<p class="gray-text ftext"><b>Способ оплаты:</b> <?php echo $payment["title"]; ?></p>
				<p class="gray-text ftext"><b>Сумма:</b> <?php echo $donate["total"]; ?> KZT</p>

				<div class="form ">

					<form method="get" action="https://w.qiwi.ru/setInetBill_utf.do" >
					  <input name="from" value="5794" type="hidden">
					  <input name="to" value="9151111111"  type="hidden">
					  <input name="summ" value="0.01"  type="hidden">
					  <input name="com" value="test"  type="hidden">
					  <input name="iframe" value="true"  type="hidden">
					  <button type="submit" class="btn">Оплатить</button>
					 </form>
					  
				</div>

			</div>
			<div class="column-6">

						<!-- Image -->
						<img style="padding-left:20px;" class="aleft" src="<?php Page::uri();Page::getChildImage();echo $child["image"]; ?>" 
						alt="<?php echo $child["name"]." ".$child["surname"]; ?>" 
						title="<?php echo $child["name"]." ".$child["surname"]; ?>">

						<!-- Title -->
						<h3 style="padding-left:20px;" class="aleft"><?php echo $child["name"]." ".$child["surname"]; ?></h3>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>



<!-- get Footer -->
<?php include_once(P."html/template/footer.php"); ?>
<!-- end Footer -->

<!-- get JavaScripts -->
<?php include_once(P."html/template/scripts.php"); ?>
<!-- end JavaScript -->

</body>

</html>