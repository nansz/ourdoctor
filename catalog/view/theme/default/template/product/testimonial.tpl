<?php echo $header; ?>
<style>
	.reviews-title-box .container .row a::after {
		content: '<?php translate('Оставить отзыв', 'Залишити відгук', ''); ?>';
	}
</style>
<div class="breadcrumbs-box container">
<div class="row">
	<ul class="breadcrumbs start">
		<li><a href="/">Мдц-lux</a></li>
		<li><span><?php translate('Отзывы', 'Відгуки', ''); ?></span></li>
	</ul>
</div>
</div>
<?php if(isset($_GET['response'])) { ?><center style="color:#ff0000;"><?php echo $_GET['response']; ?></center><?php } ?>
<div class="container-fluid reviews-title-box">
	<div class="row">
		<div class="container">
			<div class="row">
				<h1><?php translate('Отзывы наших клиентов', 'Відгуки наших клієнтів', ''); ?></h1>
				
				<a href="#" class="add-review modal-trigger pull-right hidden-sm hidden-xs" data-modal="add-review"><img src="/img/add.svg" alt=""></a>
				<div class="center hidden-md hidden-lg col-md-12">
					<a href="#" class="add-review modal-trigger  " data-modal="add-review">+</a>
				</div>							
			</div>
		</div>
	</div>
</div>
<?php foreach ($testimonials as $testimonial) { ?>
	<div class="review-slide-array col-md-4">
		<div class="center">
			<div class="review-wrapper">
				<div class="reviev-icon center">
					<img src="/<?php echo $testimonial['title']; ?>" alt="">
				</div>
				<div class="review-user">
					<div class="hh2"><?php echo $testimonial['name']; ?></div>
				</div>
				<div class="review-date">
					<p><?php echo $testimonial['date_added']; ?></p>
				</div>
				<div class="review-text">
					<p><?php echo $testimonial['description2']; ?></p>
				</div>
				<div class="review-link center">
					<a href="#" class="modal-trigger" data-modal="review<?php echo $testimonial['id']; ?>"><?php translate('Читать отзыв полностью', 'Читати відгук повністю', ''); ?></a>
				</div>
			</div>
		</div>
	</div>
<?php } ?>

<?php foreach ($testimonials as $testimonial) { ?>
	<div class="modal modal-review" id="review<?php echo $testimonial['id']; ?>">
	  <div class="modal-sandbox"></div>
	  <div class="modal-box">
		<div class="modal-body">
		  <div class="review-slide-array-modal">
				<div class="center">
					<div class="review-wrapper">
						<div class="reviev-icon center">
							<img src="/<?php echo $testimonial['title']; ?>" alt="">
						</div>
						<div class="review-user">
							<div class="hh2"><?php echo $testimonial['name']; ?></div>
						</div>
						<div class="review-date">
							<p><?php echo $testimonial['date_added']; ?></p>
						</div>
						<div class="review-text">
							<p><?php echo $testimonial['description']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
<?php } ?>

<div class="modal" id="add-review">
  <div class="modal-sandbox"></div>
  <div class="modal-box">
	<div class="modal-header">
	   <div class="hh1"><?php translate('Оставьте ваш отзыв <br> и наш модератор с радостью <br> его проверит и опубликует', 'Залиште свій відгук <br> та наш модератор із задоволенням <br> перевірить його та опублікує', ''); ?></div>
	</div>
	<div class="modal-body">
	
	
		<form action="<?php echo $action; ?>" method="post" class="center column" enctype="multipart/form-data" id="testimonial">
			<!-- Следующие три inputa не удалять! -->
			<input type="hidden" name="title" value="-----" size = 90 /> 
			<input type="hidden" name="city" value="-----" />
			<input type="hidden" name="captcha" value="1" />
			<input style="display:none;" type="radio" name="rating" value="5" style="margin: 0;" checked="checked"/>
			
			<input type="text" required="required" name="name" placeholder="<?php translate('Имя', 'Ім`я', ''); ?>" value="<?php echo $name; ?>" /><br />
			<?php if ($error_name) { ?>
				<span class="error"><?php echo $error_name; ?></span>
			<?php } ?>
			<input type="text" required="required" name="email" placeholder="Email (<?php translate('Не для публикации', 'Не для публикації', ''); ?>)" value="<?php echo $email; ?>" /><br />
			<?php if ($error_email) { ?>
				<span class="error"><?php echo $error_email; ?></span>
			<?php } ?>
			<textarea name="description" required="required" placeholder="<?php translate('Сообщение', 'Повідомлення', ''); ?>" cols="30" rows="5"><?php echo $description; ?></textarea><br />
			<?php if ($error_enquiry) { ?>
				<span class="error"><?php echo $error_enquiry; ?></span>
			<?php } ?>
			  
			<div class="file_upload">
				<button type="button"><img src="img/clip.svg" alt="" class="icon"><?php translate('Добавить фото', 'Добавити фото', ''); ?></button>
				<div></div>
				<input type="file" name="file">            
			</div>
			<input type="submit" value="<?php translate('Отправить', 'Відправити', ''); ?>">
		</form>
	
	</div>
  </div>
</div>

<?php echo $footer; ?> 