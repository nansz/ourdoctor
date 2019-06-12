<?php

class ModelCatalogSterminytomography extends Model {

	public function addSterminytomography($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "sterminytomography SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "', date_added = now()");
	
		$sterminytomography_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET image = '" . $this->db->escape($data['image']) . "' WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		}
	
		foreach ($data['sterminytomography_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sterminytomography_description SET sterminytomography_id = '" . (int)$sterminytomography_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['sterminytomography_store'])) {
			foreach ($data['sterminytomography_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sterminytomography_to_store SET sterminytomography_id = '" . (int)$sterminytomography_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sterminytomography_id=" . (int)$sterminytomography_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sterminytomography');
	}

	public function editSterminytomography($sterminytomography_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "' WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET image = '" . $this->db->escape($data['image']) . "' WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sterminytomography SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminytomography_description WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
	
		foreach ($data['sterminytomography_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sterminytomography_description SET sterminytomography_id = '" . (int)$sterminytomography_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminytomography_to_store WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
	
		if (isset($data['sterminytomography_store'])) {		
			foreach ($data['sterminytomography_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sterminytomography_to_store SET sterminytomography_id = '" . (int)$sterminytomography_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminytomography_id=" . (int)$sterminytomography_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sterminytomography_id=" . (int)$sterminytomography_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sterminytomography');
	}

	public function deleteSterminytomography($sterminytomography_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminytomography WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminytomography_description WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sterminytomography_to_store WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminytomography_id=" . (int)$sterminytomography_id . "'");
	
		$this->cache->delete('sterminytomography');
	}

	public function getSterminytomographyStory($sterminytomography_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'sterminytomography_id=" . (int)$sterminytomography_id . "') AS keyword FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) WHERE a.sterminytomography_id = '" . (int)$sterminytomography_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getSterminytomographyDescriptions($sterminytomography_id) { 
		$sterminytomography_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography_description WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
	
		foreach ($query->rows as $result) {
			$sterminytomography_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_title' 	=> $result['meta_title'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $sterminytomography_description_data;
	}

	public function getSterminytomographyStores($sterminytomography_id) { 
		$sterminytomographypage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography_to_store WHERE sterminytomography_id = '" . (int)$sterminytomography_id . "'");
		
		foreach ($query->rows as $result) {
			$sterminytomographypage_store_data[] = $result['store_id'];
		}
	
		return $sterminytomographypage_store_data;
	}

	public function getSterminytomography() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sterminytomography a LEFT JOIN " . DB_PREFIX . "sterminytomography_description ad ON (a.sterminytomography_id = ad.sterminytomography_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalSterminytomography() { 
		$this->checkSterminytomography();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sterminytomography");
	
		return $query->row['total'];
	}

	public function checkSterminytomography() { 
		$create_sterminytomography = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminytomography` (`sterminytomography_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`sterminytomography_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminytomography);
	
		$create_sterminytomography_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminytomography_description` (`sterminytomography_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`sterminytomography_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminytomography_descriptions);
	
		$create_sterminytomography_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sterminytomography_to_store` (`sterminytomography_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`sterminytomography_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sterminytomography_to_store);
	}
}
?>