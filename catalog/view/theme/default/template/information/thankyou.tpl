<?=$header;?>
	<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('Спасибо', 'Дякуємо', 'Thank you'); ?></span></li>
		</ul>
	</div>
</div>
	<div class="container error thankyou">
		<div class="row">
			<p class="error-title"><?php translate('Спасибо за вашу заявку', 'Дякую за вашу заявку', 'Thank you for your application'); ?></p>
			<div class="error-wrapper center">
				<div class="col-md-4 error-box center">
					<span class="error-prev"><a href="#"><img src="/img/back.svg" class="icon" alt=""><?php translate('Вернуться назад', 'Повернутися назад', 'Come back'); ?></a></span>
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 error-box center column">
					<p><?php translate('Мы свяжемся с вами', 'Ми зв яжемось з Вами', 'We will contact you'); ?></p>
					<p><?php translate('в ближайшее время', 'найближчим часом', 'in the near future'); ?></p>
				</div>
				<div class="col-md-4 error-box center">
					<span class="error-next"><a href="/"><?php translate('Перейти на главную', 'Перейти на головну', 'Go to Main page'); ?><img src="/img/next.svg" class="icon" alt=""></a></span>
				</div>
			</div>	
			<div class="img-wrapper-thank">
				<img src="/img/thankyou.jpg" alt="thankyou">
			</div>			
		</div>
	</div>

<?=$footer;?>