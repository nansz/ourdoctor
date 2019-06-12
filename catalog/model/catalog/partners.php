<?php

class ModelCatalogPartners extends Model { 

	public function updateViewed($partners_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "partners SET viewed = (viewed + 1) WHERE partners_id = '" . (int)$partners_id . "'");
	}

	public function getPartnersStory($partners_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_description ad ON (a.partners_id = ad.partners_id) LEFT JOIN " . DB_PREFIX . "partners_to_store a2s ON (a.partners_id = a2s.partners_id) WHERE a.partners_id = '" . (int)$partners_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getPartners($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_description ad ON (a.partners_id = ad.partners_id) LEFT JOIN " . DB_PREFIX . "partners_to_store a2s ON (a.partners_id = a2s.partners_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getPartnersShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_description ad ON (a.partners_id = ad.partners_id) LEFT JOIN " . DB_PREFIX . "partners_to_store a2s ON (a.partners_id = a2s.partners_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalPartners() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_to_store a2s ON (a.partners_id = a2s.partners_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
