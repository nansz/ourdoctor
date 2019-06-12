<?php

class ModelCatalogPromotions extends Model {

	public function addPromotions($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "promotions SET status = '" . (int)$data['status'] . "', date_added = now()");
	
		$promotions_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "promotions SET image = '" . $this->db->escape($data['image']) . "' WHERE promotions_id = '" . (int)$promotions_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "promotions SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE promotions_id = '" . (int)$promotions_id . "'");
		}
	
		foreach ($data['promotions_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "promotions_description SET promotions_id = '" . (int)$promotions_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['promotions_store'])) {
			foreach ($data['promotions_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promotions_to_store SET promotions_id = '" . (int)$promotions_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'promotions_id=" . (int)$promotions_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('promotions');
	}

	public function editPromotions($promotions_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "promotions SET status = '" . (int)$data['status'] . "' WHERE promotions_id = '" . (int)$promotions_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "promotions SET image = '" . $this->db->escape($data['image']) . "' WHERE promotions_id = '" . (int)$promotions_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "promotions SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE promotions_id = '" . (int)$promotions_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "promotions_description WHERE promotions_id = '" . (int)$promotions_id . "'");
	
		foreach ($data['promotions_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "promotions_description SET promotions_id = '" . (int)$promotions_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "promotions_to_store WHERE promotions_id = '" . (int)$promotions_id . "'");
	
		if (isset($data['promotions_store'])) {		
			foreach ($data['promotions_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "promotions_to_store SET promotions_id = '" . (int)$promotions_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'promotions_id=" . (int)$promotions_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'promotions_id=" . (int)$promotions_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('promotions');
	}

	public function deletePromotions($promotions_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "promotions WHERE promotions_id = '" . (int)$promotions_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "promotions_description WHERE promotions_id = '" . (int)$promotions_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "promotions_to_store WHERE promotions_id = '" . (int)$promotions_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'promotions_id=" . (int)$promotions_id . "'");
	
		$this->cache->delete('promotions');
	}

	public function getPromotionsStory($promotions_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'promotions_id=" . (int)$promotions_id . "') AS keyword FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_description ad ON (a.promotions_id = ad.promotions_id) WHERE a.promotions_id = '" . (int)$promotions_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getPromotionsDescriptions($promotions_id) { 
		$promotions_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promotions_description WHERE promotions_id = '" . (int)$promotions_id . "'");
	
		foreach ($query->rows as $result) {
			$promotions_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $promotions_description_data;
	}

	public function getPromotionsStores($promotions_id) { 
		$promotionspage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promotions_to_store WHERE promotions_id = '" . (int)$promotions_id . "'");
		
		foreach ($query->rows as $result) {
			$promotionspage_store_data[] = $result['store_id'];
		}
	
		return $promotionspage_store_data;
	}

	public function getPromotions() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "promotions a LEFT JOIN " . DB_PREFIX . "promotions_description ad ON (a.promotions_id = ad.promotions_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalPromotions() { 
		$this->checkPromotions();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "promotions");
	
		return $query->row['total'];
	}

	public function checkPromotions() { 
		$create_promotions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "promotions` (`promotions_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`promotions_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_promotions);
	
		$create_promotions_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "promotions_description` (`promotions_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`promotions_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_promotions_descriptions);
	
		$create_promotions_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "promotions_to_store` (`promotions_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`promotions_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_promotions_to_store);
	}
}
?>