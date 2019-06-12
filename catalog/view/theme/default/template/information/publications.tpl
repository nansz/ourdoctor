<?php echo $header; ?>

<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Публикации', 'Публікації', 'Publications'); ?></span></li>
		</ul>
	</div>
</div>
		

		
		<div class="container publication-page">
			<div class="row">
			<h2 class="publication-page-title"><?php translate('Публикации', 'Публікації', 'Publications'); ?></h2>

				<div class="col-md-6 publication-content-box">
					<div class="row">
						<a href="/science/"><h2 class="publication-title"><?php translate('Научные', 'Наукові', 'Scientific'); ?></h2></a>
						<div class="publication-img center">
							<a href="/science/" class="center"><img src="/img/publication1.png" alt=""></a>
						</div>					
						<div class="center">
							<a href="/science/" class="button"><?php translate('подробнее', 'детальніше', 'more info'); ?></a>
						</div>						
					</div>
				</div>

				<div class="col-md-6 publication-content-box">
					<div class="row">
						<a href="/general/"><h2 class="publication-title"><?php translate('Общие', 'Загальні', 'General'); ?></h2></a>
						<div class="publication-img center">
							<a href="/general/" class="center"><img src="/img/publication2.png" alt=""></a>

						</div>					
						<div class="center">
							<a href="/general/" class="button"><?php translate('подробнее', 'детальніше', 'more info'); ?></a>
						</div>						
					</div>
				</div>

				



			</div>
		</div>








	<?php echo $content_bottom; ?>
<?php echo $footer; ?>