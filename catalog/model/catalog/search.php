<?php

class ModelCatalogsearch extends Model {

    public function getSearchProducts($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.product_id, 
      ( 
         SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id  AND pd2.quantity = '1' 
      	 ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1
       ) AS discount ";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
            } else {
                $sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
            }

//            if (!empty($data['filter_filter'])) {
//                $sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
//            } else {
//                $sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
//            }
        } else {
            $sql .= " FROM " . DB_PREFIX . "product p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= '" . $this->NOW . "' AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
            } else {
                $sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
            }

            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int)$filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }

            if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
                $sql .= " OR ";
            }

            if (!empty($data['filter_tag'])) {
                $sql .= "pd.tag LIKE '%" . $this->db->escape($data['filter_tag']) . "%'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.model) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.sku) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.upc) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.ean) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.jan) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.isbn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.mpn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            $sql .= ")";
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }

        $sql .= " GROUP BY p.product_id";

        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'rating',
            'p.sort_order',
            'p.date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
            } elseif ($data['sort'] == 'p.price') {
                $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
            } else {
                $sql .= " ORDER BY " . $data['sort'];
            }
        } else {
            $sql .= " ORDER BY p.sort_order";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.name) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.name) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['product_id']] = $this->getProduct($result['product_id']);
        }
//		$product_data['sql']=$sql;
        return $product_data;
    }

    public function getProducts($data = array()) {
        if ($this->customer->isLogged()) {
            $customer_group_id = $this->customer->getCustomerGroupId();
        } else {
            $customer_group_id = $this->config->get('config_customer_group_id');
        }

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.product_id, 
          (SELECT AVG(rating) AS total FROM " . DB_PREFIX . "review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating, 
          (SELECT price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$customer_group_id . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < '" . $this->NOW . "') AND (pd2.date_end = '0000-00-00' OR pd2.date_end > '" . $this->NOW . "')) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$customer_group_id . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < '" . $this->NOW . "') AND (ps.date_end = '0000-00-00' OR ps.date_end > '" . $this->NOW . "')) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " FROM " . DB_PREFIX . "category_path cp LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (cp.category_id = p2c.category_id)";
            } else {
                $sql .= " FROM " . DB_PREFIX . "product_to_category p2c";
            }

            if (!empty($data['filter_filter'])) {
                $sql .= " LEFT JOIN " . DB_PREFIX . "product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN " . DB_PREFIX . "product p ON (pf.product_id = p.product_id)";
            } else {
                $sql .= " LEFT JOIN " . DB_PREFIX . "product p ON (p2c.product_id = p.product_id)";
            }
        } else {
            $sql .= " FROM " . DB_PREFIX . "product p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_store p2s ON (p.product_id = p2s.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1' AND p.date_available <= '" . $this->NOW . "' AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_category_id'])) {
            if (!empty($data['filter_sub_category'])) {
                $sql .= " AND cp.path_id = '" . (int)$data['filter_category_id'] . "'";
            } else {
                $sql .= " AND p2c.category_id = '" . (int)$data['filter_category_id'] . "'";
            }

            if (!empty($data['filter_filter'])) {
                $implode = array();

                $filters = explode(',', $data['filter_filter']);

                foreach ($filters as $filter_id) {
                    $implode[] = (int)$filter_id;
                }

                $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
            }
        }

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.name LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }

            if (!empty($data['filter_name']) && !empty($data['filter_tag'])) {
                $sql .= " OR ";
            }

            if (!empty($data['filter_tag'])) {
                $sql .= "pd.tag LIKE '%" . $this->db->escape($data['filter_tag']) . "%'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.model) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.sku) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.upc) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.ean) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.jan) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.isbn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            if (!empty($data['filter_name'])) {
                $sql .= " OR LCASE(p.mpn) = '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "'";
            }

            $sql .= ")";
        }

        if (!empty($data['filter_manufacturer_id'])) {
            $sql .= " AND p.manufacturer_id = '" . (int)$data['filter_manufacturer_id'] . "'";
        }

        $sql .= " GROUP BY p.product_id";

        $sort_data = array(
            'pd.name',
            'p.model',
            'p.quantity',
            'p.price',
            'rating',
            'p.sort_order',
            'p.date_added'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            if ($data['sort'] == 'pd.name' || $data['sort'] == 'p.model') {
                $sql .= " ORDER BY LCASE(" . $data['sort'] . ")";
            } elseif ($data['sort'] == 'p.price') {
                $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special WHEN discount IS NOT NULL THEN discount ELSE p.price END)";
            } else {
                $sql .= " ORDER BY " . $data['sort'];
            }
        } else {
            $sql .= " ORDER BY p.sort_order";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.name) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.name) ASC";
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

        $product_data = array();
//		$product_data['sql']=$sql;
//		$this->log->($sql);
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['product_id']] = $this->getProduct($result['product_id']);
        }
//		$product_data['sql']=$sql;
        return $product_data;
    }


    public function getSearchArticles($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.articles_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "articles p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "articles_description pd ON (p.articles_id = pd.articles_id) LEFT JOIN " . DB_PREFIX . "articles_to_store p2s ON (p.articles_id = p2s.articles_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.articles_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['articles_id']] = $this->getArticle($result['articles_id']);
        }

        return $product_data;
    }

    public function getArticle($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "articles p LEFT JOIN " . DB_PREFIX . "articles_description pd ON (p.articles_id = pd.articles_id) LEFT JOIN " .
            DB_PREFIX . "articles_to_store p2s ON (p.articles_id = p2s.articles_id) WHERE p.articles_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['articles_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }

    public function getSearchDiseasesandsymptoms($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.diseasesandsymptoms_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "diseasesandsymptoms p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "diseasesandsymptoms_description pd ON (p.diseasesandsymptoms_id = pd.diseasesandsymptoms_id) LEFT JOIN " . DB_PREFIX . "diseasesandsymptoms_to_store p2s ON (p.diseasesandsymptoms_id = p2s.diseasesandsymptoms_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.diseasesandsymptoms_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['diseasesandsymptoms_id']] = $this->getDiseasesandsymptoms($result['diseasesandsymptoms_id']);
        }

        return $product_data;
    }

    public function getDiseasesandsymptoms($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "diseasesandsymptoms p LEFT JOIN " . DB_PREFIX . "diseasesandsymptoms_description pd ON (p.diseasesandsymptoms_id = pd.diseasesandsymptoms_id) LEFT JOIN " .
            DB_PREFIX . "diseasesandsymptoms_to_store p2s ON (p.diseasesandsymptoms_id = p2s.diseasesandsymptoms_id) WHERE p.diseasesandsymptoms_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['diseasesandsymptoms_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }

    public function getSearchMedicalcases($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.medicalcases_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "medicalcases p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "medicalcases_description pd ON (p.medicalcases_id = pd.medicalcases_id) LEFT JOIN " .
            DB_PREFIX . "medicalcases_to_store p2s ON (p.medicalcases_id = p2s.medicalcases_id) WHERE pd.language_id = '" .
            (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.medicalcases_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['medicalcases_id']] = $this->getMedicalcases($result['medicalcases_id']);
        }

        return $product_data;
    }

    public function getMedicalcases($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "medicalcases p LEFT JOIN " . DB_PREFIX . "medicalcases_description pd ON (p.medicalcases_id = pd.medicalcases_id) LEFT JOIN " .
            DB_PREFIX . "medicalcases_to_store p2s ON (p.medicalcases_id = p2s.medicalcases_id) WHERE p.medicalcases_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['medicalcases_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }

    public function getSearchTerminology($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.terminology_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "terminology p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "terminology_description pd ON (p.terminology_id = pd.terminology_id) LEFT JOIN " . DB_PREFIX . "terminology_to_store p2s ON (p.terminology_id = p2s.terminology_id) 
        WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.terminology_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['terminology_id']] = $this->getTerminology($result['terminology_id']);
        }

        return $product_data;
    }

    public function getTerminology($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "terminology p LEFT JOIN " . DB_PREFIX . "terminology_description pd ON (p.terminology_id = pd.terminology_id) LEFT JOIN " .
            DB_PREFIX . "terminology_to_store p2s ON (p.terminology_id = p2s.terminology_id) WHERE p.terminology_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['terminology_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }

    public function getSearchMedicinenews($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.medicinenews_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "medicinenews p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "medicinenews_description pd ON (p.medicinenews_id = pd.medicinenews_id) LEFT JOIN " . DB_PREFIX . "medicinenews_to_store p2s ON (p.medicinenews_id = p2s.medicinenews_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.medicinenews_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['medicinenews_id']] = $this->getMedicinenews($result['medicinenews_id']);
        }

        return $product_data;
    }

    public function getMedicinenews($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "medicinenews p LEFT JOIN " . DB_PREFIX . "medicinenews_description pd ON (p.medicinenews_id = pd.medicinenews_id) LEFT JOIN " .
            DB_PREFIX . "medicinenews_to_store p2s ON (p.medicinenews_id = p2s.medicinenews_id) WHERE p.medicinenews_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['medicinenews_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }



    public function getSearchAnnouncement($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.announcement_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "announcement_ p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "announcement_description pd ON (p.announcement_id = pd.announcement_id) LEFT JOIN " .
            DB_PREFIX . "announcement_to_store p2s ON (p.announcement_id = p2s.announcement_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') .
            "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }

        $sql .= " GROUP BY p.announcement_id";

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['announcement_id']] = $this->getAnnouncement($result['announcement_id']);
        }

        return $product_data;
    }

    public function getAnnouncement($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "announcement p LEFT JOIN " . DB_PREFIX . "announcement_description pd ON (p.announcement_id = pd.announcement_id) LEFT JOIN " .
            DB_PREFIX . "announcement_to_store p2s ON (p.announcement_id = p2s.announcement_id) WHERE p.announcement_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['announcement_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }


    public function getSearchScience($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.science_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "science p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "science_description pd ON (p.science_id = pd.science_id) LEFT JOIN " . DB_PREFIX . "science_to_store p2s ON (p.science_id = p2s.science_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.science_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['science_id']] = $this->getAnnouncement($result['science_id']);
        }

        return $product_data;
    }

    public function getScience($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "science p LEFT JOIN " . DB_PREFIX . "science_description pd ON (p.science_id = pd.science_id) LEFT JOIN " .
            DB_PREFIX . "science_to_store p2s ON (p.science_id = p2s.science_id) WHERE p.science_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['science_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }


    public function getSearchGeneral($data = array()) {

        $sql = "SELECT DISTINCT SQL_CALC_FOUND_ROWS p.general_id";

        if (!empty($data['filter_category_id'])) {
        } else {
            $sql .= " FROM " . DB_PREFIX . "general p";
        }

        $sql .= " LEFT JOIN " . DB_PREFIX . "general_description pd ON (p.general_id = pd.general_id) LEFT JOIN " . DB_PREFIX . "general_to_store p2s ON (p.general_id = p2s.general_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = '1'  AND p2s.store_id = '" . (int)$this->config->get('config_store_id') . "'";

        if (!empty($data['filter_name']) || !empty($data['filter_tag'])) {
            $sql .= " AND (";

            if (!empty($data['filter_name'])) {
                $implode = array();

                $words = explode(' ', trim(preg_replace('/\s\s+/', ' ', $data['filter_name'])));

                foreach ($words as $word) {
                    $implode[] = "pd.title LIKE '%" . $this->db->escape($word) . "%'";
                }

                if ($implode) {
                    $sql .= " " . implode(" AND ", $implode) . "";
                }

                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description2 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
                if (!empty($data['filter_description'])) {
                    $sql .= " OR pd.description3 LIKE '%" . $this->db->escape($data['filter_name']) . "%'";
                }
            }
            $sql .= ")";
        }



        $sql .= " GROUP BY p.general_id";

//        $sort_data = array(
//            'pd.title',
//            'p.model',
//             'p.date_added'
//        );



        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC, LCASE(pd.title) DESC";
        } else {
            $sql .= " ASC, LCASE(pd.title) ASC";
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

        $product_data = array();
        $query = $this->db->query($sql);

        $num_query = $this->db->query("SELECT FOUND_ROWS() AS `found_rows`");
        $this->FOUND_ROWS = intval($num_query->row['found_rows']);

        foreach ($query->rows as $result) {
            $product_data[$result['general_id']] = $this->getGeneral($result['general_id']);
        }

        return $product_data;
    }

    public function getGeneral($product_id) {
        $query = $this->db->query("SELECT DISTINCT *, pd.title AS title, p.image FROM " .
            DB_PREFIX . "general p LEFT JOIN " . DB_PREFIX . "general_description pd ON (p.general_id = pd.general_id) LEFT JOIN " .
            DB_PREFIX . "general_to_store p2s ON (p.general_id = p2s.general_id) WHERE p.general_id = '" . (int)$product_id . "' 
            AND p.status = '1' '"  . "'");
        if ($query->num_rows) {
            return array(
                'articles_id'       => $query->row['general_id'],
                'name'             => $query->row['title'],
                'description'      => $query->row['description'],
                'description2'      => $query->row['description2'],
                'description3'      => $query->row['description3'],
                'meta_description' => $query->row['meta_description'],
                'meta_keyword'     => $query->row['meta_keyword'],
                'image'            => $query->row['image'],
                'status'           => $query->row['status'],
                'author'           => $query->row['author'],
                'author_id'           => $query->row['author_id'],
                'date_added'       => $query->row['date_added'],
            );
        } else {
            return false;
        }
    }


}
?>
