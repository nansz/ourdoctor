<?php if ($promotions) { ?>
<?php if($box) { ?>
	<div class="box">
		<div class="box-headings">
			<?php if($customtitle) { ?>
				<img src="/image/articles.png">
			<?php } ?>
		</div>
		<div class="box-content">

		
		<?php foreach ($promotions as $promotions_story) { ?>
			<div class="box-newss" style="padding-top:10px;">
				<span style="font-size:11px; color:#333; background:#ccc; padding:3px; border-radius:4px;"><?php echo $promotions_story['posted']; ?></span><br/>
				<?php if ($show_headline) { ?>
					<h4><?php echo $promotions_story['title']; ?></h4>
				<?php } ?>
				<div style="margin-top:10px;font-size:13px; color:#333;"><?php echo $promotions_story['description']; ?>.. </div>
				<a style="font-size:11px; text-align:right; color:#ff6633;display:block;" href="<?php echo $apromotions_story['href']; ?>">?????????>></a>
				
				
				
			</div>
		<?php } ?>
		
		<?php if($showbutton) { ?>
			<div style="text-align:right;">
				<a href="<?php echo $promotionslist; ?>" class="button"><span><?php echo $buttonlist; ?></span></a>
			</div>
		<?php } ?>
		</div>
	</div>
<?php } else { ?>
<div class="section-video">
	<div class="section-video-head">
	<p>Видео с нами</p>
	</div>
	<div class="video">
		<?php foreach ($promotions as $promotions_story) { ?>
			<div><?php echo $promotions_story['title']; ?></div>
		<?php } ?>
	</div>
	<a href="/videos/" class="all-video-btn btn orange">Все видео</a> 
</div>
<?php } ?>
<?php } ?>