<?php echo $header; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><h1 style="color:#006a86;font-size:16px;"><?php translate('Прайс-лист', 'Прайс-лист', 'Price list'); ?> <?php translate('Томография', 'Томографія', 'Tomography'); ?></h1></li>
		</ul>
	</div>
</div>
<div class="container price-block">
	<div class="row has-orders">
		<div class="price-navigation center">
			<h2 class="price-title active center"><a href="/price-tomography/"><img src="/img/tmograph-white.svg" alt="" class="icon"><?php translate('Томография', 'Томографія', 'Tomography'); ?></a></h2>
			<h2 class="price-title center"><a href="/price-orthopedics/"><img src="/img/spine-main.svg" alt="" class="icon"><?php translate('Ортопедия', 'Ортопедія', 'Orthopaedics'); ?></a></h2>
			<!--<h2 class="price-title center"><a href="/price-new-direction/"><?php translate('Новое направление', 'Новий напрямок', 'New direction'); ?></a></h2>-->
		</div>
		<div class="tab-tomograph">
			<div class="price-content">
				<div class="price-table">
					<table>
						<tr>
							<td class="first">№</td>
							<td class="two"><?php translate('Наименование услуги', 'Назва послуги', 'Name of service'); ?></td>
							<td class="last"><?php translate('Стоимость, грн', 'Вартість, грн', 'Cost, UAH'); ?></td>
							<td class="last-last"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></td>
						</tr>
						<?php
						$i=1;
						foreach($products as $product) { ?>
							<tr>
								<td class="first"><?php echo $i; ?></td>
								<td class="two"><?php if($product['description']) { ?>
										<a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a>
									<?php } else { ?>
										<?php echo $product['name']; ?>
									<?php } ?></td>
								<?php if (strpos($_SERVER['REQUEST_URI'], "en/") === FALSE) { ?>
								<?php } else { ?>
									<?php $product['price'] = str_replace("грн", "UAH", $product['price']); ?>
								<?php }?>

								<td class="last"><?php echo $product['price']; ?><?php translate('', '', ''); ?></td>
								<td class="last-last"><a class="button modal-trigger" onClick="$('#appointments #toservices').attr('value', '<?php echo $product['name']; ?>');" data-modal="appointments"><?php translate('Записаться', 'Записатися', 'Enroll'); ?></a></td>
							</tr>
						<?php $i++;
						} ?>
					</table>
				</div>
			</div>

		</div>



	</div>
</div>

<?php echo $footer; ?>