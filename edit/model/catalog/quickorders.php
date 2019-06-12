<?php
class ModelCatalogQuickorders extends Model {
	public function getOrders() {
		$query = $this->db->query("SELECT * FROM sq_orders ORDER BY id DESC");
		return $query->rows;
	}
}
?>