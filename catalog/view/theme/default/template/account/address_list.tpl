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
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>
			
			<h2><?php echo $heading_title; ?></h2>
			<div class="content change">
				<p><?php echo $text_address_book; ?></p>
				<table>
					<?php foreach ($addresses as $result) { ?>
						<tr class="adress-info">
							<td><?php echo $result['address']; ?></td>
							<td> <a href="<?php echo $result['update']; ?>">Редактировать</a> <a href="<?php echo $result['delete']; ?>">Удалить</a></td>
						</tr>
					<?php } ?>
					<tr>
						<td><a href="<?php echo $back; ?>" class="btn">Назад</a></td>
						<td><a href="<?php echo $insert; ?>" class="btn">Продолжить</a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

<?php echo $footer; ?>