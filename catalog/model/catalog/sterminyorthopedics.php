<?php

class ModelCatalogSterminyorthopedics extends Model { 

	public function updateViewed($sterminyorthopedics_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET viewed = (viewed + 1) WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
	}

	public function getSterminyorthopedicsStory($sterminyorthopedics_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE a.sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getSterminyorthopedics($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSterminyorthopedicsRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSterminyorthopedicsUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSterminyorthopedicsEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function getSterminyorthopedicsShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalSterminyorthopedics() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalSterminyorthopedicsRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	

	public function getTotalSterminyorthopedicsUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	

	public function getTotalSterminyorthopedicsEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_to_store a2s ON (a.sterminyorthopedics_id = a2s.sterminyorthopedics_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	

}
?>
