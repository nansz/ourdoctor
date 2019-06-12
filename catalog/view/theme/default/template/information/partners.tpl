<?php
//-----------------------------------------------------
// News Module for Opencart v1.5.5   							
// Modified by villagedefrance                          			
// contact@villagedefrance.net                         			
//-----------------------------------------------------
?>

<?php echo $header; ?>
<style>
	.news-item__thumb iframe {
		width:100%;
		height:100%;
	}
</style>
  

<?php if (isset($partners_data)) { ?>
<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>

		<div class="page-content">
			<article>
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>

				<div class="partners">
					<?php foreach ($partners_data as $partners) { ?>
					<div class="partner__item">
						<div class="partner__item__content">
							<div class="partner__logo">
								<a href="<?php echo $partners['href']; ?>">
									<img src="<?php echo $partners['image']; ?>" alt="Gardol">
								</a>
							</div>
							<div class="partner__info">
								<div class="partner__title">
									<a href="<?php echo $partners['href']; ?>"><?php echo $partners['title']; ?></a>
								</div>
								<div class="partner__contacts">
									<div>
										<span><?php translate('Адрес', 'Адреса', 'Address'); ?>:</span>
										<span><?php echo $partners['meta_description']; ?></span>
									</div>
									<div>
										<span><?php translate('Телефон', 'Телефон', 'Phone'); ?>:</span>
										<span>
											<?php echo $partners['phone']; ?>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
					
					
				</div>

				<div class="pagination">
					<?php echo $pagination; ?>
				</div>
			</article>
		</div>
	</div>
</div>








<?php } ?>


  
  

<?php if(isset($partners_info)) { ?>
<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>

		<div class="page-content">
			<article class="container__middle">
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>
				<div>
					<div class="partner__thumb">
						<?php if ($image) { ?><img src="<?php echo $popup; ?>" alt="<?php echo $heading_title; ?>"><?php } ?>
					</div>
					<div class="partner__details">
						<?php echo $description; ?>
						<div class="partner__contacts">
							<h4><?php translate('Контактная информация', 'Контактна інформація', 'Contact Information'); ?></h4>
							<div>
								<span><?php translate('Адрес', 'Адреса', 'Address'); ?>:</span>
								<span><?php echo $address; ?></span>
							</div>
							<div>
								<span><?php translate('Телефон', 'Телефон', 'Phone'); ?>:</span>
								<span>
									<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
								</span>
							</div>
							<div>
								<span>Skype:</span>
								<span><a href="skype?chat:<?php echo $skype; ?>"><?php echo $skype; ?></a></span>
							</div>
							<div>
								<span>Email:</span>
								<span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
							</div>
							<p class="btn-wrap">
								<a href="javascript:void(0)" class="map btn orange" role="popupshow" data-popup="#map">Посмотреть на карте</a>
							</p>
						</div>
					</div>
				</div>
			</article>
			<?php if($products) { ?>
			<article class="products container__middle">
				<h3><?php translate('Предлагаемые товары', 'Пропоновані товари', 'Proposed goods'); ?></h3>
				<div class="slider products__list owl-carousel">
					<?php foreach($products as $product) { ?>
						<div class="product__item item">
							<div class="product__thumb">
								<a href="<?php echo $product['href']; ?>">
									<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
								</a>
							</div>
							<div class="product__model">
								<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
							</div>
							<div class="product__price">
								<?php if ($product['price']) { ?>
									<?php if (!$product['special']) { ?>
										<span><?php echo $product['price']; ?></span>
									<?php } else { ?>
									  <span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
									<?php } ?>
								<?php } ?>
							</div>
							<div class="btn-wrap">
								<a onClick="addToCart('<?php echo $product['product_id']; ?>');" class="btn orange"><?php translate('Купить', 'Купити', 'Buy'); ?></a>
							</div>
						</div>
					<?php } ?>
				</div>
			</article>
			<?php } ?>
			
			
			
		</div>
	</div>

	<div class="popup" id="map">
		<div class="cover">
			<?php echo $map; ?>
		</div>
	</div>
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