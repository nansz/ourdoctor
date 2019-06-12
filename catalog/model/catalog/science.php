<?php

class ModelCatalogScience extends Model { 

	public function updateViewed($science_id) {
		$this->db->query("UPDATE " . DB_PREFIX . "science SET viewed = (viewed + 1) WHERE science_id = '" . (int)$science_id . "'");
	}

	public function getScienceStory($science_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a.science_id = '" . (int)$science_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		return $query->row;
	}

	public function getScience($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getScienceRus($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getScienceUkr($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}

	public function getScienceEng($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function getScienceShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit); 
	
		return $query->rows;
	}

	public function getTotalScience() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalScienceRus() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.rus = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalScienceUkr() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.ukr = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}

	public function getTotalScienceEng() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1' AND a.eng = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}




    public function getProductImages($product_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science_image WHERE product_id = '" . (int)$product_id . "' ORDER BY sort_order ASC");

        return $query->rows;
    }

    public function getStaffStory($staff_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) LEFT JOIN " . DB_PREFIX . "staff_to_store a2s ON (a.staff_id = a2s.staff_id) WHERE a.staff_id = '" . (int)$staff_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'  ");

        return $query->row;
    }

    /* we compare and display recommended science for news */
    /* сопоставляем и выводим рекомендуемые статьи для новостей */
    public function getscienceRelated($product_id) {
        $product_data = array();
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "science_related pr LEFT JOIN " . DB_PREFIX . "science p ON (pr.product_id = p.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store p2s ON (p.science_id = p2s.science_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1" . "' ");
        foreach ($query->rows as $result) {
            if( $product_id != $result['related_id'] )
            {
                $product_data[$result['related_id']] = $this->getArticle($result['related_id']);
            };
        }

        return $product_data;
    }
    public function getArticle($articles_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "science a LEFT JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a.science_id = '" . (int)$articles_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");

        return $query->rows;
    }
   
}
?>
