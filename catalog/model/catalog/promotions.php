<?php

class ModelCatalogPromotions extends Model { 

	public function updateViewed($promotions_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "promotions SET viewed = (viewed + 1) WHERE promotions_id = '" . (int)$promotions_id . "'");
	}

	public function getPromotionsStory($promotions_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_description ad ON (a.promotions_id = ad.promotions_id) LEFT JOIN " . DB_PREFIX . "promotions_to_store a2s ON (a.promotions_id = a2s.promotions_id) WHERE a.promotions_id = '" . (int)$promotions_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getPromotions($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_description ad ON (a.promotions_id = ad.promotions_id) LEFT JOIN " . DB_PREFIX . "promotions_to_store a2s ON (a.promotions_id = a2s.promotions_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getPromotionsShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_description ad ON (a.promotions_id = ad.promotions_id) LEFT JOIN " . DB_PREFIX . "promotions_to_store a2s ON (a.promotions_id = a2s.promotions_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalPromotions() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_to_store a2s ON (a.promotions_id = a2s.promotions_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
