<?php if ($reviews) { ?>
	<?php foreach ($reviews as $review) { ?>
	<div class="item">
		<div class="review-prod">
			<span><?php echo $review['text']; ?></span>
			<a class="user-name"><?php echo $review['author']; ?></a>
		</div>
		<div class="review-prod">
			<span><?php echo $review['text']; ?></span>
			<a class="user-name"><?php echo $review['author']; ?></a>
		</div>
	</div>
	<?php } ?>
<?php } else { ?>
<div class="content"><?php echo $text_no_reviews; ?></div>
<?php } ?>



