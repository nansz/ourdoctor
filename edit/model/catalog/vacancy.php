<?php


class ModelCatalogvacancy extends Model {

	public function addvacancy($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "vacancy SET status = '" . (int)$data['status'] . "', date_added = now()");
	
		$vacancy_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image = '" . $this->db->escape($data['image']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image1'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image1 = '" . $this->db->escape($data['image1']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image2'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image2 = '" . $this->db->escape($data['image2']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image3'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image3 = '" . $this->db->escape($data['image3']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image4'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image4 = '" . $this->db->escape($data['image4']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image5'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image5 = '" . $this->db->escape($data['image5']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image6'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image6 = '" . $this->db->escape($data['image6']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image7'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image7 = '" . $this->db->escape($data['image7']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image8'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image8 = '" . $this->db->escape($data['image8']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image9'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image9 = '" . $this->db->escape($data['image9']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image10'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image10']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image11'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image11']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image12'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image12']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image13'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image13']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image14'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image14']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image15'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image15']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}

		if (isset($data['page_url'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET page_url = '" . $this->db->escape($data['page_url']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}

	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
	
		foreach ($data['vacancy_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "vacancy_description SET vacancy_id = '" . (int)$vacancy_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "', description2 = '" . $this->db->escape($value['description2']) . "'");
		}
	
		if (isset($data['vacancy_store'])) {
			foreach ($data['vacancy_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "vacancy_to_store SET vacancy_id = '" . (int)$vacancy_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'vacancy_id=" . (int)$vacancy_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('vacancy');
	}

	public function editvacancy($vacancy_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET status = '" . (int)$data['status'] . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image = '" . $this->db->escape($data['image']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image1'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image1 = '" . $this->db->escape($data['image1']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image2'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image2 = '" . $this->db->escape($data['image2']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image3'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image3 = '" . $this->db->escape($data['image3']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image4'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image4 = '" . $this->db->escape($data['image4']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image5'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image5 = '" . $this->db->escape($data['image5']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image6'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image6 = '" . $this->db->escape($data['image6']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image7'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image7 = '" . $this->db->escape($data['image7']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image8'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image8 = '" . $this->db->escape($data['image8']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image9'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image9 = '" . $this->db->escape($data['image9']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['image10'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image10 = '" . $this->db->escape($data['image10']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image11'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image11 = '" . $this->db->escape($data['image11']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image12'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image12 = '" . $this->db->escape($data['image12']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image13'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image13 = '" . $this->db->escape($data['image13']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image14'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image14 = '" . $this->db->escape($data['image14']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['image15'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET image15 = '" . $this->db->escape($data['image15']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		if (isset($data['page_url'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET page_url = '" . $this->db->escape($data['page_url']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "vacancy SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "vacancy_description WHERE vacancy_id = '" . (int)$vacancy_id . "'");
	
		foreach ($data['vacancy_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "vacancy_description SET vacancy_id = '" . (int)$vacancy_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "', description2 = '" . $this->db->escape($value['description2']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "vacancy_to_store WHERE vacancy_id = '" . (int)$vacancy_id . "'");
	
		if (isset($data['vacancy_store'])) {		
			foreach ($data['vacancy_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "vacancy_to_store SET vacancy_id = '" . (int)$vacancy_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'vacancy_id=" . (int)$vacancy_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'vacancy_id=" . (int)$vacancy_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('vacancy');
	}

	public function deletevacancy($vacancy_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "vacancy WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "vacancy_description WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "vacancy_to_store WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'vacancy_id=" . (int)$vacancy_id . "'");
	
		$this->cache->delete('vacancy');
	}

	public function getvacancyStory($vacancy_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'vacancy_id=" . (int)$vacancy_id . "') AS keyword FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_description ad ON (a.vacancy_id = ad.vacancy_id) WHERE a.vacancy_id = '" . (int)$vacancy_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getvacancyDescriptions($vacancy_id) { 
		$vacancy_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vacancy_description WHERE vacancy_id = '" . (int)$vacancy_id . "'");
	
		foreach ($query->rows as $result) {
			$vacancy_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description'],
				'description2'      		=> $result['description2']
			);
		}
	
		return $vacancy_description_data;
	}

	public function getvacancyStores($vacancy_id) { 
		$vacancypage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vacancy_to_store WHERE vacancy_id = '" . (int)$vacancy_id . "'");
		
		foreach ($query->rows as $result) {
			$vacancypage_store_data[] = $result['store_id'];
		}
	
		return $vacancypage_store_data;
	}

	public function getvacancy() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "vacancy a LEFT JOIN " . DB_PREFIX . "vacancy_description ad ON (a.vacancy_id = ad.vacancy_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalvacancy() { 
		$this->checkvacancy();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "vacancy");
	
		return $query->row['total'];
	}

	public function checkvacancy() { 
		$create_vacancy = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "vacancy` (`vacancy_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`vacancy_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_vacancy);
	
		$create_vacancy_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "vacancy_description` (`vacancy_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, `description2` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`vacancy_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_vacancy_descriptions);
	
		$create_vacancy_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "vacancy_to_store` (`vacancy_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`vacancy_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_vacancy_to_store);
	}
}
?>