<?php

class ModelCatalogFaq extends Model {

	public function addFaq($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "faq SET status = '" . (int)$data['status'] . "', date_added = now()");
	
		$faq_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "faq SET image = '" . $this->db->escape($data['image']) . "' WHERE faq_id = '" . (int)$faq_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "faq SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE faq_id = '" . (int)$faq_id . "'");
		}
	
		foreach ($data['faq_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "faq_description SET faq_id = '" . (int)$faq_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['faq_store'])) {
			foreach ($data['faq_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "faq_to_store SET faq_id = '" . (int)$faq_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'faq_id=" . (int)$faq_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('faq');
	}

	public function editFaq($faq_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "faq SET status = '" . (int)$data['status'] . "' WHERE faq_id = '" . (int)$faq_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "faq SET image = '" . $this->db->escape($data['image']) . "' WHERE faq_id = '" . (int)$faq_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "faq SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE faq_id = '" . (int)$faq_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "faq_description WHERE faq_id = '" . (int)$faq_id . "'");
	
		foreach ($data['faq_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "faq_description SET faq_id = '" . (int)$faq_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "faq_to_store WHERE faq_id = '" . (int)$faq_id . "'");
	
		if (isset($data['faq_store'])) {		
			foreach ($data['faq_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "faq_to_store SET faq_id = '" . (int)$faq_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'faq_id=" . (int)$faq_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'faq_id=" . (int)$faq_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('faq');
	}

	public function deleteFaq($faq_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "faq WHERE faq_id = '" . (int)$faq_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "faq_description WHERE faq_id = '" . (int)$faq_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "faq_to_store WHERE faq_id = '" . (int)$faq_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'faq_id=" . (int)$faq_id . "'");
	
		$this->cache->delete('faq');
	}

	public function getFaqStory($faq_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'faq_id=" . (int)$faq_id . "') AS keyword FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_description ad ON (a.faq_id = ad.faq_id) WHERE a.faq_id = '" . (int)$faq_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getFaqDescriptions($faq_id) { 
		$faq_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "faq_description WHERE faq_id = '" . (int)$faq_id . "'");
	
		foreach ($query->rows as $result) {
			$faq_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $faq_description_data;
	}

	public function getFaqStores($faq_id) { 
		$faqpage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "faq_to_store WHERE faq_id = '" . (int)$faq_id . "'");
		
		foreach ($query->rows as $result) {
			$faqpage_store_data[] = $result['store_id'];
		}
	
		return $faqpage_store_data;
	}

	public function getFaq() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "faq a LEFT JOIN " . DB_PREFIX . "faq_description ad ON (a.faq_id = ad.faq_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalFaq() { 
		$this->checkFaq();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "faq");
	
		return $query->row['total'];
	}

	public function checkFaq() { 
		$create_faq = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "faq` (`faq_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`faq_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_faq);
	
		$create_faq_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "faq_description` (`faq_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`faq_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_faq_descriptions);
	
		$create_faq_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "faq_to_store` (`faq_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`faq_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_faq_to_store);
	}
}
?>