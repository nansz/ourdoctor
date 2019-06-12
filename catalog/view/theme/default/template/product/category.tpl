<?php echo $header; ?>

<?php if ($categories) { ?>
<!--<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>
		<aside class="catalogue">
			<?php echo $column_left; ?>
		</aside>
		<div class="page-content" style="float:right; width:81%;">
			<article class="products-page nopadding">
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>

				<div class="products__list container__middle">
				
						<?php foreach ($categories as $category) { ?>
							<div class="product__item item">
								<div class="product__thumb">
									<a href="<?php echo $category['href']; ?>" class="image-product">
										<img src="<?php echo $category['thumb']; ?>" alt="<?php echo $category['name']; ?>">
									</a>
								</div>
								<div class="product__model">
									<a href="<?php echo $category['href']; ?>" class="title-product"><?php echo $category['name']; ?></a>
								</div>
								<?php if($category['children']) { ?>
								<ul>
									<?php $i=1; 
									
									foreach($category['children'] as $child) { 
									if($i>5) { break; } ?>
										<li><a href="<?php echo $this->url->link('product/category', 'path=' . $this->request->get['path'] . '_' . $category['id'] .'_'.$child['category_id']); ?>"><?php echo $child['name']; ?></a></li>
									<?php 
									$i++;
									} ?>
									<li><a href="<?php echo $category['href']; ?>">Все <?php echo $category['name']; ?></a></li>
								</ul>
								<?php } ?>
							</div>
						<?php } ?>						
				</div>


				<?php if (!$categories && !$products) { ?>
					<center><?php echo $text_empty; ?></center>
				<?php } ?>				
			</article>
		</div>
	</div>
</div>-->



<?php } else { ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>
<div class="container tomograph-page">
	<div class="row">
	<div class="wrap center">
			<div class="tomograph-head ">
			
				<h1><?php echo $heading_title; ?></h1>
				<div class="tomograph-head-desc">
				<p><?php translate(html_entity_decode($this->config->get('config_address'), ENT_QUOTES, 'UTF-8'), 'Україна, м. Харків, вул. Лермонтовська, 27', 'Ukraine, Kharkiv, Lermontovskaya str., 27'); ?></p>
				<p><?php echo $this->config->get('config_telephone'); ?>, <?php echo $this->config->get('config_fax'); ?>, <?php echo $this->config->get('config_telephone3'); ?></p>	
				</div>						   
				<div class="col-md-6">
					<div class="row text-left">
						<?php if($heading_title=='Томография' or $heading_title=='Томографія' or $heading_title=='Tomography') { ?>
							<a href="/terminy-tomography/"><?php translate('Термины томографии', 'Терміни томографії', 'Terms of tomography'); ?></a>
						<?php } 
						else if($heading_title=='Ортопедия' or $heading_title=='Ортопедія' or $heading_title=='Orthopedics') { ?>
							<a href="/terminy-orthopedics/"><?php translate('Термины ортопедии', 'Терміни ортопедії', 'Terms of orthopedics'); ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row text-right">
						<?php if($heading_title=='Томография' or $heading_title=='Томографія' or $heading_title=='Tomography') { ?>
							<a class="modal-trigger" data-modal="vopros" href="#"><?php translate('Задать вопросы в области томографии', 'Поставити запитання в області томографії', 'Ask questions in the field of tomography'); ?></a>
						<?php } 
						else if($heading_title=='Ортопедия' or $heading_title=='Ортопедія' or $heading_title=='Orthopedics') { ?>
							<a class="modal-trigger" data-modal="vopros" href="#"><?php translate('Задать вопросы в области ортопедии', 'Поставити запитання в області ортопедії', 'Ask questions in the field of orthopedics'); ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row text-left">
						<?php if($heading_title=='Томография' or $heading_title=='Томографія' or $heading_title=='Tomography') { ?>
							<a href="/price-tomography/"><?php translate('Прайс-лист', 'Прайс-лист', 'Price list'); ?></a>
						<?php } 
						else if($heading_title=='Ортопедия' or $heading_title=='Ортопедія' or $heading_title=='Orthopedics') { ?>
							<a href="/price-orthopedics/"><?php translate('Прайс-лист', 'Прайс-лист', 'Price list'); ?></a>
						<?php } ?>	
					</div>
				</div>
				<div class="col-md-6">
					<div class="row text-right">
						<?php if($heading_title=='Томография' or $heading_title=='Томографія' or $heading_title=='Tomography') { ?>
							<a href="/description-tomography/"><?php translate('Описание исследований компьютерной томографии', 'Опис досліджень комп`ютерної томографії', 'Description of computer tomography'); ?></a>
						<?php } 
						else if($heading_title=='Ортопедия' or $heading_title=='Ортопедія' or $heading_title=='Orthopedics') { ?>
							<a href="/description-orthopedics/"><?php translate('Описание исследований ортопедии', 'Опис досліджень ортопедії', 'Description of Orthopedics Research'); ?></a>
						<?php } ?>	
					</div>
				</div>
			</div>
		</div>

		<div class="tomograph-block-large" data-mcs-theme="dark-thin">

			<div class="col-md-6 text-wrap">
			<div class="tomograph-text-large">
				<?php echo $small_text; ?>
			</div>
				<div class="center specialization-feedback hidden-sm hidden-xs">
					<a href="#" class="modal-trigger button tomograph-btn" data-modal="appointment"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></a>
				</div>
			</div>

			<div class="col-md-6 tomograph-images">
				<div class="main-img-tomograph">
					<a><img src="<?php echo $mimage; ?>" alt=""></a>
				</div>
				<div class="thumbnails btw">
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage; ?>" alt="">								
					</div>
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage2; ?>" alt="">
					</div>
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage3; ?>" alt="">
					</div>
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage4; ?>" alt="">								
					</div>
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage5; ?>" alt="">
					</div>
					<div class="tomograph-thumbnails">
						<img src="<?php echo $mimage6; ?>" alt="">
					</div>

				</div>		

			</div>
			<div class="col-md-12 tomograph-two-block">
				<div class="row">
					<div class="col-md-6 tomograph-two-block-img">
						<img src="<?php echo $mimage7; ?>" alt="">


 





					</div>
					<div class="col-md-6 tomograph-two-block-text">
						<?php echo $description; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>



				

<?php } ?>



<?php echo $footer; ?>