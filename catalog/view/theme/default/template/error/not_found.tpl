<?php echo $header; ?><?php //echo $column_left; ?><?php //echo $column_right; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Ошибка', 'Помилка', 'Error'); ?></span></li>
		</ul>
	</div>
</div>


<div class="container error">
	<div class="row">
		<p class="error-title"><?php translate('Ошибка 404', 'Помилка 404', 'Error 404'); ?></p>
		<p class="error-desc"><?php translate('К сожалению, запрашиваемая Вами страница не найдена', 'На жаль, запитувана Вами сторінка не знайдена', 'Unfortunately, the page you requested could not be found'); ?></p>
		<div class="error-wrapper center">
			<div class="col-md-4 error-box center">
				<span class="error-prev"><a href="#"><img src="/img/back.svg" class="icon" alt=""><?php translate('Вернуться назад', 'Повернутися назад', 'Come back'); ?></a></span>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 error-box center">
				<span class="four">
					4
				</span>
				<img src="/img/404.png" class="error-img" alt="">
				<span class="four">
					4
				</span>
			</div>
			<div class="col-md-4 error-box center">
				<span class="error-next"><a href="/"><?php translate('Перейти на главную', 'Перейти на головну', 'Go to Main page'); ?><img src="/img/next.svg" class="icon" alt=""></a></span>
			</div>
		</div>				
	</div>
</div>


<?php echo $footer; ?>