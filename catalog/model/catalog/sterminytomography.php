<?php

class ModelCatalogSterminytomography extends Model { 

	public function updateViewed($sterminytomography_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET viewed = (viewed + 1) WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
	}

	public function getSterminytomographyStory($sterminytomography_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE a.sterminytomography_id = '" . (int)$sterminytomography_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getSterminytomography($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}
	public function getSterminytomographyRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSterminytomographyUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getSterminytomographyEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function getSterminytomographyShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalSterminytomography() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSterminytomographyRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSterminytomographyUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
	public function getTotalSterminytomographyEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_to_store a2s ON (a.sterminytomography_id = a2s.sterminytomography_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
