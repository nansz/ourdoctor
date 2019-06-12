<?php
//var_dump($_SERVER);
	//if($_SERVER['HTTP_X_REAL_IP']=='109.87.113.154' or $_SERVER['HTTP_X_REAL_IP']=='77.244.42.143') { ?>
	
	<div class="container-fluid main-slider new">
		<!-- ARROW -->
		<div class="header-slider-bot-arrow new center hidden-sm hidden-xs">
			<img src="/img/down-arrow-white.svg?ver=1.0" alt="">
		</div>
		<!-- ARROW -->
		<div class="row">
			<!-- SLIDER ============ -->
			<div class="header-slider new">
				<!-- SLIDE -->
				<?php $i = 0; ?>
				<?php foreach ($banners as $banner) {
						$i++;
?>
					<div class="slide_new">
						<div class="image" style="background-image: url('<?php echo $banner['image']; ?>?ver=1.0')"></div>
						<div class="text">
							<div class="box">
								<h2><?=$text_mdc;?></h2>
								<?php if($i == 1): ?>
								<div class="desc">
									<p><?php /*echo $banner['title'];*/ ?>
										<?=$text_mdc3;?>
									</p>
								</div>
								<?php elseif ($i == 2): ?>
								<div class="desc">
									<p><?php /*echo $banner['title'];*/ ?>
										<?=$text_mdc2;?>
									</p>
								</div>
								<?php else: ?>
								<div class="desc">
									<p><?php /*echo $banner['title'];*/ ?>
										<?=$text_mdc1;?>
									</p>
								</div>
								<?php endif; ?>
								<a href="#" class="link modal-trigger" data-modal="appointment"><?=$text_zapis;?></a>
							</div>						
						</div>
					</div>
				<?php } ?>
				<!-- SLIDE -->
			</div>
			<!-- SLIDER ============ -->
		</div>
	</div>
<?php //} else { ?>

<!-- SLIDER_HEADER ===============================================================================-->
<!--
<div class="container-fluid main-slider">
	<div class="header-slider-bot-arrow center hidden-sm hidden-xs">
		<img src="/img/down-arrow.svg?ver=1.0" alt="">
	</div>
	<div class="row">
		<div class="header-slider">
			<?php foreach ($banners as $banner) { ?>
				<div class="slide">
					<div class="slide-img center">
					<img src="<?php echo $banner['image']; ?>?ver=1.0" alt="<?php echo $banner['title']; ?>">
					<div class="slide-title around column">
						<h2><a href="<?php echo $banner['link']; ?>"><?php echo $banner['title']; ?></a></h2>
						<a href="#" class="modal-trigger button" data-modal="appointment"><?=$text_zapis;?></a>
					</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
-->
<?php //} ?>
