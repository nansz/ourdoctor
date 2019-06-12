<div class="container main-certificates">
	<div class="row">
		<h2><?=$text_sertificates;?></h2>
		<div class="cert-slider">
		
		<?php foreach ($banners as $banner) { ?>
			<div class="cert-slide center">
				<div class="cert-image center">
					<a href="<?php echo $banner['image']; ?>?ver=1.0" class="center"><img data-big="<?php echo $banner['image']; ?>?ver=1.0" src="<?php echo $banner['thumb']; ?>?ver=1.0" alt="<?php echo $banner['title']; ?>"></a>
				</div>
			</div>
		<?php } ?>

		</div>
	</div>
</div>