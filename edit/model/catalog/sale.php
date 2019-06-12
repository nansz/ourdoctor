<?php

class ModelCatalogSale extends Model {

	public function addSale($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "sale SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng '] . "', ukr = '" . (int)$data['ukr'] . "', rus = '" . (int)$data['rus'] . "', date_added = now()");
	
		$sale_id = $this->db->getLastId();
	
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sale SET image = '" . $this->db->escape($data['image']) . "' WHERE sale_id = '" . (int)$sale_id . "'");
		}
	
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sale SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sale_id = '" . (int)$sale_id . "'");
		}
	
		foreach ($data['sale_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sale_description SET sale_id = '" . (int)$sale_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		if (isset($data['sale_store'])) {
			foreach ($data['sale_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sale_to_store SET sale_id = '" . (int)$sale_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
		
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sale_id=" . (int)$sale_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sale');
	}

	public function editSale($sale_id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "sale SET status = '" . (int)$data['status'] . "', eng = '" . (int)$data['eng'] . "', rus = '" . (int)$data['rus'] . "', ukr = '" . (int)$data['ukr'] . "' WHERE sale_id = '" . (int)$sale_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sale SET image = '" . $this->db->escape($data['image']) . "' WHERE sale_id = '" . (int)$sale_id . "'");
		}
		
		if (isset($data['date_added'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "sale SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE sale_id = '" . (int)$sale_id . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "sale_description WHERE sale_id = '" . (int)$sale_id . "'");
	
		foreach ($data['sale_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "sale_description SET sale_id = '" . (int)$sale_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "'");
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "sale_to_store WHERE sale_id = '" . (int)$sale_id . "'");
	
		if (isset($data['sale_store'])) {		
			foreach ($data['sale_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "sale_to_store SET sale_id = '" . (int)$sale_id . "', store_id = '" . (int)$store_id . "'");
			}
		}
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sale_id=" . (int)$sale_id . "'");
	
		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'sale_id=" . (int)$sale_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}
	
		$this->cache->delete('sale');
	}

	public function deleteSale($sale_id) { 
		$this->db->query("DELETE FROM " . DB_PREFIX . "sale WHERE sale_id = '" . (int)$sale_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sale_description WHERE sale_id = '" . (int)$sale_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "sale_to_store WHERE sale_id = '" . (int)$sale_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'sale_id=" . (int)$sale_id . "'");
	
		$this->cache->delete('sale');
	}

	public function getSaleStory($sale_id) { 
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'sale_id=" . (int)$sale_id . "') AS keyword FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) WHERE a.sale_id = '" . (int)$sale_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");
	
		return $query->row;
	}

	public function getSaleDescriptions($sale_id) { 
		$sale_description_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale_description WHERE sale_id = '" . (int)$sale_id . "'");
	
		foreach ($query->rows as $result) {
			$sale_description_data[$result['language_id']] = array(
				'title'            			=> $result['title'],
				'meta_description' 	=> $result['meta_description'],
				'meta_title' 	=> $result['meta_title'],
				'meta_keyword' 	=> $result['meta_keyword'],
				'description'      		=> $result['description']
			);
		}
	
		return $sale_description_data;
	}

	public function getSaleStores($sale_id) { 
		$salepage_store_data = array();
	
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale_to_store WHERE sale_id = '" . (int)$sale_id . "'");
		
		foreach ($query->rows as $result) {
			$salepage_store_data[] = $result['store_id'];
		}
	
		return $salepage_store_data;
	}

	public function getSale() { 
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sale a LEFT JOIN " . DB_PREFIX . "sale_description ad ON (a.sale_id = ad.sale_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

		return $query->rows;
	}

	public function getTotalSale() { 
		$this->checkSale();
	
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sale");
	
		return $query->row['total'];
	}

	public function checkSale() { 
		$create_sale = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sale` (`sale_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`sale_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sale);
	
		$create_sale_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sale_description` (`sale_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`sale_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sale_descriptions);
	
		$create_sale_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "sale_to_store` (`sale_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`sale_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
		$this->db->query($create_sale_to_store);
	}
}
?>