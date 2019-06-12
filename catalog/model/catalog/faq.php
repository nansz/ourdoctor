<?php

class ModelCatalogFaq extends Model { 

	public function updateViewed($faq_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "faq SET viewed = (viewed + 1) WHERE faq_id = '" . (int)$faq_id . "'");
	}

	public function getFaqStory($faq_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_description ad ON (a.faq_id = ad.faq_id) LEFT JOIN " . DB_PREFIX . "faq_to_store a2s ON (a.faq_id = a2s.faq_id) WHERE a.faq_id = '" . (int)$faq_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getFaq($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_description ad ON (a.faq_id = ad.faq_id) LEFT JOIN " . DB_PREFIX . "faq_to_store a2s ON (a.faq_id = a2s.faq_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getFaqShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_description ad ON (a.faq_id = ad.faq_id) LEFT JOIN " . DB_PREFIX . "faq_to_store a2s ON (a.faq_id = a2s.faq_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalFaq() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_to_store a2s ON (a.faq_id = a2s.faq_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
