<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>Дерево желаний, исполняющее мечты детей из детского дома | CharityWishTree.com </title>

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
		<h1 class="cntr theme-title"><i class="icon-docs"></i> Новости</h1>

		<div class="row">

			<?php $i = 0; foreach ($news as $newsItem): $i++; ?>
				<!-- Item -->
				<div class="column-4 pd20">
					<a href="<?php Page::uri(); ?>news/<?php echo $newsItem["url"]; ?>">
						<div class="item">
							
							<!-- Image -->
							<img src="<?php Page::uri(); Page::getNewsImage(); echo $newsItem["img"]; ?>" 
							alt="<?php echo $newsItem["title"]; ?>" title="<?php echo $newsItem["title"]; ?>">

							<!-- Title -->
							<h4 class="pd15 cntr"><?php echo $newsItem["title"]; ?></h4>

						</div>
					</a>
				</div>
				<?php if($i%3 == 0): ?></div><div class="row"><?php endif; ?>
			<?php endforeach; ?>

			
		</div>


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