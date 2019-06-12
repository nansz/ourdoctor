<?php echo $header; ?>
<style>
	.quickorders td {
		padding:5px !important;
	}
</style>
<div id="content">
	<div class="box">
		<div class="heading">
			<h1><img src="view/image/order.png" alt="" /> <?php echo "Заказы в один клик"; ?></h1>
		</div>
		<div class="content">
			<table class="list quickorders">
				<thead>
					<tr>
						<td>№ заказа</td>
						<td>Дата заказа</td>
						<td>Имя</td>
						<td>Телефон</td>
						<td>Название товара</td>
						<td>ID товара</td>
					</tr>					
				</thead>
				<tbody>
					<?php if ($orders) { ?>
					<?php foreach ($orders as $order) { ?>
						<tr>
						  <td><?php echo $order['id']; ?></td>
						  <td><?php echo $order['date_add']; ?></td>
						  <td><?php echo $order['name']; ?></td>
						  <td><?php echo $order['phone']; ?></td>
						  <td><a href="<?php echo $order['href']; ?>"><?php echo $order['product']; ?></a></td>
						  <td><?php echo $order['product_id']; ?></td>
						</tr>
					<?php } ?>
					<?php } else { ?>
						<tr>
							<td class="center" colspan="8"><?php echo "Заказов еще не было"; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php echo $footer; ?>