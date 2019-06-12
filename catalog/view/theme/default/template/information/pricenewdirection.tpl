<?php echo $header; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Прайс-лист', 'Прайс-лист', 'Price list'); ?> <?php translate('Новое направление', 'Новий напрямок', 'New direction'); ?></span></li>
		</ul>
	</div>
</div>
<div class="container price-block">
	<div class="row">
		<div class="price-navigation btw">
			<h2 class="price-title center"><a href="/price-tomography/"><img src="/img/tmograph-main.svg" alt="" class="icon"><?php translate('Томография', 'Томографія', 'Tomography'); ?></a></h2>
			<h2 class="price-title center"><a href="/price-orthopedics/"><img src="/img/spine-main.svg" alt="" class="icon"><?php translate('Ортопедия', 'Ортопедія', 'Orthopedics'); ?></a></h2>
			<h2 class="price-title active center"><a href="/price-new-direction/"><?php translate('Новое направление', 'Новий напрямок', 'New direction'); ?></a></h2>
		</div>
		<div class="tab-tomograph">
			<div class="price-content">
				<div class="price-table">
					<table>
						<tr>
							<td class="first">№</td>
							<td class="two"><?php translate('Наименование услуги', 'Найменування послуги', 'Name of service'); ?></td>
							<td class="last"><?php translate('Стоимость, грн', 'Вартість, грн', 'Cost, UAH'); ?></td>
						</tr>
						<?php 
						$i=1;
						foreach($products as $product) { ?>
							<tr>
								<td class="first"><?php echo $i; ?></td>
								<td class="two"><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?></a></td>
								<td class="last"><?php echo $product['price']; ?></td>
							</tr>
						<?php $i++;
						} ?>
					</table>
				</div>
			</div>

		</div>
		
		
		<!--<div class="center">
			<a href="#" class="modal-trigger button" data-modal="appointment"><?php translate('Записаться на прием', 'Записатися на прийом', 'Make an appointment'); ?></a>
		</div>-->

	</div>
</div>

<?php echo $footer; ?>