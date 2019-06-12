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