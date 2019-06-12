<?php

class ModelCatalogStaff extends Model { 

	public function updateViewed($staff_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "staff SET viewed = (viewed + 1) WHERE staff_id = '" . (int)$staff_id . "'");
	}

    public function getProductImages($product_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

        return $query->rows;
    }
	public function getStaffStory($staff_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE a.staff_id = '" . (int)$staff_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getStaff($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getStaffShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalStaff() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
}
?>
