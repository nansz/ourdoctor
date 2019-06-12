<?php

class ModelCatalogtests extends Model
{

    public function addTests($data)
    {
        $this->db->query("INSERT INTO " . DB_PREFIX . "tests SET status = '" . (int)$data['status'] . "', date_added = now()");
        $tests_id = $this->db->getLastId();

        foreach ($data['test_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "tests_description SET tests_id = '" . (int)$tests_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) .  "'");
        }

        if (isset($data['product_simptomy'])) {
            foreach ($data['product_simptomy'] as $product_simptomy) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "test_test SET tests_id = '" . (int)$tests_id . "', language_id = '" . (int)1 . "', title = '" . $this->db->escape($product_simptomy['simptomy']    ) . "', value = '" . (int)$product_simptomy['value'] . "'");
            }
        }
        $this->cache->delete('tests');
    }

    public function editTests($tests_id, $data)
    {

        $this->db->query("UPDATE " . DB_PREFIX . "tests SET status = '" . (int)$data['status'] .  "' WHERE tests_id = '" . (int)$tests_id . "'");

        $this->db->query("DELETE FROM " . DB_PREFIX . "tests_description WHERE tests_id = '" . (int)$tests_id . "'");
        foreach ($data['test_description'] as $language_id => $value) {
            $this->db->query("INSERT INTO " . DB_PREFIX . "tests_description SET tests_id = '" . (int)$tests_id . "', language_id = '" . (int)$language_id . "', title = '" . $this->db->escape($value['title']) . "'");
        }

        $this->db->query("DELETE FROM " . DB_PREFIX . "test_test WHERE tests_id = '" . (int)$tests_id . "'");

        if (isset($data['product_simptomy'])) {
            foreach ($data['product_simptomy'] as $product_simptomy) {
                $this->db->query("INSERT INTO " . DB_PREFIX . "test_test SET tests_id = '" . (int)$tests_id . "', language_id = '" . (int)1 . "', title = '" . $this->db->escape($product_simptomy['simptomy']) . "', value = '" . (int)$product_simptomy['value'] . "'");
            }
        }


        $this->cache->delete('tests');
    }


    public function deleteTests($tests_id)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "tests WHERE tests_id = '" . (int)$tests_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "tests_description WHERE tests_id = '" . (int)$tests_id . "'");
        $this->db->query("DELETE FROM " . DB_PREFIX . "test_test WHERE tests_id = '" . (int)$tests_id . "'");

        $this->cache->delete('tests');
    }

    public function getTestsTest($tests_id)
    {

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "test_test WHERE tests_id = '" . (int)$tests_id . "'");
        return $query->rows;
    }

    public function getTestsDescriptions($tests_id)
    {
        $announcement_description_data = array();

        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tests_description WHERE tests_id = '" . (int)$tests_id . "'");

        foreach ($query->rows as $result) {
            $announcement_description_data[$result['language_id']] = array(
                'title' => $result['title'],

            );
        }

        return $announcement_description_data;
    }


    public function getTests()
    {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_description ad ON (a.tests_id = ad.tests_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added");

        return $query->rows;
    }

    public function getTotalTests()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tests");
        return $query->row['total'];
    }


}

?>