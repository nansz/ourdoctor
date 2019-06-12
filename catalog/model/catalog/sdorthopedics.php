<?php

class ModelCatalogSdorthopedics extends Model { 

	public function updateViewed($sdorthopedics_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET viewed = (viewed + 1) WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
	}

	public function getSdorthopedicsStory($sdorthopedics_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE a.sdorthopedics_id = '" . (int)$sdorthopedics_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getSdorthopedics($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdorthopedicsRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdorthopedicsUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdorthopedicsEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdorthopedicsShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalSdorthopedics() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalSdorthopedicsRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalSdorthopedicsUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalSdorthopedicsEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_to_store a2s ON (a.sdorthopedics_id = a2s.sdorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
}
?>
