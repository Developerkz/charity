<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Ребенки | CharityWishTree.com </title>

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

		<!-- Block Title -->
		<h1 class="cntr theme-title"><i class="icon-people"></i> Ребенки</h1>

		<?php if(count($children) == 0): ?>
			<p class="pd30 cntr gray-text">Список пуст</p>
		<?php endif;?>

		<div class="row cntr">
		<?php $i=0; foreach($children as $child): $i++;?>
				<?php include(P."html/child/child-item.php"); ?>
				<?php if($i%4 == 0): ?></div><div class="row cntr"><?php endif; ?>
		<?php endforeach; ?>
		</div>

		<div class="clear"></div>

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