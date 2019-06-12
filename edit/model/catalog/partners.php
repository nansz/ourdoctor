<?php

class ModelCatalogPartners extends Model {

	public function addPartners($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "partners SET status = '" . (int)$data['status'] . "', date_added = '" . $this->db->escape($data['date_added']) . "'");
	
		$partners_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partners SET image = '" . $this->db->escape($data['image']) . "' WHERE partners_id = '" . (int)$partners_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partners SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE partners_id = '" . (int)$partners_id . "'");
		}
	
		foreach ($data['partners_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "partners_description SET partners_id = '" . (int)$partners_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', skype = '" . $this->db->escape($value['skype']) . "', map = '" . $this->db->escape($value['map']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['partners_store'])) {
			foreach ($data['partners_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "partners_to_store SET partners_id = '" . (int)$partners_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'partners_id=" . (int)$partners_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('partners');
	}

	public function editPartners($partners_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "partners SET status = '" . (int)$data['status'] . "' WHERE partners_id = '" . (int)$partners_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partners SET image = '" . $this->db->escape($data['image']) . "' WHERE partners_id = '" . (int)$partners_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "partners SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE partners_id = '" . (int)$partners_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "partners_description WHERE partners_id = '" . (int)$partners_id . "'");
	
		foreach ($data['partners_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "partners_description SET partners_id = '" . (int)$partners_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', skype = '" . $this->db->escape($value['skype']) . "', map = '" . $this->db->escape($value['map']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "partners_to_store WHERE partners_id = '" . (int)$partners_id . "'");
	
		if (isset($data['partners_store'])) {		
			foreach ($data['partners_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "partners_to_store SET partners_id = '" . (int)$partners_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'partners_id=" . (int)$partners_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'partners_id=" . (int)$partners_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('partners');
	}

	public function deletePartners($partners_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "partners WHERE partners_id = '" . (int)$partners_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "partners_description WHERE partners_id = '" . (int)$partners_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "partners_to_store WHERE partners_id = '" . (int)$partners_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'partners_id=" . (int)$partners_id . "'");
	
		$this->cache->delete('partners');
	}

	public function getPartnersStory($partners_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'partners_id=" . (int)$partners_id . "') AS keyword FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_description ad ON (a.partners_id = ad.partners_id) WHERE a.partners_id = '" . (int)$partners_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getPartnersDescriptions($partners_id) { 
		$partners_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partners_description WHERE partners_id = '" . (int)$partners_id . "'");
	
		foreach ($query->rows as $result) {
			$partners_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'skype' 	=> $result['skype'],
				'map' 	=> $result['map'],
				'description'      		=> $result['description']
			);
		}
	
		return $partners_description_data;
	}

	public function getPartnersStores($partners_id) { 
		$partnerspage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partners_to_store WHERE partners_id = '" . (int)$partners_id . "'");
		
		foreach ($query->rows as $result) {
			$partnerspage_store_data[] = $result['store_id'];
		}
	
		return $partnerspage_store_data;
	}

	public function getPartners() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "partners a LEFT JOIN " . DB_PREFIX . "partners_description ad ON (a.partners_id = ad.partners_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalPartners() { 
		$this->checkPartners();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "partners");
	
		return $query->row['total'];
	}

	public function checkPartners() { 
		$create_partners = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "partners` (`partners_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`partners_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_partners);
	
		$create_partners_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "partners_description` (`partners_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, `skype` varchar(255) COLLATE utf8_general_ci NOT NULL, `map` varchar(555) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`partners_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_partners_descriptions);
	
		$create_partners_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "partners_to_store` (`partners_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`partners_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_partners_to_store);
	}
}
?>