<?php echo $header; ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?><img src="catalog/view/theme/default/image/close.png" alt="" class="close" /></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>
<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>
		
		<h2>Мои закладки</h2>
		<div class="content basket">
		<?php if($products) { ?>
			<table>
				<tr>
					<th></th>
					<th>Название товара</th>
					<th>Модель</th>
					<th>Наличие</th>
					<th>Цена</th>
					<th>Действие</th>
				</tr>
				<?php foreach ($products as $product) { ?>
				<tr>
					<td><?php if ($product['thumb']) { ?>
						<a href="<?php echo $product['href']; ?>"><img src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>"></a>
					<?php } ?>
					</td>
					<td><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
					<td><?php echo $product['model']; ?></td>
					<td><?php echo $product['stock']; ?></td>
					<td>
						<?php if ($product['price']) { ?>
						 <?php if (!$product['special']) { ?>
						  <?php echo $product['price']; ?>
						  <?php } else { ?>
						  <s><?php echo $product['price']; ?></s> <b><?php echo $product['special']; ?></b>
						  <?php } ?>
						<?php } ?>
					</td>
					<td>
						<a onclick="addToCart('<?php echo $product['product_id']; ?>');" class="prod-link inbasket"></a>
						<span onClick="location.href='<?php echo $product['remove']; ?>';" class="close">
						</span>
					</td>
				</tr>
				<?php } ?>
			</table>
		<?php } else { ?>
			<?php echo $text_empty; ?>
		<?php } ?>
			<div class="btn-block">
				<a href="<?php echo $continue; ?>" class="btn">Продолжить</a>
			</div>
		</div>
	</div>
</div>




    




<?php echo $footer; ?>