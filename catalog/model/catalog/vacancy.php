<?php

class ModelCatalogVacancy extends Model { 

	public function updateViewed($vacancy_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET viewed = (viewed + 1) WHERE vacancy_id = '" . (int)$vacancy_id . "'");
	}

	public function getvacancyStory($vacancy_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_description ad ON (a.vacancy_id = ad.vacancy_id) LEFT JOIN " . DB_PREFIX . "vacancy_to_store a2s ON (a.vacancy_id = a2s.vacancy_id) WHERE a.vacancy_id = '" . (int)$vacancy_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getvacancy($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_description ad ON (a.vacancy_id = ad.vacancy_id) LEFT JOIN " . DB_PREFIX . "vacancy_to_store a2s ON (a.vacancy_id = a2s.vacancy_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getvacancyShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_description ad ON (a.vacancy_id = ad.vacancy_id) LEFT JOIN " . DB_PREFIX . "vacancy_to_store a2s ON (a.vacancy_id = a2s.vacancy_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalvacancy() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_to_store a2s ON (a.vacancy_id = a2s.vacancy_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
