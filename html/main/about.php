<!DOCTYPE html>
<html>


<head>

	<!-- Static head components -->
	<?php include_once(P."html/template/external.php"); ?>

	<!-- Title and SEO meta tags -->
	<title>О нас | CharityWishTree.com </title>

	<meta name="keywords" content="">
	<meta name="description" content="">

</head>


<body>

<!-- get Header -->
<?php include_once(P."html/template/header.php"); ?>
<!-- end Header -->


<!-- start Content -->
<div class="content">
	<div class="pd20"></div>
	<div class="wrapper">
		<div class="pd20 bg-white shadow">
			<h1 class="theme-title">О нас</h1>

			<div class="column-6 pd20">
				<p class="gray-text ftext">Благотворительный проект CharityWishTree является сплочением и объединением всей молодёжи Алматы во благо детей. Студенты трудятся и стараются вместе с целью осуществить желания и мечты детей из детских домов. В этом году над проектом работают 16 Университетов Алматы, 10 детских домов, также малообеспеченные семья и паралимпийцы. В этом году проект охватывает Детские Больницы г.Алматы, как Аксайская детская больница.</p>
			</div>
			
			<div class="column-6 pd20">
				<img src="<?php Page::uri();Page::getImage() ?>about.jpg">
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