<?php if ($attention) { ?>
    <div class="simplecheckout-warning-block"><?php echo $attention; ?></div>
<?php } ?>    
<?php if ($error_warning) { ?>
    <div class="simplecheckout-warning-block"><?php echo $error_warning; ?></div>
<?php } ?>
<style>
	table .model {
		display:none;
	}
	.close {
		display:block;
	}
	.simplecheckout-customer-left {
		display:none;
	}
	.simplecheckout-cart th {
		background-color:#fff;
	}
	.basket-container img {
		height:60px;
	}
	#simplecheckout_customer, #buttons, .simplecheckout-block-heading-button {
		display:none;
	}
	.simplecheckout-customer-two-column-left {
		margin: 0 auto;
		float: none;
		width: 400px;
	}
	.simplecheckout-block-heading {
		background: transparent;
		width: 395px;
		border: 0;
		margin: 0 auto;
		margin-top: 90px;
		text-align: center;
		font-weight: normal;
		font-size: 18px;
	}
	.simplecheckout-button-block {
		border:0 !important;
		text-align:center;
	}
	.simplecheckout-button-right {
		float:none;
		text-align:center;
	}
	#buttons a.btn {
		background:#f49c01;
		color:#fff;
	}
	#buttons a.btn:hover {
		background:#fff;
		color:#f49c01;
	}
	.simplecheckout-block-content {
		border:0;
	}
	table.simplecheckout-customer-two-column-left {
		border-spacing: 10px;
	}
	.simplecheckout-block {
		margin-bottom:0;
	}
</style>
        <ul class="basket-title">
			<li>Фото</li>
			<li>Товар</li>
			<li>Цена</li>
			<li>Стоимость</li>
			<li>Количество</li>
			<li>Удалить</li>
		</ul>

	<?php 
	$i = 1;
	foreach ($products as $product) { ?>
		<div class="basket-container">
			<div class="basket-img">
				<?php if ($product['thumb']) { ?>
                    <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
                <?php } ?>
			</div>
			<ul class="basket-content">
				<li>
					<p><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></p>
					 <?php if (!$product['stock'] && ($config_stock_warning || !$config_stock_checkout)) { ?>
						<span class="product-warning">***</span>
					<?php } ?>
					<div class="options">
						<?php foreach ($product['option'] as $option) { ?>
						&nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
						<?php } ?>
						<?php if (!empty($product['recurring'])) { ?>
						- <small><?php echo $text_payment_profile ?>: <?php echo $product['profile_name'] ?></small>
						<?php } ?>
					</div>
					<?php if ($product['reward']) { ?>
						<small><?php echo $product['reward']; ?></small>
					<?php } ?>
				</li>
				<li><span class="desktop-none">Цена:</span><span class="orange-text"><?php echo $product['price']; ?></span></li>
				<li class="desktop-none"><p>Количество:</p></li>
				<li class="desktop-block cash"><span><?php echo $product['total']; ?></span></li>
				<li>
					<ul class="quantity">
					<li><input type="button" <?php if ($quantity > 1) { ?>onclick="jQuery('#quan<?php echo $i; ?>').val(~~jQuery('#quan<?php echo $i; ?>').val()-1);simplecheckout_reload('cart_value_decreased');"<?php } ?> value="-"></li>
					<li><input type="text" id="quan<?php echo $i; ?>" name="quantity[<?php echo $product['key']; ?>]" value="<?php echo $product['quantity']; ?>" onchange="simplecheckout_reload('cart_value_changed')"></li>
					<li><input type="button" onclick="jQuery('#quan<?php echo $i; ?>').val(~~jQuery('#quan<?php echo $i; ?>').val()+1);simplecheckout_reload('cart_value_increased');" value="+"></li>
					</ul>
				</li>
				<li class="desktop-block"><a onclick="jQuery('#simplecheckout_remove').val('<?php echo $product['key']; ?>');simplecheckout_reload('product_removed');" class="close-desktop"></a></li>
			</ul>
			<div style="clear: right;"></div>
		</div> 
    <?php $i++;
	} ?>

<div class="order right">
	<?php foreach ($totals as $total) { ?>
		<div class="sum left" ><span><?php echo $total['title']; ?>:</span><span><?php echo $total['text']; ?></span></div>
	<?php } ?>
	<a onClick="$('#simplecheckout_customer').fadeIn(); $('#buttons').fadeIn();" class="btn orange basket-order right">Оформить заказ</a>
</div>
<div class="left"><a href="/" class="btn continue-btn">Продолжить покупки</a></div>
    

<?php if (isset($modules['coupon'])) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_coupon; ?>&nbsp;<input type="text" name="coupon" value="<?php echo $coupon; ?>" onchange="simplecheckout_reload('coupon_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['reward']) && $points > 0) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_reward; ?>&nbsp;<input type="text" name="reward" value="<?php echo $reward; ?>" onchange="simplecheckout_reload('reward_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['voucher'])) { ?>
    <div class="simplecheckout-cart-total">
        <span class="inputs"><?php echo $entry_voucher; ?>&nbsp;<input type="text" name="voucher" value="<?php echo $voucher; ?>" onchange="simplecheckout_reload('voucher_changed')"  /></span>
    </div>
<?php } ?>
<?php if (isset($modules['coupon']) || isset($modules['reward']) || isset($modules['voucher'])) { ?>
    <div class="simplecheckout-cart-total simplecheckout-cart-buttons">
        <span class="inputs buttons"><a id="simplecheckout_button_cart" onclick="simplecheckout_reload('cart_changed');" class="button btn"><span><?php echo $button_update; ?></span></a></span>
    </div>
<?php } ?>
    
<input type="hidden" name="remove" value="" id="simplecheckout_remove">
<div style="display:none;" id="simplecheckout_cart_total"><?php echo $cart_total ?></div>
<script type="text/javascript">
    jQuery(function(){
        jQuery('#cart_total').html('<?php echo $cart_total ?>');
        jQuery('#cart-total').html('<?php echo $cart_total ?>');
        jQuery('#cart_menu .s_grand_total').html('<?php echo $cart_total ?>');
        <?php if ($simple_show_weight) { ?>
        jQuery('#weight').text('<?php echo $weight ?>');
        <?php } ?>
        <?php if ($template == 'shoppica2') { ?>
        jQuery('#cart_menu div.s_cart_holder').html('');
        $.getJSON('index.php?<?php echo $simple->tpl_joomla_route() ?>route=tb/cartCallback', function(json) {
            if (json['html']) {
                jQuery('#cart_menu span.s_grand_total').html(json['total_sum']);
                jQuery('#cart_menu div.s_cart_holder').html(json['html']);
            }
        });
        <?php } ?>
        <?php if ($template == 'shoppica') { ?>
            jQuery('#cart_menu div.s_cart_holder').html('');
            jQuery.getJSON('index.php?<?php echo $simple->tpl_joomla_route() ?>route=module/shoppica/cartCallback', function(json) {
                if (json['output']) {
                    jQuery('#cart_menu span.s_grand_total').html(json['total_sum']);
                    jQuery('#cart_menu div.s_cart_holder').html(json['output']);
                }
            });
        <?php } ?>
    });
</script>
<?php if ($simple->get_simple_steps() && $simple->get_simple_steps_summary()) { ?>
<div id="simple_summary" style="display: none;margin-bottom:15px;">
    <table class="simplecheckout-cart">
        <colgroup>
            <col class="image">
            <col class="name">
            <col class="model">
            <col class="quantity">
            <col class="price">
            <col class="total">
        </colgroup>
        <thead>
            <tr>
                <th class="image"><?php echo $column_image; ?></th>
                <th class="name"><?php echo $column_name; ?></th>
                <th class="model"><?php echo $column_model; ?></th>
                <th class="quantity"><?php echo $column_quantity; ?></th>
                <th class="price"><?php echo $column_price; ?></th>
                <th class="total"><?php echo $column_total; ?></th>
            </tr>
        </thead>
    <tbody>
    <?php foreach ($products as $product) { ?>
        <tr>
            <td class="image">
                <?php if ($product['thumb']) { ?>
                    <a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" /></a>
                <?php } ?>
            </td> 
            <td class="name">
                <a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
                <?php if (!$product['stock'] && ($config_stock_warning || !$config_stock_checkout)) { ?>
                    <span class="product-warning">***</span>
                <?php } ?>
                <div class="options">
                <?php foreach ($product['option'] as $option) { ?>
                &nbsp;<small> - <?php echo $option['name']; ?>: <?php echo $option['value']; ?></small><br />
                <?php } ?>
                </div>
                <?php if ($product['reward']) { ?>
                <small><?php echo $product['reward']; ?></small>
                <?php } ?>
            </td>
            <td class="model"><?php echo $product['model']; ?></td>
            <td class="quantity"><?php echo $product['quantity']; ?></td>
            <td class="price"><nobr><?php echo $product['price']; ?></nobr></td>
            <td class="total"><nobr><?php echo $product['total']; ?></nobr></td>
            </tr>
            <?php } ?>
            <?php foreach ($vouchers as $voucher_info) { ?>
                <tr>
                    <td class="image"></td>  
                    <td class="name"><?php echo $voucher_info['description']; ?></td>
                    <td class="model"></td>
                    <td class="quantity">1</td>
                    <td class="price"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                    <td class="total"><nobr><?php echo $voucher_info['amount']; ?></nobr></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
        
    <?php foreach ($totals as $total) { ?>
        <div class="simplecheckout-cart-total" id="total_<?php echo $total['code']; ?>">
            <span><b><?php echo $total['title']; ?>:</b></span>
            <span class="simplecheckout-cart-total-value"><nobr><?php echo $total['text']; ?></nobr></span>
        </div>
    <?php } ?>

    <?php if ($summary_comment) { ?>
    <table class="simplecheckout-cart simplecheckout-summary-info">
      <thead>
        <tr>
          <th class="name"><?php echo $text_summary_comment; ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $summary_comment; ?></td>
        </tr>
      </tbody>
    </table>
    <?php } ?>
    <?php if ($summary_payment_address || $summary_shipping_address) { ?>
    <table class="simplecheckout-cart simplecheckout-summary-info">
      <thead>
        <tr>
          <th class="name"><?php echo $text_summary_payment_address; ?></th>
          <?php if ($summary_shipping_address) { ?>
          <th class="name"><?php echo $text_summary_shipping_address; ?></th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $summary_payment_address; ?></td>
          <?php if ($summary_shipping_address) { ?>
          <td><?php echo $summary_shipping_address; ?></td>
          <?php } ?>
        </tr>
      </tbody>
    </table>
    <?php } ?>
</div>
<?php } ?>