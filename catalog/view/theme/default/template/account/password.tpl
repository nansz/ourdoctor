<?php echo $header; ?>
<style>
	input.btn {
		height: 45px;
		width: 150px;
	}
</style>
<div class="main">
	<div class="container">
		<div class="breadcrumb">
			<?php foreach ($breadcrumbs as $i=> $breadcrumb) { ?>
				<?php if($i+1<count($breadcrumbs)) { ?>
					<a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a> | 
				<?php } else { ?><span><?php echo $breadcrumb['text']; ?></span><?php } ?>
			<?php } ?>
		</div>
			
			<h2>Смена пароля</h2>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<div class="content change">
				<table>
					<tr>
						<td>* Пароль</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>* Подтвердите пароль</td>
						<td><input type="password" name="confirm"></td>
					</tr>
					<tr>
						<td><a href="/my-account/" class="btn">Назад</a></td>
						<td><input type="submit" value="<?php echo $button_continue; ?>" class="btn" /></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
	</div>


<?php echo $footer; ?>