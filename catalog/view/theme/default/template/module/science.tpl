<?php if ($science) { ?>
<?php if($box) { ?>
	<div class="box">
		<div class="box-headings">
			<?php if($customtitle) { ?>
				<img src="/image/science.png?ver=1.0">
			<?php } ?>
		</div>
		<div class="box-content">

		
		<?php foreach ($science as $science_story) { ?>
			<div class="box-newss" style="padding-top:10px;">
				<span style="font-size:11px; color:#333; background:#ccc; padding:3px; border-radius:4px;"><?php echo $science_story['posted']; ?></span><br/>
				<?php if ($show_headline) { ?>
					<h4><?php echo $science_story['title']; ?></h4>
				<?php } ?>
				<div style="margin-top:10px;font-size:13px; color:#333;"><?php echo $science_story['description']; ?>.. </div>
				<a style="font-size:11px; text-align:right; color:#ff6633;display:block;" href="<?php echo $science_story['href']; ?>">подробнее>></a>
				
				
				
			</div>
		<?php } ?>
		
		<?php if($showbutton) { ?>
			<div style="text-align:right;">
				<a href="<?php echo $sciencelist; ?>" class="button"><span><?php echo $buttonlist; ?></span></a>
			</div>
		<?php } ?>
		</div>
	</div>
<?php } else { ?>
<article class="category-block">
	<a href="/blog/" class="pull-right btn black tablet desctop">Все статьи</a>
	<h2>Последние статьи</h2>
	<div class="slider science owl-carousel">
	<?php foreach ($science as $science_story) { ?>	
		<article class="item news-item">
			<div class="news-item__thumb">
				<a href="<?php echo $science_story['href']; ?>">
					<img src="<?php echo $science_story['image']; ?>?ver=1.0" alt="<?php echo $science_story['title']; ?>">
				</a>
			</div>
			<div class="news-item__date">
				<?php echo $science_story['posted']; ?>
			</div>
			<div class="news-item__title">
				<h2><a href="<?php echo $science_story['href']; ?>"><?php echo $science_story['title']; ?></a></h2>
			</div>
			<div class="news-item__stext">
				<?php echo $science_story['description']; ?>..
			</div>
			<a href="<?php echo $science_story['href']; ?>" class="link"></a>
		</article>
	<?php } ?>
	</div>
</article>


<?php } ?>
<?php } ?>