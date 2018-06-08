
<!-- Item -->
<div class="column-3 pd20">	
	<a href="<?php Page::uri(); ?>child/<?php echo $child["url"]; ?>" >
		<div class="item">
			
			<!-- Image -->
			<img src="<?php Page::uri();Page::getChildImage();echo $child["image"]; ?>" 
			alt="<?php echo $child["name"]." ".$child["surname"]; ?>" 
			title="<?php echo $child["name"]." ".$child["surname"]; ?>">

			<!-- Title -->
			<h3 class="pd15 cntr"><?php echo $child["name"]." ".$child["surname"]; ?></h3>

		</div>
	</a>
</div>

<!-- end Item -->
