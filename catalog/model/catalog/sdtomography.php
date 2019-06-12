<?php

class ModelCatalogSdtomography extends Model { 

	public function updateViewed($sdtomography_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET viewed = (viewed + 1) WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
	}

	public function getSdtomographyStory($sdtomography_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE a.sdtomography_id = '" . (int)$sdtomography_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getSdtomography($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}
	public function getSdtomographyRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdtomographyUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSdtomographyEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function getSdtomographyShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalSdtomography() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSdtomographyRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSdtomographyUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSdtomographyEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_to_store a2s ON (a.sdtomography_id = a2s.sdtomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
