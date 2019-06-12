<?php echo $header; ?><?php echo $column_right; ?>

<main class="product product-cart">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } else { ?><li><span><?php echo $breadcrumb['text']; ?></span></li><?php } ?>
			<?php } ?>
		</ul>
		<?php echo $column_left; ?>
		<div class="content">
			<div class="product-info">
				<h3><?php echo $heading_title; ?></h3>
				
				<?php if ($thumb || $images) { ?>
				<div class="product-images">
					<div id="sync2" class="owl-carousel">
						<?php if ($thumb) { ?>
							<div class="item"><img src="<?php echo $popup; ?>" alt=""></div>
						<?php } ?>
						<?php if ($images) { ?>
							<?php foreach ($images as $image) { ?>
								<div class="item"><img src="<?php echo $image['popup']; ?>" alt=""></div>
							<?php } ?>
						<?php } ?>
					</div>
					<div id="sync1" class="owl-carousel popup-gallery">
						<?php if ($thumb) { ?>
							<div class="item"><a href="<?php echo $popup; ?>"><img src="<?php echo $popup; ?>" alt=""></a></div>
						<?php } ?>
						<?php if ($images) { ?>
							<?php foreach ($images as $image) { ?>
								<div class="item"><a href="<?php echo $image['popup']; ?>"><img src="<?php echo $image['popup']; ?>" alt=""></a></div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
				<?php } ?>






				<div class="product-price">
					<div>Код товара: <?php echo $model; ?></div>
				
					<?php if($stock=='Есть в наличии') { ?><span class="instock"><?php echo $stock; ?></span><?php } else { ?>
					<span class="nonestock"><?php echo $stock; ?></span>
					<?php } ?>
					
					<div class="price">
						   <?php if ($price) { ?>
							<?php if (!$special) { ?>
							<span><?php echo $price; ?></span>
							<?php } else { ?>
							<span class="price-old"><?php echo $price; ?></span> <span class="price-new"><?php echo $special; ?></span>
							<?php } ?>


							<?php if ($discounts) { ?>
							<div class="discount">
							  <?php foreach ($discounts as $discount) { ?>
							  <?php echo sprintf($text_discount, $discount['quantity'], $discount['price']); ?><br />
							  <?php } ?>
							</div>
							<?php } ?>
						  <?php } ?>
						
					</div>
					<input type="text" name="quantity" size="2" value="<?php echo $minimum; ?>" />
					<input type="hidden" name="product_id" size="2" value="<?php echo $product_id; ?>" />
					<div>					
						<a onclick="addToCompare('<?php echo $product_id; ?>');" class="prod-link"></a>
						<a onclick="addToWishList('<?php echo $product_id; ?>');" class="prod-link"></a>
						<a id="button-cart" class="prod-link"></a>
					</div>
					<!-- JV_Quick_Order -->
					<?php if ( $isShowButtonQOInProduct && $jvquickorder_status ) { ?>
						<a onclick="jv_qiuckorder_show('<?php echo $product_id; ?>');" class="btn"><?php echo "Купить в один клик"; ?></a>
					<?php } ?>
					<!-- JV_Quick_Order -->
					
				</div>
				<div class="product-info-list">
					<ul class="tabs">
						<li class="tab-link current" data-tab="tab-1">
							<a href="javascript:void(0)"><h3>Описание</h3></a>
						</li>
						<li class="tab-link" data-tab="tab-2">
							<a href="javascript:void(0)"><h3>Характеристики</h3></a>
						</li>
						<li class="tab-link" data-tab="tab-3">
							<a href="javascript:void(0)"><h3><?php echo $tab_review; ?></h3></a>
						</li>
					</ul>
					<div id="tab-1" class="tab-content current">
						<?php echo $description; ?>
					</div>
					<div id="tab-2" class="tab-content">
					  <?php if ($attribute_groups) { ?>
						<table>
						  <?php foreach ($attribute_groups as $attribute_group) { ?>
							<?php foreach ($attribute_group['attribute'] as $attribute) { ?>
							<tr>
							  <td><?php echo $attribute['name'].":"; ?></td>
							  <td><?php echo $attribute['text']; ?></td>
							</tr>
							<?php } ?>
						  <?php } ?>
						</table>
					  <?php } ?>
						
					</div>
					<div id="tab-3" class="tab-content">
						<div id="reviews-product" class="owl-carousel owl-theme">
							<?php if ($reviews) { ?>
								<?php foreach ($reviews as $review) { ?>
								<div class="item">
									<div class="review-prod">
										<span><?php echo $review['text']; ?></span>
										<a class="user-name"><?php echo $review['author']; ?></a>
									</div>
								</div>
								<?php } ?>
							<?php } else { ?>
							<div class="content"><?php echo $text_no_reviews; ?></div>
							<?php } ?>
						</div>
						  
						
						
						
						<a id="made-review" href="javascript:void(0)" class="btn">Написать отзыв &nbsp;<i class="fa fa-pencil"></i></a>
						<div id="review">
								<?php if ($review_status) { ?>
								
								<div id="review-title"></div>
								<b><?php echo $entry_name; ?></b><br />
								<input type="text" name="name" value="" />
								<br />
								
								<b><?php echo $entry_review; ?></b>
								<textarea name="text" cols="40" rows="8" style="width: 98%;"></textarea>
								<span style="font-size: 11px;"><?php echo $text_note; ?></span><br />
								
								<b><?php echo $entry_rating; ?></b> <span><?php echo $entry_bad; ?></span>&nbsp;
								<input type="radio" name="rating" value="1" />
								&nbsp;
								<input type="radio" name="rating" value="2" />
								&nbsp;
								<input type="radio" name="rating" value="3" />
								&nbsp;
								<input type="radio" name="rating" value="4" />
								&nbsp;
								<input type="radio" name="rating" value="5" />
								&nbsp;<span><?php echo $entry_good; ?></span><br />
								
								<b><?php echo $entry_captcha; ?></b><br />
								<input type="text" name="captcha" value="" />
								<br />
								<img src="index.php?route=product/product/captcha" alt="" id="captcha" /><br />
								<br />
								<div class="buttons">
								  <div class="right"><a id="button-review" class="btn"><?php echo $button_continue; ?></a></div>
								</div>
							 
							  <?php } ?>
						</div>
					</div>
				</div>
			</div>
			<aside>
				<h4>Доставка</h4>
				<?php echo html_entity_decode($this->config->get('config_dostavka'), ENT_QUOTES, 'UTF-8'); ?>
				
				<h4>Оплата</h4>
				<?php echo html_entity_decode($this->config->get('config_oplata'), ENT_QUOTES, 'UTF-8'); ?>
				
				<h4>Гарантия</h4>
				<?php echo html_entity_decode($this->config->get('config_garantija'), ENT_QUOTES, 'UTF-8'); ?>
				
			</aside>
		</div>
		<?php if ($products) { ?>
		  <h3>Рекомендуемые товары</h3>
		  <div id="prod-recomended" class="owl-carousel owl-theme">
			  <?php foreach ($products as $product) { ?>
				<div class="item">
					<article>
						<a href="<?php echo $product['href']; ?>" class="image-product">
							<?php if ($product['thumb']) { ?><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"><?php } ?>
						</a>
						<a href="<?php echo $product['href']; ?>" class="title-product"><?php echo $product['name']; ?></a>
						<div class="price">
							<?php if ($product['price']) { ?>
								<div class="price">
									  <?php if (!$product['special']) { ?>
										<span><?php echo $product['price']; ?></span>
									  <?php } else { ?>
										<span class="price-old"><?php echo $product['price']; ?></span> <span class="price-new"><?php echo $product['special']; ?></span>
									  <?php } ?>
								</div>
							<?php } ?>
						</div>
						<div>
							<a onclick="addToCompare('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
							<a onclick="addToWishList('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
							<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="prod-link"></a>
						</div>
					</article>
				</div>
			  <?php } ?>
			</div>
		<?php } ?>
		<?php echo $content_bottom; ?>
	</div>
</main>






<script type="text/javascript"><!--
$(document).ready(function() {
	$('.colorbox').colorbox({
		overlayClose: true,
		opacity: 0.5,
		rel: "colorbox"
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#button-cart').bind('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
		dataType: 'json',
		success: function(json) {
			$('.success, .warning, .attention, information, .error').remove();
			
			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						$('#option-' + i).after('<span class="error">' + json['error']['option'][i] + '</span>');
					}
				}
			} 
			
			if (json['success']) {
				$('#notification').html('<div class="success" style="display: none;">' + json['success'] + '<span class="close" onclick="closesuccess(); return false;"></span></div>');
					
				$('.success').fadeIn('slow');
					
				$('#cart-total').html(json['total']);
				
				//$('html, body').animate({ scrollTop: 0 }, 'slow'); 
			}	
		}
	});
});
//--></script>
<?php if ($options) { ?>
<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<?php foreach ($options as $option) { ?>
<?php if ($option['type'] == 'file') { ?>
<script type="text/javascript"><!--
new AjaxUpload('#button-option-<?php echo $option['product_option_id']; ?>', {
	action: 'index.php?route=product/product/upload',
	name: 'file',
	autoSubmit: true,
	responseType: 'json',
	onSubmit: function(file, extension) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', true);
	},
	onComplete: function(file, json) {
		$('#button-option-<?php echo $option['product_option_id']; ?>').attr('disabled', false);
		
		$('.error').remove();
		
		if (json['success']) {
			alert(json['success']);
			
			$('input[name=\'option[<?php echo $option['product_option_id']; ?>]\']').attr('value', json['file']);
		}
		
		if (json['error']) {
			$('#option-<?php echo $option['product_option_id']; ?>').after('<span class="error">' + json['error'] + '</span>');
		}
		
		$('.loading').remove();	
	}
});
//--></script>
<?php } ?>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
		

//$('#reviews-product').load('index.php?route=product/product/review&product_id=<?php echo $product_id; ?>');

$('#button-review').bind('click', function() {
	$.ajax({
		url: 'index.php?route=product/product/write&product_id=<?php echo $product_id; ?>',
		type: 'post',
		dataType: 'json',
		data: 'name=' + encodeURIComponent($('input[name=\'name\']').val()) + '&text=' + encodeURIComponent($('textarea[name=\'text\']').val()) + '&rating=' + encodeURIComponent($('input[name=\'rating\']:checked').val() ? $('input[name=\'rating\']:checked').val() : '') + '&captcha=' + encodeURIComponent($('input[name=\'captcha\']').val()),
		beforeSend: function() {
			$('.success, .warning').remove();
			$('#button-review').attr('disabled', true);
			$('#review-title').after('<div class="attention"><img src="catalog/view/theme/default/image/loading.gif" alt="" /> <?php echo $text_wait; ?></div>');
		},
		complete: function() {
			$('#button-review').attr('disabled', false);
			$('.attention').remove();
		},
		success: function(data) {
			if (data['error']) {
				$('#review-title').after('<div class="warning">' + data['error'] + '</div>');
			}
			
			if (data['success']) {
				$('#review-title').after('<div class="success">' + data['success'] + '</div>');
								
				$('input[name=\'name\']').val('');
				$('textarea[name=\'text\']').val('');
				$('input[name=\'rating\']:checked').attr('checked', '');
				$('input[name=\'captcha\']').val('');
			}
		}
	});
});
//--></script> 
<script type="text/javascript"><!--
$('#tabs a').tabs();
//--></script> 
<script type="text/javascript" src="catalog/view/javascript/jquery/ui/jquery-ui-timepicker-addon.js"></script> 
<script type="text/javascript"><!--
$(document).ready(function() {
	if ($.browser.msie && $.browser.version == 6) {
		$('.date, .datetime, .time').bgIframe();
	}

	$('.date').datepicker({dateFormat: 'yy-mm-dd'});
	$('.datetime').datetimepicker({
		dateFormat: 'yy-mm-dd',
		timeFormat: 'h:m'
	});
	$('.time').timepicker({timeFormat: 'h:m'});
});
//--></script> 



<?php echo $footer; ?>