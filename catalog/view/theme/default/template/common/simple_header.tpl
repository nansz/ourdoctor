<?php echo $header; ?>
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
		<?php if (isset($error_warning)) { ?> 
			<?php if ($error_warning) { ?>
				<div class="warning"><?php echo $error_warning; ?></div>
			<?php } ?>
		<?php } ?>
		<div class="page-content">
			<article>
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>
				
				
				
				
			
    
