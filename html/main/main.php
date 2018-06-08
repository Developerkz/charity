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

	<!-- Slider -->

	<div class="pd20"></div>
	<?php if($slides): ?>
	<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				<?php foreach ($slides as $slide): ?>
				<li>
					<a href="<?php Page::uri(); ?><?php echo $slide["url"]; ?>" target="_self">
						<img src="<?php Page::uri();Page::getSlideImage();echo $slide["img"]; ?>" 
						alt="<?php echo $slide["title"]; ?>" title="<?php echo $slide["title"]; ?>" id="wows1_0"/>
					</a>
					<?php echo $slide["description"]; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>

	</div>	
	<div class="pd30"></div>
	<?php endif; ?>
	<!-- endSlider -->


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
				<?php if($i==8): break; endif;?>
		<?php endforeach; ?>
		</div>

		<!-- Button view all -->
		<div class="row view-all cntr pd30">
			<a class="btn" href="<?php echo Page::uri(); ?>children">Посмотреть все</a>
		</div>

	

		<div class="pd30"></div>

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
				<?php if($i == 3): break; endif; ?>
			<?php endforeach; ?>

			
		</div>


		<div class="row view-all cntr pd30">
			<a class="btn" href="<?php Page::uri(); ?>news">Все новости</a>
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