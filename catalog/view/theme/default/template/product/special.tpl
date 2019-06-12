<?php echo $header; ?>
<?php echo $column_left; ?>
<?php echo $column_right; ?>
<div class="main">
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

		<div class="page-content">
			<article class="products-page nopadding">

				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>
				<?php if ($products) { ?>
				<div class="products__list container__middle">
				
						<?php foreach ($products as $product) { ?>
							<div class="product__item item">
								<div class="product__thumb">
									<?php if ($product['thumb']) { ?>
										<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"></a>
									<?php } ?>
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
								<div class="btn-wrap btn__width-auto">
									<a href="<?php echo $product['href']; ?>" class="btn white">Подробнее</a>
									<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn orange">Купить</a>
								</div>
							</div>
						<?php } ?>
				
				</div>
				<?php } ?>
				<div class="pagination">
					<?php echo $pagination; ?>
				</div>
				<?php if (!$products) { ?>
					<center><?php echo $text_empty; ?></center>
				<?php } ?>				
			</article>
		</div>
	</div>
</div>
<?php echo $footer; ?>