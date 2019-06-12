<?php echo $header; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Услуги', 'Послуги', 'The services'); ?></span></li>
		</ul>
	</div>
</div>
		
		<div class="container services-page">
			<div class="row">
			<h2 class="services-page-title"><?php translate('Услуги', 'Послуги', 'The services'); ?></h2>

			<div class="service-content-box-wrap">
				<div class="col-md-4 services-content-box">
					<div class="row">
						<h2 class="services-title center"><a href="/tomography/"><img src="/img/tmograph-main.svg" alt="" class="icon"><?php echo $tomography_name; ?></a></h2>
						<div class="services-img center">
							<a href="/tomography/" class="center"><img src="/image/<?php echo $tomography_image; ?>" alt=""></a>
						</div>					
						<p class="services-desc"><?php echo $tomography_smalltext; ?></p>
						<div class="center">
							<a href="/tomography/" class="button"><?php translate('подробнее', 'детальніше', 'more info'); ?></a>
						</div>						
					</div>
				</div>

				<div class="col-md-4 services-content-box">
					<div class="row">
						<h2 class="services-title center"><a href="/orthopedics/"><img src="/img/spine-main.svg" alt="" class="icon"><?php echo $orthopedics_name; ?></a></h2>
						<div class="services-img center">
							<a href="/orthopedics/" class="center"><img src="/image/<?php echo $orthopedics_image; ?>" alt=""></a>
						</div>					
						<p class="services-desc"><?php echo $orthopedics_smalltext; ?></p>
						<div class="center">
							<a href="/orthopedics/" class="button"><?php translate('подробнее', 'детальніше', 'more info'); ?></a>
						</div>						
					</div>
				</div>
			
				
				<?php if(isset($new_name)) { ?>
				<div class="col-md-4 services-content-box">
					<div class="row">
						<h2 class="services-title center"><a href="/new-direction/"><!-- <img src="img/tmograph-main.svg" alt="" class="icon"> --><?php echo $new_name; ?></a></h2>
						<div class="services-img center">
							<a href="/new-direction/" class="center"><img src="/image/<?php echo $new_image; ?>" alt=""></a>
						</div>					
						<p class="services-desc"><?php echo $new_smalltext; ?></p>
						<div class="center">
							<a href="/new-direction/" class="button"><?php translate('подробнее', 'детальніше', 'more info'); ?></a>
						</div>						
					</div>
				</div>
				<?php } ?>
			</div>

			</div>
		</div>







	<?php echo $content_bottom; ?>

<?php echo $footer; ?>