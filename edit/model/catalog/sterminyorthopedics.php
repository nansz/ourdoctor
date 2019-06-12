<?php

class ModelCatalogSterminyorthopedics extends Model {

	public function addSterminyorthopedics($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "sterminyorthopedics SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "', date_added = now()");
	
		$sterminyorthopedics_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET image = '" . $this->db->escape($data['image']) . "' WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		}
	
		foreach ($data['sterminyorthopedics_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sterminyorthopedics_description SET sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['sterminyorthopedics_store'])) {
			foreach ($data['sterminyorthopedics_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sterminyorthopedics_to_store SET sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sterminyorthopedics_id=" . (int)$sterminyorthopedics_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sterminyorthopedics');
	}

	public function editSterminyorthopedics($sterminyorthopedics_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "' WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET image = '" . $this->db->escape($data['image']) . "' WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminyorthopedics SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminyorthopedics_description WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
	
		foreach ($data['sterminyorthopedics_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sterminyorthopedics_description SET sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminyorthopedics_to_store WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
	
		if (isset($data['sterminyorthopedics_store'])) {		
			foreach ($data['sterminyorthopedics_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sterminyorthopedics_to_store SET sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminyorthopedics_id=" . (int)$sterminyorthopedics_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sterminyorthopedics_id=" . (int)$sterminyorthopedics_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sterminyorthopedics');
	}

	public function deleteSterminyorthopedics($sterminyorthopedics_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminyorthopedics WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminyorthopedics_description WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminyorthopedics_to_store WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminyorthopedics_id=" . (int)$sterminyorthopedics_id . "'");
	
		$this->cache->delete('sterminyorthopedics');
	}

	public function getSterminyorthopedicsStory($sterminyorthopedics_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminyorthopedics_id=" . (int)$sterminyorthopedics_id . "') AS keyword FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) WHERE a.sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getSterminyorthopedicsDescriptions($sterminyorthopedics_id) { 
		$sterminyorthopedics_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics_description WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
	
		foreach ($query->rows as $result) {
			$sterminyorthopedics_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_title' 	=> $result['meta_title'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $sterminyorthopedics_description_data;
	}

	public function getSterminyorthopedicsStores($sterminyorthopedics_id) { 
		$sterminyorthopedicspage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics_to_store WHERE sterminyorthopedics_id = '" . (int)$sterminyorthopedics_id . "'");
		
		foreach ($query->rows as $result) {
			$sterminyorthopedicspage_store_data[] = $result['store_id'];
		}
	
		return $sterminyorthopedicspage_store_data;
	}

	public function getSterminyorthopedics() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminyorthopedics a LEFT JOIN " . DB_PREFIX . "sterminyorthopedics_description ad ON (a.sterminyorthopedics_id = ad.sterminyorthopedics_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalSterminyorthopedics() { 
		$this->checkSterminyorthopedics();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminyorthopedics");
	
		return $query->row['total'];
	}

	public function checkSterminyorthopedics() { 
		$create_sterminyorthopedics = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminyorthopedics` (`sterminyorthopedics_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`sterminyorthopedics_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminyorthopedics);
	
		$create_sterminyorthopedics_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminyorthopedics_description` (`sterminyorthopedics_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`sterminyorthopedics_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminyorthopedics_descriptions);
	
		$create_sterminyorthopedics_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminyorthopedics_to_store` (`sterminyorthopedics_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`sterminyorthopedics_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminyorthopedics_to_store);
	}
}
?>