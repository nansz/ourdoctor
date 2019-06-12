<?php echo $header; ?>
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
			<article>
				<div class="page__title">
					<h1><?php echo "Бренды"; ?></h1>
				</div>
				<div class="brends__list">
					<?php if ($categories) { ?>
						  <?php foreach ($categories as $category) { ?>



							  <?php if ($category['manufacturer']) { ?>
							  <?php for ($i = 0; $i < count($category['manufacturer']);) { ?>

								<?php $j = $i + ceil(count($category['manufacturer']) / 4); ?>
								<?php for (; $i < $j; $i++) { ?>
								<?php if (isset($category['manufacturer'][$i])) { ?>
									<a href="<?php echo $category['manufacturer'][$i]['href']; ?>">
										<img src="<?php echo $category['manufacturer'][$i]['image']; ?>" alt="Einhell">
									</a>
								<?php } ?>
								<?php } ?>

							  <?php } ?>
							  <?php } ?>


						  <?php } ?>
					<?php } else { ?> 
						<?php echo $text_empty; ?>
					<?php } ?>

				</div>
			</article>
		</div>
	</div>
</div>

<?php echo $footer; ?>