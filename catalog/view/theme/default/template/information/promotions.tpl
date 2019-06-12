<?php echo $header; ?>
<?php if (isset($promotions_data)) { ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Видео', 'Відео', 'Video'); ?></span></li>
		</ul>
	</div>
</div>
<style>
	.results {
		display:none;
	}
</style>
			<div class="container video-page-block">
				<div class="row main-about">
					<h1><?php translate('Видео', 'Відео', 'Video'); ?></h1>
					<div class="video-content-box">
						
						<?php foreach ($promotions_data as $promotions) { ?>
							<div class="about-video-box col-md-4">
								<div class="row">
									<div class="video-text">
										<p><?php echo $promotions['description']; ?></p>
									</div>
									<div class="video-button center">
										<a href="<?php echo $promotions['title']; ?>"><img src="/img/play-button.svg" alt=""></a>
									</div>
									<div class="video-container">
										<img src="<?php echo $promotions['image']; ?>"></img>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>




	<!-- PAGINATION ======================================================================================-->
		<div class="container pagination">
			<div class="row center">
				
					<?php echo $pagination; ?>

			</div>
		</div>
  



				

<?php } ?>


  
  

<?php if(isset($promotions_info)) { ?>
<div class="article container">
	<div class="paragraph">
		<span>&nbsp;</span>
		<span><span><?php translate('Акции', 'Акції', 'Promotions'); ?></span></span>
		<span></span>
	</div>

	<article>
		<div>
			<?php if ($image) { ?><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" class="pull-left"><?php } ?>
			<h2><?php echo $heading_title; ?></h2>
			<?php echo $description; ?>
		</div>
	</article>
</div>




	<?php } ?>
	<?php echo $content_bottom; ?>


<script type="text/javascript"><!--
//$(document).ready(function() {
//	$('.colorbox').colorbox({
//		overlayClose: true,
//		opacity: 0.5,
//		rel: "colorbox"
//	});
//});
//--></script>

<?php echo $footer; ?>