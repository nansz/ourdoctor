<?php if ($articles) { ?>
<?php if($box) { ?>
	<div class="box">
		<div class="box-headings">
			<?php if($customtitle) { ?>
				<img src="/image/articles.png?ver=1.0">
			<?php } ?>
		</div>
		<div class="box-content">

		
		<?php foreach ($articles as $articles_story) { ?>
			<div class="box-newss" style="padding-top:10px;">
				<span style="font-size:11px; color:#333; background:#ccc; padding:3px; border-radius:4px;"><?php echo $articles_story['posted']; ?></span><br/>
				<?php if ($show_headline) { ?>
					<h4><?php echo $articles_story['title']; ?></h4>
				<?php } ?>
				<div style="margin-top:10px;font-size:13px; color:#333;"><?php echo $articles_story['description']; ?>.. </div>
				<a style="font-size:11px; text-align:right; color:#ff6633;display:block;" href="<?php echo $articles_story['href']; ?>">подробнее>></a>
				
				
				
			</div>
		<?php } ?>
		
		<?php if($showbutton) { ?>
			<div style="text-align:right;">
				<a href="<?php echo $articleslist; ?>" class="button"><span><?php echo $buttonlist; ?></span></a>
			</div>
		<?php } ?>
		</div>
	</div>
<?php } else { ?>
<div class="container related-posts">
	<div class="row">
		<p class="title-related">Другие новости</p>
		<?php foreach ($articles as $articles_story) { ?>
			<div class="col-md-3 related-box">
				<div class="related-img-box center">
					<a href="<?php echo $articles_story['href']; ?>">
						<img src="<?php echo $articles_story['image']; ?>?ver=1.0" alt="<?php echo $articles_story['title']; ?>">
					</a>
				</div>						
				<span class="related-permalink"><a href="<?php echo $articles_story['href']; ?>"><?php echo $articles_story['title']; ?></a></span>
			</div>
		<?php } ?>
	</div>
</div>




<?php } ?>
<?php } ?>