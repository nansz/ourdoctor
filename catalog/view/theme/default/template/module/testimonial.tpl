<!-- MAIN_REVIEWS ================================================================================-->
		<div class="container-fluid reviews-layout">
			<div class="container main-reviews">
				<div class="row">
					<div class="hh2"><?=$text_otz;?></div>
					<div class="hh4"><?=$text_nam;?></div>
					<div class="reviews-slider">

					<!-- REVIEW_SLIDE =====================================================================-->
					
					<?php foreach ($testimonials as $testimonial) { ?>
						<div class="review-slide">
							<div class="center">
							<div class="review-wrapper">
								<div class="reviev-icon center">
									<img src="<?php echo $testimonial['title'] ; ?>?ver=1.0" alt="">
								</div>
								<div class="review-user">
									<div class="hh2"><?php echo $testimonial['name'] ; ?></div>
								</div>
								<div class="review-date">
									<p><?php echo $testimonial['date_added'] ; ?></p>
								</div>
								<div class="review-text">
									<p><?php echo $testimonial['description2'] ; ?></p>
								</div>
								<div class="review-link center">
									<a href="#" class="modal-trigger" data-modal="review<?php echo $testimonial['id'] ; ?>"><?=$text_chitat;?></a>
								</div>
							</div>
						</div>
						</div>
					<?php } ?>	
							

					</div>
				</div>
			</div>
		</div>

		<?php foreach ($testimonials as $testimonial) { ?>
		<div class="modal modal-review" id="review<?php echo $testimonial['id'] ; ?>">
		  <div class="modal-sandbox"></div>
		  <div class="modal-box">
			<div class="modal-body">
			  <div class="review-slide-array-modal">
					<div class="center">
						<div class="review-wrapper">
							<div class="reviev-icon center">
								<img src="<?php echo $testimonial['title'] ; ?>?ver=1.0" alt="">
							</div>
							<div class="review-user">
								<div class="hh2"><?php echo $testimonial['name']; ?></div>
							</div>
							<div class="review-date">
								<p><?php echo $testimonial['date_added']; ?></p>
							</div>
							<div class="review-text">
								<p><?php echo $testimonial['description'] ; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
		<?php } ?>


