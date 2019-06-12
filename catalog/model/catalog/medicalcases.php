<?php

class ModelCatalogmedicalcases extends Model {

	public function updateViewed($medicalcases_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET viewed = (viewed + 1) WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
	}

	public function getArticlesStory($medicalcases_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.medicalcases_id = '" . (int)$medicalcases_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getArticles($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

    public function getStaffStory($staff_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE a.staff_id = '" . (int)$staff_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");

        return $query->row;
    }

	/* we compare and display recommended articles for news */
    /* сопоставляем и выводим рекомендуемые статьи для новостей */
    public function getArticlesRelated($product_id) {
        $product_data = array();
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_related pr LEFT JOIN " . DB_PREFIX . "medicalcases p ON (pr.product_id = p.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store p2s ON (p.medicalcases_id = p2s.medicalcases_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1" . "' ");
        foreach ($query->rows as $result) {
            if( $product_id != $result['related_id'] )
            {
            	$product_data[$result['related_id']] = $this->getArticle($result['related_id']);
            };
        }

        return $product_data;
    }

    public function getArticle($medicalcases_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.medicalcases_id = '" . (int)$medicalcases_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");

        return $query->rows;
    }

    public function getArticlesRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getArticlesUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getArticlesEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getArticlesShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

    public function getTotalArticles() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

    public function getProductImages($product_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

        return $query->rows;
    }

	public function getTotalArticlesRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalArticlesUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalArticlesEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}
}
?>
