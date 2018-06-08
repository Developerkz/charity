<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title><?php echo $newsView["title"]; ?> | CharityWishTree.com </title>

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


		<div class="row">

			<div class="column-8">
				<div class="bg-white shadow pd20">

					<!-- Title -->
					<h2 class="theme-title"><?php echo $newsView["title"]; ?></h2>

					<!-- Image -->
					<img src="<?php Page::uri(); Page::getNewsImage(); echo $newsView["img"]; ?>" 
					alt="<?php echo $newsView["title"]; ?>" title="<?php echo $newsView["title"]; ?>">
					<br><br>
					<!-- Description -->
					<p class="gray-text ftext"><?php echo $newsView["description"]; ?></p>

				</div>
			</div>

			<div class="column-4 pd20">
				<div class="news-menu">
					<?php $i =0; foreach ($news as $newsMenu): $i++; ?>
						<?php if($newsMenu["url"] == $newsView["url"]): continue; endif; ?>
						<a href="<?php Page::uri(); ?>news/<?php echo $newsMenu["url"]; ?>">
							<!-- Image -->
							<img src="<?php Page::uri(); Page::getNewsImage(); echo $newsMenu["img"]; ?>" 
							alt="<?php echo $newsMenu["title"]; ?>" title="<?php echo $newsMenu["title"]; ?>">
							<p><?php echo $newsMenu["title"]; ?></p>
						</a>
						<?php if($i == 5): break; endif; ?>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="clear"></div>
			
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