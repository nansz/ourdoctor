<?php

class ModelCatalogSdtomography extends Model {

	public function addSdtomography($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "sdtomography SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "', date_added = now()");
	
		$sdtomography_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET image = '" . $this->db->escape($data['image']) . "' WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		}
	
		foreach ($data['sdtomography_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sdtomography_description SET sdtomography_id = '" . (int)$sdtomography_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['sdtomography_store'])) {
			foreach ($data['sdtomography_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sdtomography_to_store SET sdtomography_id = '" . (int)$sdtomography_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sdtomography_id=" . (int)$sdtomography_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sdtomography');
	}

	public function editSdtomography($sdtomography_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "' WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET image = '" . $this->db->escape($data['image']) . "' WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sdtomography SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdtomography_description WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
	
		foreach ($data['sdtomography_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sdtomography_description SET sdtomography_id = '" . (int)$sdtomography_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdtomography_to_store WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
	
		if (isset($data['sdtomography_store'])) {		
			foreach ($data['sdtomography_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sdtomography_to_store SET sdtomography_id = '" . (int)$sdtomography_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sdtomography_id=" . (int)$sdtomography_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sdtomography_id=" . (int)$sdtomography_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sdtomography');
	}

	public function deleteSdtomography($sdtomography_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdtomography WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdtomography_description WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sdtomography_to_store WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sdtomography_id=" . (int)$sdtomography_id . "'");
	
		$this->cache->delete('sdtomography');
	}

	public function getSdtomographyStory($sdtomography_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'sdtomography_id=" . (int)$sdtomography_id . "') AS keyword FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) WHERE a.sdtomography_id = '" . (int)$sdtomography_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getSdtomographyDescriptions($sdtomography_id) { 
		$sdtomography_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography_description WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
	
		foreach ($query->rows as $result) {
			$sdtomography_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_title' 	=> $result['meta_title'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $sdtomography_description_data;
	}

	public function getSdtomographyStores($sdtomography_id) { 
		$sdtomographypage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography_to_store WHERE sdtomography_id = '" . (int)$sdtomography_id . "'");
		
		foreach ($query->rows as $result) {
			$sdtomographypage_store_data[] = $result['store_id'];
		}
	
		return $sdtomographypage_store_data;
	}

	public function getSdtomography() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sdtomography a LEFT JOIN " . DB_PREFIX . "sdtomography_description ad ON (a.sdtomography_id = ad.sdtomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalSdtomography() { 
		$this->checkSdtomography();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sdtomography");
	
		return $query->row['total'];
	}

	public function checkSdtomography() { 
		$create_sdtomography = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdtomography` (`sdtomography_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`sdtomography_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdtomography);
	
		$create_sdtomography_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdtomography_description` (`sdtomography_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`sdtomography_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdtomography_descriptions);
	
		$create_sdtomography_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sdtomography_to_store` (`sdtomography_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`sdtomography_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sdtomography_to_store);
	}
}
?>