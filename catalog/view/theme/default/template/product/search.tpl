<?php echo $header; ?><div class="main">
	<div class="container">

		<div class="breadcrumbs-box container">
			<div class="row">
				<ul class="breadcrumbs start">
					<li><a href="/"><span> <?php translate('Главная', 'Головна', 'Home'); ?></span></a></li>
					<li><span><?php translate('ПОИСК', 'ПОШУК', 'SEARCH'); ?></span></li>
				</ul>
			</div>
		</div>
		<aside class="catalogue">
			<?php echo $column_left; ?>
		</aside>


		<div class="container news-page">
			<div class="row center column">
				<h2 class="title"><?php translate('Поиск', 'Пошук', 'Search'); ?></h2>
				<div class="container-fluid blog-layout blog-page">
					<!-- search -->
					<?php echo $search; ?>
					<!-- classification -->
					<?php echo $minileftcolumn; ?>
					<!-- blog -->
					<section class="section-blog">
						<div class="section-wrap">
							<div class="section-container">
								<div class="section__content">
									<div class="blog">

										<?php if($products) { ?>
										<?php foreach ($products as $articles) { ?>
										<div class="blog__item">
											<a href="<?php echo $articles['href']; ?>" class="blog-link has-img">
												<img src="<?php echo $articles['thumb']; ?>"
													 alt="<?php echo $articles['name']; ?>">
											</a>
											<div class="content">
												<a href="<?php echo $articles['href']; ?>"
												   class="blog-title"><?php echo $articles['name']; ?></a>
												<p class="blog-preview">
													<?php echo $articles['description']; ?>
												</p>
												<a href="<?php echo $articles['href']; ?>" class="blog-link has-link">
                                            <span class="name">
                                                Подробнее
                                            </span>
													<span class="icon icon-caret">
                                                <svg width="6" height="9" viewBox="0 0 6 9" fill="none"
													 xmlns="http://www.w3.org/2000/svg">
<path d="M1.06384 0.770508L4.99316 4.69983L1.06384 8.62915" stroke="#006A86"/>
                                            </span>
												</a>
											</div>
										</div>
										<?php } } else { ?>
										<?php echo $error_search  ?>
										<?php } ?>
										<div id="ajax_loader"></div>
									</div>
									<!-- navigation -->
									<div class="blog-nav">
										<input  type="hidden" id="swovs" value="<?php translate('Показать больше', 'Показати більше', 'Show more'); ?>">

										<!-- generation button show more -->
										<div class="buttonshowmore">

										</div>
										<div class="box-pagination">
											<?php echo $pagination; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<!-- more articles -->
					<?php echo $lastaddarticles; ?>

				</div>
			</div>
		</div>


	</div>
</div>
<?php echo $footer; ?>