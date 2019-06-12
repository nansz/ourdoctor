<?php if (count($products) > 0) { ?>	
<article class="products container__middle">
	<p class="border-btm">Последние просмотренные</p>
	<div class="slider products__list owl-carousel">
		<?php foreach ($products as $product) { ?>	
		
		<div class="product__item item">
			<div class="product__thumb">
				<a href="<?php echo $product['href']; ?>">
					<?php if ($product['thumb']) { ?><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"><?php } ?>
				</a>
			</div>
			<div class="product__model">
				<a href="<?php echo $product['href']; ?>">
					<?php echo $product['name']; ?>
				</a>
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
				<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="btn orange">Купить</a>
			</div>
		</div>
		
		<?php } ?>
		
	</div>
</article>
<?php } ?>
