<?php echo $header; ?>
<div class="breadcrumbs-box container">
	<div class="row">
		<ul class="breadcrumbs start">
			<li><a href="/">Мдц-lux</a></li>
			<li><span><?php echo $heading_title; ?></span></li>
		</ul>
	</div>
</div>
<div class="container-fluid about-layout about-page">
	<div class="container main-about">
		<div class="row">
			<h1><?php echo $heading_title; ?></h1>
			<?php if ($error_warning) { ?>
			<div class="warning"><?php echo $error_warning; ?></div>
			<?php } else { ?>
			<?php echo $text_message_confirm; ?>
			<?php } ?>
	
			<?php echo $content_bottom; ?>
		</div>
	</div>
</div>
<?php echo $footer; ?>