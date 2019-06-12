<?php

class ModelCatalogSale extends Model { 

	public function updateViewed($sale_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "sale SET viewed = (viewed + 1) WHERE sale_id = '" . (int)$sale_id . "'");
	}

	public function getSaleStory($sale_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE a.sale_id = '" . (int)$sale_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getSale($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}
	public function getSaleRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSaleUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSaleEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function getSaleShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalSale() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSaleRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSaleUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSaleEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_to_store a2s ON (a.sale_id = a2s.sale_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
