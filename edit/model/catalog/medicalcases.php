<?php

class ModelCatalogmedicalcases extends Model
{

    public function addmedicalcases($data)
    {

        $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases SET status = '" . (int)$data['status'] . "', rus='" . $data['rus'] . "',eng='" . $data['eng'] . "', ukr='" . $data['ukr'] . "', hrefwebsite = '" . $this->db->escape($data['hrefwebsite']) . "', author = '" . $this->db->escape($data['author_name']) . "', author_id = '" . $this->db->escape($data['author_id']) . "', date_added = now()");

        $medicalcases_id = $this->db->getLastId();

        if (isset($data['image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET image = '" . $this->db->escape($data['image']) . "' WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        }

        if (isset($data['date_added'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        }

        foreach ($data['medicalcases_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_description SET medicalcases_id = '" . (int)$medicalcases_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "', description2 = '" . $this->db->escape($value['description2']) . "', description3 = '" . $this->db->escape($value['description3']) . "'");
        }

        if (isset($data['medicalcases_store'])) {
            foreach ($data['medicalcases_store'] as $store_id) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_to_store SET medicalcases_id = '" . (int)$medicalcases_id . "', store_id = '" . (int)$store_id . "'");
            }
        }

        if (isset($data['product_image'])) {
            foreach ($data['product_image'] as $product_image) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_image SET product_id = '" . (int)$medicalcases_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
            }
        }

        if (isset($data['product_related'])) {
            foreach ($data['product_related'] as $related_id) {
                $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE product_id = '" . (int)$medicalcases_id . "' AND related_id = '" . (int)$related_id . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_related SET product_id = '" . (int)$medicalcases_id . "', related_id = '" . (int)$related_id . "'");
                $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$medicalcases_id . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$medicalcases_id . "'");
            }
        }

        if ($data['keyword']) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'medicalcases_id=" . (int)$medicalcases_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
        }

        $this->cache->delete('medicalcases');
    }

    public function editmedicalcases($medicalcases_id, $data)
    {


        $this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET status = '" . (int)$data['status'] . "', rus='" . (int)$data['rus'] . "',eng='" . (int)$data['eng'] . "', ukr='" . (int)$data['ukr'] . "', hrefwebsite = '" . $this->db->escape($data['hrefwebsite']) . "', author = '" . $this->db->escape($data['author_name']) . "', author_id = '" . $this->db->escape($data['author_id']) . "' WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");

        if (isset($data['image'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET image = '" . $this->db->escape($data['image']) . "' WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        }

        if (isset($data['date_added'])) {
            $this->db->query("UPDATE " . DB_PREFIX . "medicalcases SET date_added = '" . $this->db->escape($data['date_added']) . "' WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        }

        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_description WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");

        foreach ($data['medicalcases_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_description SET medicalcases_id = '" . (int)$medicalcases_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', meta_title = '" . $this->db->escape($value['meta_title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', description = '" . $this->db->escape($value['description']) . "', description2 = '" . $this->db->escape($value['description2']) . "', description3 = '" . $this->db->escape($value['description3']) ."'");
        }

        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE related_id = '" . (int)$medicalcases_id . "'");

        if (isset($data['product_related'])) {
            foreach ($data['product_related'] as $related_id) {
                $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE product_id = '" . (int)$medicalcases_id . "' AND related_id = '" . (int)$related_id . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_related SET product_id = '" . (int)$medicalcases_id . "', related_id = '" . (int)$related_id . "'");
                $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$medicalcases_id . "'");
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$medicalcases_id . "'");
            }
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_to_store WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");

        if (isset($data['medicalcases_store'])) {
            foreach ($data['medicalcases_store'] as $store_id) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_to_store SET medicalcases_id = '" . (int)$medicalcases_id . "', store_id = '" . (int)$store_id . "'");
            }
        }
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_image WHERE product_id = '" . (int)$medicalcases_id . "'");

        if (isset($data['product_image'])) {
            foreach ($data['product_image'] as $product_image) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "medicalcases_image SET product_id = '" . (int)$medicalcases_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
            }
        }

        $this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'medicalcases_id=" . (int)$medicalcases_id . "'");

        if ($data['keyword']) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'medicalcases_id=" . (int)$medicalcases_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
        }

        $this->cache->delete('medicalcases');
    }


    public function getProducts($data = array()) {
        if ($data) {
            $sql = "SELECT p.*, pd.*,  title as 'm_name' FROM " . DB_PREFIX . "medicalcases p LEFT JOIN " . DB_PREFIX . "medicalcases_description pd ON (p.medicalcases_id = pd.medicalcases_id)";

            $sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'";

            if (!empty($data['filter_name'])) {
                $sql .= " AND LCASE(pd.title) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
            }

            if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
                $sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
            }


            $sql .= " GROUP BY p.medicalcases_id";

            $sort_data = array(
                'pd.title',
                'p.status',
                'p.sort_order'
            );

            if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
                $sql .= " ORDER BY " . $data['sort'];
            } else {
                $sql .= " ORDER BY pd.title";
            }

            if (isset($data['order']) && ($data['order'] == 'DESC')) {
                $sql .= " DESC";
            } else {
                $sql .= " ASC";
            }

            if (isset($data['start']) || isset($data['limit'])) {
                if ($data['start'] < 0) {
                    $data['start'] = 0;
                }

                if ($data['limit'] < 1) {
                    $data['limit'] = 20;
                }

                $sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
            }

            $query = $this->db->query($sql);

            return $query->rows;
        } else {
            $product_data = $this->cache->get('product.' . (int)$this->config->get('config_language_id'));

            if (!$product_data) {
                $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases p LEFT JOIN " . DB_PREFIX . "medicalcases_description pd ON (p.medicalcases_id = pd.medicalcases_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY pd.title ASC");

                $product_data = $query->rows;

                $this->cache->set('product.' . (int)$this->config->get('config_language_id'), $product_data);
            }

            return $product_data;
        }
    }



    public function getProductRelated($product_id)
    {
        $product_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_related pr LEFT JOIN " . DB_PREFIX . "medicalcases p ON (pr.related_id = p.medicalcases_id) LEFT JOIN " . DB_PREFIX . "medicalcases_to_store p2s ON (p.medicalcases_id = p2s.medicalcases_id) WHERE pr.product_id = '" . (int)$product_id . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'");

        foreach ($query->rows as $result) {
            if ($product_id != $result['related_id']) $product_data[$result['related_id']] = $this->getProduct($result['related_id']);
        }

        return $product_data;
    }

    public function getProduct($product_id)
    {

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases p LEFT JOIN " . DB_PREFIX . "medicalcases_description pd ON (p.medicalcases_id = pd.medicalcases_id) WHERE p.medicalcases_id = '" . (int)$product_id . "'");
        return $query->row;
    }

    public function getStaff()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "staff a LEFT JOIN " . DB_PREFIX . "staff_description ad ON (a.staff_id = ad.staff_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

        return $query->rows;
    }

    public function getProductSpecials($product_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' ORDER BY priority, price");

        return $query->rows;
    }

    public function deletemedicalcases($medicalcases_id)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_description WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_image WHERE product_id = '" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_to_store WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'medicalcases_id=" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE product_id = '" . (int)$medicalcases_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "medicalcases_related WHERE related_id = '" . (int)$medicalcases_id . "'");


        $this->cache->delete('medicalcases');
    }

    public function getProductImages($product_id)
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_image WHERE product_id = '" . (int)$product_id . "'");

        return $query->rows;
    }

    public function getmedicalcasesStory($medicalcases_id)
    {
        $query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'medicalcases_id=" . (int)$medicalcases_id . "') AS keyword FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) WHERE a.medicalcases_id = '" . (int)$medicalcases_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "'");

        return $query->row;
    }

    public function getmedicalcasesDescriptions($medicalcases_id)
    {
        $medicalcases_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_description WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");

        foreach ($query->rows as $result) {
            $medicalcases_description_data[$result['language_id']] = array(
                'title' => $result['title'],
                'meta_description' => $result['meta_description'],
                'meta_title' => $result['meta_title'],
                'meta_keyword' => $result['meta_keyword'],
                'description'      		    => $result['description'],
                'description2'      		=> $result['description2'],
                'description3'      		=> $result['description3'],
            );
        }

        return $medicalcases_description_data;
    }

    public function getmedicalcasesStores($medicalcases_id)
    {
        $medicalcasespage_store_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases_to_store WHERE medicalcases_id = '" . (int)$medicalcases_id . "'");

        foreach ($query->rows as $result) {
            $medicalcasespage_store_data[] = $result['store_id'];
        }

        return $medicalcasespage_store_data;
    }

    public function getmedicalcases()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medicalcases a LEFT JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

        return $query->rows;
    }

    public function getTotalmedicalcases()
    {
        $this->checkmedicalcases();

        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "medicalcases");

        return $query->row['total'];
    }

    public function checkmedicalcases()
    {
        $create_medicalcases= "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "medicalcases` (`medicalcases_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`medicalcases_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
        $this->db->query($create_medicalcases);

        $create_medicalcases_descriptions = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "medicalcases_description` (`medicalcases_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `meta_title` VARCHAR(1024) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`medicalcases_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
        $this->db->query($create_medicalcases_descriptions);

        $create_medicalcases_to_store = "CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "medicalcases_to_store` (`medicalcases_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`medicalcases_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci";
        $this->db->query($create_medicalcases_to_store);
    }
}

?>