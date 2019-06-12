<?php echo $header; ?><?php //echo $column_left; ?><?php //echo $column_right; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/"><?php translate('Мдц-lux', 'Мдц-lux', 'Mdc-lux'); ?></a></li>
			<li><span><?php translate('В данной категории нет материалов', 'У даній категорії немає матеріалов', 'In this category, there are no materials'); ?></span></li>
		</ul>
	</div>
</div>


<div class="container error">
	<div class="row">
		<p class="error-desc"><?php translate('В данной категории нет материалов', 'У даній категорії немає матеріалов', 'In this category, there are no materials'); ?></p>
		<div class="error-wrapper center">

			<div class="col-md-4 col-sm-12 col-xs-12 error-box center">
				<span class="error-next"><a href="/"><?php translate('Перейти на главную', 'Перейти на головну', 'Go to Main page'); ?><img src="/img/next.svg" class="icon" alt=""></a></span>
			</div>
			
		</div>				
	</div>
</div>


<?php echo $footer; ?>