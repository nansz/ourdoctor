<?php
//-----------------------------------------------------
// News Module for Opencart v1.5.5   							
// Modified by villagedefrance                          			
// contact@villagedefrance.net                         			
//-----------------------------------------------------
?>

<?php echo $header; ?>
<style>
	.news-item__thumb iframe {
		width:100%;
		height:100%;
	}
</style>
  

<?php if (isset($faq_data)) { ?>
<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>

		<div class="page-content">
			<article class="container__middle">
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>
				<div class="faq__list">
					<?php foreach ($faq_data as $faq) { ?>
						<div class="faq__item">
							<div class="faq__question">
								<?php echo $faq['title']; ?>
							</div>
							<div class="faq__answer">
								<?php echo $faq['description']; ?>
							</div>
						</div>
					<?php } ?>
					
					
					
				</div>
				<div class="pagination">
					<?php echo $pagination; ?>
				</div>
			</article>
		</div>
	</div>
</div>





<?php } ?>


  
  

<?php if(isset($faq_info)) { ?>
<div class="article container">
	<div class="paragraph">
		<span>&nbsp;</span>
		<span><span><?php translate('Акции', 'Акції', 'Promotions'); ?></span></span>
		<span></span>
	</div>

	<article>
		<div>
			<?php if ($image) { ?><img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" class="pull-left"><?php } ?>
			<h2><?php echo $heading_title; ?></h2>
			<?php echo $description; ?>
		</div>
	</article>
</div>




	<?php } ?>
	<?php echo $content_bottom; ?>


<?php echo $footer; ?>