<?php echo $header; ?>
<div id="content">
	<div class="breadcrumb">
	<?php foreach ($breadcrumbs as $breadcrumb) { ?>
		<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
	</div>
	<?php if ($error_warning) { ?>
		<div class="warning"><?php echo $error_warning; ?></div>
	<?php } ?>
	<?php if ($success) { ?>
		<div class="success"><?php echo $success; ?></div>
	<?php } ?>
	<div class="box">
    <div class="heading">
		<h1><img src="view/image/announcement.png" alt="" /> <?php echo $heading_title; ?></h1>
		<div class="buttons">
			<a onclick="location = '<?php echo $insert; ?>'" class="button"><span><?php echo $button_insert; ?></span></a>
			<a onclick="$('#form').submit();" class="button"><span><?php echo $button_delete; ?></span></a>
		</div>
    </div>
    <div class="content">
		<form action="<?php echo $delete; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="list">
			<thead>
            <tr>
				<td width="1" align="center"><input type="checkbox" onclick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></td>
				<td class="left">Название</td>
				<td class="left">Статус</td>
				<td class="right">Действие</td>
            </tr>
			</thead>
			<tbody>
            <?php if ($tests) { ?>
				<?php $class = 'odd'; ?>
				<?php foreach ($tests as $value) { ?>
				<?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
				<tr class="<?php echo $class; ?>">
					<td align="center">
						<?php if ($value['selected']) { ?>
							<input type="checkbox" name="selected[]" value="<?php echo $value['tests_id']; ?>" checked="checked" />
						<?php } else { ?>
							<input type="checkbox" name="selected[]" value="<?php echo $value['tests_id']; ?>" />
						<?php } ?>
					</td>
					<td class="left"><?php echo $value['title']; ?></td>
					<td class="left"><?php echo $value['status']; ?></td>
					<td class="right">
						<?php foreach ($value['action'] as $action) { ?>  <a href="<?php echo $action['href']; ?>"><?php echo $action['text']; ?></a>  <?php } ?>
					</td>
				</tr>
				<?php } ?>
            <?php } else { ?>
				<tr class="even">
					<td class="center" colspan="7"><?php echo $text_no_results; ?></td>
				</tr>
            <?php } ?>
          </tbody>
        </table>
		</form>
    </div>
	</div>
</div>
<?php echo $footer; ?>