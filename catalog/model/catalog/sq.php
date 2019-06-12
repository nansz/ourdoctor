<?php
class ModelCatalogSq extends Model {
	public function addSq($data) {
		$this->db->query("set names utf8");
		$this->db->query("INSERT INTO sq_orders SET date_add = NOW(), `name` = '" . $data['name'] . "', `phone` = '" . $data['phone'] . "', `product` = '" . $data['product'] . "', `product_id` = '" . $data['product_id'] . "'");
	}
}
?>