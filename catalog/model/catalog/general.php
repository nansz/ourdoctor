<?php

class ModelCatalogGeneral extends Model { 

	public function updateViewed($general_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "general SET viewed = (viewed + 1) WHERE general_id = '" . (int)$general_id . "'");
	}

	public function getGeneralStory($general_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a.general_id = '" . (int)$general_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}
	
    /* we compare and display recommended articles for news */
    /* сопоставляем и выводим рекомендуемые статьи для новостей */
    public function getArticlesRelated($product_id) {
        $product_data = array();
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general_related pr LEFT JOIN " . DB_PREFIX . "general p ON (pr.product_id = p.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store p2s ON (p.general_id = p2s.general_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1" . "' ");
        foreach ($query->rows as $result) {
            if( $product_id != $result['related_id'] )
            {
                $product_data[$result['related_id']] = $this->getArticle($result['related_id']);
            };
        }

        return $product_data;
    }

	public function getGeneral($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);

		return $query->rows;
	}

	public function getGeneralRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);

		return $query->rows;
	}

	public function getGeneralUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);

		return $query->rows;
	}
	public function getGeneralEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);

		return $query->rows;
	}


	public function getGeneralShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalGeneral() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	

	public function getTotalGeneralRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
	public function getTotalGeneralUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}	
	public function getTotalGeneralEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

    public function getProductImages($product_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

        return $query->rows;
    }

    public function getStaffStory($staff_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE a.staff_id = '" . (int)$staff_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");

        return $query->row;
    }

    /* we compare and display recommended general for news */
    /* сопоставляем и выводим рекомендуемые статьи для новостей */
    public function getgeneralRelated($product_id) {
        $product_data = array();
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "general_related pr LEFT JOIN " . DB_PREFIX . "general p ON (pr.product_id = p.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store p2s ON (p.general_id = p2s.general_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1" . "' ");
        foreach ($query->rows as $result) {
            if( $product_id != $result['related_id'] )
            {
                $product_data[$result['related_id']] = $this->getArticle($result['related_id']);
            };
        }

        return $product_data;
    }
    public function getArticle($articles_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "general a LEFT JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a.general_id = '" . (int)$articles_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");

        return $query->rows;
    }
}
?>
