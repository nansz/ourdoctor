<?php echo $header; ?>
<?php if ($error_warning) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<?php echo $column_left; ?><?php echo $column_right; ?>

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
			<article class="container__middle">
				<div class="page__title">
					<h1><?php echo $heading_title; ?></h1>
				</div>

				
				
				
				<div class="registration">
					<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
						<p><?php echo $text_email; ?></p>
						<div class="content">
						  <table class="form">
							<tr>
							  <td><input type="text" name="email" placeholder="<?php echo $entry_email; ?>" value="" /></td>
							  <td><input type="submit" value="<?php echo $button_continue; ?>" class="btn" /></td>
							</tr>
						  </table>
						</div>
				    </form>
				</div>
				
			</article>
		</div>
	</div>
</div>




<?php echo $footer; ?>