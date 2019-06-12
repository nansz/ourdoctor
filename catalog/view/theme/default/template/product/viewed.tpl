<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<main class="category subcategory">
		<div class="wrapper">
			<ul class="breadcrumbs">
				<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
					<?php if($i+1<count($breadcrumbs)) { ?>
						<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
					<?php } else { ?><li><span><?php echo $breadcrumb['text']; ?></span></li><?php } ?>
				<?php } ?>
			</ul>
			<div class="content">
				<section style="width:100%;">
				<h2><?php echo $heading_title; ?></h2>
				
				<?php if ($products) { ?>
					<div class="product-list">
						<?php foreach ($products as $product) { ?>
							<article>
								<?php if($product['upc']) { ?><span class="discount"><?php echo $product['upc']; ?></span><?php } ?>
								<a href="<?php echo $product['href']; ?>" class="image-product">
									<?php if ($product['thumb']) { ?>
										<img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>">
									<?php } ?>
								</a>
								<a href="<?php echo $product['href']; ?>" class="title-product"><?php echo $product['name']; ?></a>
								<div class="price">
									<?php if ($product['price']) { ?>
										<?php if (!$product['special']) { ?>
											<span><?php echo $product['price']; ?></span>
										<?php } else { ?>
											<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
										<?php } ?>
									<?php } ?>
								</div>
								<div>
									<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
									<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
									<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
								</div>
							</article>
						<?php } ?>
					</div>
						
					
					
					
					
					
				
					
					
					<div class="more-links vremenno">
						<a href="#">Показать еще 16 товаров</a>
					</div>
					<div class="pagination">
						<!--<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>-->
						<?php echo $pagination; ?>
					</div>
					<?php } else { ?>
						<center><?php echo $text_empty; ?></center>
					<?php } ?>
				</section>
</div>
</div>
</main>
<?php echo $footer; ?>