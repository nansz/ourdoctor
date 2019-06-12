<?php echo $header; ?>
<?php if ($success) { ?>
<div class="success"><?php echo $success; ?></div>
<?php } ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>

<div class="main">
	<div class="container">

        <div class="breadcrumbs-box container">
            <div class="row">
                <ul class="breadcrumbs start">
                <?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
                    <?php if($i+1<count($breadcrumbs)) { ?>
                        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                    <?php } else { ?>
                        <li><span><?php echo $heading_title; ?></span></li>
                    <?php } ?>
                <?php } ?>
                </ul>


            </div>
        </div>

		<div class="page-content">
			<article class="container__middle">
                <center>
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>



				<div class="registration">
					<form action="<?php echo $action; ?>" class=" b-form" method="POST" enctype="multipart/form-data">


                      
                        <div>
							<input type="text" class="b-form__input" name="email" value="<?php echo $email; ?>" placeholder="<?php echo $entry_email; ?>" required="true">
						</div>
						<div>
							<input type="password"  class="b-form__input" name="password" value="<?php echo $password; ?>" placeholder="<?php echo $entry_password; ?>" required="true">
						</div>
						<div>
						<?php if ($redirect) { ?>
							<input type="hidden" name="redirect" value="<?php echo $redirect; ?>" />
						<?php } ?>
						</div>
						<div class="btn-wrap">
							<input type="submit" value="<?php echo $button_login; ?>" class="btn orange">
						</div>
						
						<br/>
							<span><a href="<?php echo $forgotten; ?>"><?php echo $text_forgotten; ?></a></span><br/>
							<a href="<?php echo $registers; ?>" class="btn">Регистрация</a>
					</form>
				</div>
                </center>

            </article>
		</div>
	</div>
</div>




 
<?php echo $footer; ?>