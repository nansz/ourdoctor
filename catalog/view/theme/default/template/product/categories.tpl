<?php echo $header; ?>
<main class="category">
	<div class="wrapper">
		<ul class="breadcrumbs">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
				<?php } else { ?><li><span><?php echo $breadcrumb['text']; ?></span></li><?php } ?>
			<?php } ?>
		</ul>
		<?php echo $column_left; ?>
		
		
		<h2><?php echo "Категории"; ?></h2>
		<div class="info-block content">
			<aside><?php echo $column_right; ?></aside>
			<section>
				<ul class="pagecategories">
					<?php foreach($categories as $cat) { ?>
						<li>
							<a class="image-product" href="<?php echo $this->url->link('product/category', 'path=' . $cat['category_id']); ?>">
								<img src="<?php echo $cat['thumb']; ?>" alt="<?php echo $cat['name']; ?>">
								<br/>
								<span class="title-product">
									<?php echo $cat['name']; ?></span></a>
							<?php if(isset($cat['children'])) { ?>
								<ul>
									<?php foreach($cat['children'] as $sub) { ?>
										<li>
											<a href="<?php echo $this->url->link('product/category', 'path=' . $cat['category_id'] .'_'. $sub['category_id']); ?>"><?php echo $sub['name']; ?></a>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>
			</section>
		</div>
	</div>
</main>	



<?php echo $footer; ?>