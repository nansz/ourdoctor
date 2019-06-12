<?php

class ModelCatalogSdorthopedics extends Model {

	public function addSdorthopedics($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "sdorthopedics SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "', date_added = now()");
	
		$sdorthopedics_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET image = '" . $this->db->escape($data['image']) . "' WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		}
	
		foreach ($data['sdorthopedics_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sdorthopedics_description SET sdorthopedics_id = '" . (int)$sdorthopedics_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['sdorthopedics_store'])) {
			foreach ($data['sdorthopedics_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sdorthopedics_to_store SET sdorthopedics_id = '" . (int)$sdorthopedics_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sdorthopedics_id=" . (int)$sdorthopedics_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sdorthopedics');
	}

	public function editSdorthopedics($sdorthopedics_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "' WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET image = '" . $this->db->escape($data['image']) . "' WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdorthopedics SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdorthopedics_description WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
	
		foreach ($data['sdorthopedics_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sdorthopedics_description SET sdorthopedics_id = '" . (int)$sdorthopedics_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdorthopedics_to_store WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
	
		if (isset($data['sdorthopedics_store'])) {		
			foreach ($data['sdorthopedics_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sdorthopedics_to_store SET sdorthopedics_id = '" . (int)$sdorthopedics_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sdorthopedics_id=" . (int)$sdorthopedics_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sdorthopedics_id=" . (int)$sdorthopedics_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sdorthopedics');
	}

	public function deleteSdorthopedics($sdorthopedics_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdorthopedics WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdorthopedics_description WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdorthopedics_to_store WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sdorthopedics_id=" . (int)$sdorthopedics_id . "'");
	
		$this->cache->delete('sdorthopedics');
	}

	public function getSdorthopedicsStory($sdorthopedics_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'sdorthopedics_id=" . (int)$sdorthopedics_id . "') AS keyword FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) WHERE a.sdorthopedics_id = '" . (int)$sdorthopedics_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getSdorthopedicsDescriptions($sdorthopedics_id) { 
		$sdorthopedics_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics_description WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
	
		foreach ($query->rows as $result) {
			$sdorthopedics_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_title' 	=> $result['meta_title'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $sdorthopedics_description_data;
	}

	public function getSdorthopedicsStores($sdorthopedics_id) { 
		$sdorthopedicspage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics_to_store WHERE sdorthopedics_id = '" . (int)$sdorthopedics_id . "'");
		
		foreach ($query->rows as $result) {
			$sdorthopedicspage_store_data[] = $result['store_id'];
		}
	
		return $sdorthopedicspage_store_data;
	}

	public function getSdorthopedics() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdorthopedics a LEFT JOIN " . DB_PREFIX . "sdorthopedics_description ad ON (a.sdorthopedics_id = ad.sdorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalSdorthopedics() { 
		$this->checkSdorthopedics();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdorthopedics");
	
		return $query->row['total'];
	}

	public function checkSdorthopedics() { 
		$create_sdorthopedics = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdorthopedics` (`sdorthopedics_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`sdorthopedics_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdorthopedics);
	
		$create_sdorthopedics_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdorthopedics_description` (`sdorthopedics_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`sdorthopedics_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdorthopedics_descriptions);
	
		$create_sdorthopedics_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdorthopedics_to_store` (`sdorthopedics_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`sdorthopedics_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdorthopedics_to_store);
	}
}
?>