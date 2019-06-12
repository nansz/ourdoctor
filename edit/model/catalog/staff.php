<?php

class ModelCatalogStaff extends Model {

	public function addStaff($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "staff SET status = '" . (int)$data['status'] . "', experience = '" . (int)$data['experience'] . "', date_added = now()");
	
		$staff_id = $this->db->getLastId();

 
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image = '" . $this->db->escape($data['image']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image1'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image1 = '" . $this->db->escape($data['image1']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image2'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image2 = '" . $this->db->escape($data['image2']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image3'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image3 = '" . $this->db->escape($data['image3']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image4'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image4 = '" . $this->db->escape($data['image4']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image5'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image5 = '" . $this->db->escape($data['image5']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image6'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image6 = '" . $this->db->escape($data['image6']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image7'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image7 = '" . $this->db->escape($data['image7']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image8'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image8 = '" . $this->db->escape($data['image8']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image9'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image9 = '" . $this->db->escape($data['image9']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image10'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image10']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image11'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image11']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image12'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image12']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image13'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image13']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image14'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image14']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image15'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image15']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}

		if (isset($data['page_url'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET page_url = '" . $this->db->escape($data['page_url']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}


		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
	
		foreach ($data['staff_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "staff_description SET staff_id = '" . (int)$staff_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', position= '" . $this->db->escape($value['position']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description2 = '" . $this->db->escape($value['description2']) . "', description3 = '" . $this->db->escape($value['description3']) . "', description = '" . $this->db->escape($value['description']) . "'");

		}
	
		if (isset($data['staff_store'])) {
			foreach ($data['staff_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "staff_to_store SET staff_id = '" . (int)$staff_id . "', store_id = '" . (int)$store_id . "'");
			}
		}




           if (isset($data['product_images'])) {
               foreach ($data['product_images'] as $product_image) {
                   $this->db->query("INSERT INTO " . DB_PREFIX . "staff_сertificates_images SET product_id = '" . (int)$staff_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['images'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
               }
           }
        if (isset($data['product_imagez'])) {
            foreach ($data['product_imagez'] as $product_image) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "staff_image SET product_id = '" . (int)$staff_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['imagez'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
            }
        }

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'staff_id=" . (int)$staff_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('staff');
	}

	public function editStaff($staff_id, $data) {

		$this->db->query("UPDATE " . DB_PREFIX . "staff SET status = '" . (int)$data['status'] . "', experience = '" . (int)$data['experience'] .  "' WHERE staff_id = '" . (int)$staff_id . "'");

        var_dump($data['product_imagez']);
        $this->db->query("DELETE FROM " . DB_PREFIX . "staff_image WHERE product_id = '" . (int)$staff_id . "'");

        if (isset($data['product_imagez'])) {
            foreach ($data['product_imagez'] as $product_image) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "staff_image SET product_id = '" . (int)$staff_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['imagez'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
            }
        }

        var_dump($data['product_images']);
        $this->db->query("DELETE FROM " . DB_PREFIX . "staff_сertificates_images WHERE product_id = '" . (int)$staff_id . "'");

        if (isset($data['product_images'])) {
            foreach ($data['product_images'] as $product_image) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "staff_сertificates_images SET product_id = '" . (int)$staff_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['images'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
            }
        }



        if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image = '" . $this->db->escape($data['image']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image1'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image1 = '" . $this->db->escape($data['image1']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image2'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image2 = '" . $this->db->escape($data['image2']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image3'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image3 = '" . $this->db->escape($data['image3']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image4'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image4 = '" . $this->db->escape($data['image4']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image5'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image5 = '" . $this->db->escape($data['image5']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image6'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image6 = '" . $this->db->escape($data['image6']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image7'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image7 = '" . $this->db->escape($data['image7']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image8'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image8 = '" . $this->db->escape($data['image8']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image9'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image9 = '" . $this->db->escape($data['image9']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		if (isset($data['image10'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image10 = '" . $this->db->escape($data['image10']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image11'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image11 = '" . $this->db->escape($data['image11']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image12'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image12 = '" . $this->db->escape($data['image12']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image13'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image13 = '" . $this->db->escape($data['image13']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image14'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image14 = '" . $this->db->escape($data['image14']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['image15'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET image15 = '" . $this->db->escape($data['image15']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		if (isset($data['page_url'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET page_url = '" . $this->db->escape($data['page_url']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}

		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "staff SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE staff_id = '" . (int)$staff_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "staff_description WHERE staff_id = '" . (int)$staff_id . "'");
	
		foreach ($data['staff_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "staff_description SET staff_id = '" . (int)$staff_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', position= '" . $this->db->escape($value['position']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description3 = '" . $this->db->escape($value['description3']) . "', description2 = '" . $this->db->escape($value['description2']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "staff_to_store WHERE staff_id = '" . (int)$staff_id . "'");
	
		if (isset($data['staff_store'])) {		
			foreach ($data['staff_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "staff_to_store SET staff_id = '" . (int)$staff_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'staff_id=" . (int)$staff_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'staff_id=" . (int)$staff_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('staff');
	}

	public function deleteStaff($staff_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "staff             WHERE staff_id = '" . (int)$staff_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "staff_description WHERE staff_id = '" . (int)$staff_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "staff_image       WHERE product_id = '" . (int)$staff_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "staff_to_store    WHERE staff_id = '" . (int)$staff_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias         WHERE query = 'staff_id=" . (int)$staff_id . "'");
	
		$this->cache->delete('staff');
	}

    public function getProductImages($staff_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff_image WHERE product_id = '" . (int)$staff_id . "'");

        return $query->rows;
    }

    public function getCertificatesImages($staff_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff_сertificates_images WHERE product_id = '" . (int)$staff_id . "'");

        return $query->rows;
    }

	public function getStaffStory($staff_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'staff_id=" . (int)$staff_id . "') AS keyword FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) WHERE a.staff_id = '" . (int)$staff_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getStaffDescriptions($staff_id) { 
		$staff_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff_description WHERE staff_id = '" . (int)$staff_id . "'");
	
		foreach ($query->rows as $result) {
			$staff_description_data[$result['language_id']] = array(
				'title'            		=> $result['title'],
				'meta_description' 	    => $result['meta_description'],
				'meta_keyword' 	        => $result['meta_keyword'],
				'description'      		=> $result['description'],
                'description2'      		=> $result['description2'],
                'description3'      		=> $result['description3'],
                'position'      		=> $result['position'],
                'experience'      		=> $result['experience'],


			);
		}
	
		return $staff_description_data;
	}

	public function getStaffStores($staff_id) { 
		$staffpage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff_to_store WHERE staff_id = '" . (int)$staff_id . "'");
		
		foreach ($query->rows as $result) {
			$staffpage_store_data[] = $result['store_id'];
		}
	
		return $staffpage_store_data;
	}

	public function getStaff() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalStaff() { 
		$this->checkStaff();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "staff");
	
		return $query->row['total'];
	}

	public function checkStaff() { 
		$create_staff = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff` (`staff_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`staff_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_staff);
	
		$create_staff_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff_description` (`staff_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`staff_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_staff_descriptions);
	
		$create_staff_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff_to_store` (`staff_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`staff_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_staff_to_store);
	}
}
?>