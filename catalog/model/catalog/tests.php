<?php

class ModelCatalogtests extends Model {

	public function setMedicalRecord($customer_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "medical_record WHERE customer_id = '" . (int)$customer_id . "'");

		return $query->rows;
	}

	public function getDiseases($value) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "diseases WHERE value = '" . $value . "'");

		return $query->rows;
	}

	public function getTotalCase_history() {
		$query= $this->db->query("SELECT COUNT(`disease_id`) as total FROM " . DB_PREFIX . "case_history");
		return $query->row['total'];
	}

	public function getCountCase_history($disease_id) {


		$query= $this->db->query("SELECT COUNT(`disease_id`) as counts FROM " . DB_PREFIX . "case_history WHERE disease_id='".$disease_id."'");
		return $query->row['counts'];
	}

	public function setCaseHistory($data,$user_id) {


		$query= $this->db->query("SELECT medical_record_id FROM " . DB_PREFIX . "medical_record WHERE customer_id = '" . (int)$user_id . "'");

		if ($query->rows[0]['medical_record_id']){
			$this->db->query("INSERT INTO " . DB_PREFIX . "case_history SET medical_record_id = '" . (int)$query->rows[0]['medical_record_id'] . "', disease_name = '" . $data[0]['title'] . "', disease_id = '" .(int)$data[0]['diseases_id'] . "', tests_id = '" . 11 . "', status = '" . 'Тест пройден' .  "', date =  NOW() ");

		}
		else{
			$this->db->query("INSERT INTO " . DB_PREFIX . "medical_record SET customer_id = '" . (int)$user_id . "', date_of_registration=NOW()");
			$this->db->query("INSERT INTO " . DB_PREFIX . "case_history SET medical_record_id = '" . (int)$query->rows[0]['medical_record_id'] . "', disease_name = '" . $data[0]['title'] . "', disease_id = '" .(int)$data[0]['diseases_id'] . "', tests_id = '" . 11 . "', status = '" . 'Тест пройден' .  "', date = NOW() ");

		}



//		return $query->rows;
	}

	public function getArticlesStory($tests_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_description ad ON (a.tests_id = ad.tests_id) WHERE a.tests_id = '" . (int)$tests_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a.status = '1'");
		return $query->row;
	}

	public function getArticles($data = array()) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_description ad ON (a.tests_id = ad.tests_id) WHERE a.status = '1' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY a.date_added DESC LIMIT " . (int)$data['start'] . "," . (int)$data['limit']);
	
		return $query->rows;
	}


	public function gatTestTest($tests_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "test_test WHERE tests_id='".$tests_id."' ");
		return $query->rows;
	}


    public function getArticle($tests_id) {
        $query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_description ad ON (a.tests_id = ad.tests_id)  WHERE a.tests_id = '" . (int)$tests_id . "' AND ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND a.status = '1'");

        return $query->rows;
    }



	public function getArticlesShorts($limit) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_description ad ON (a.tests_id = ad.tests_id) WHERE ad.language_id = '" . (int)$this->config->get('config_language_id') . "' AND  a.status = '1' ORDER BY a.date_added DESC LIMIT " . (int)$limit);
	
		return $query->rows;
	}

    public function getTotalArticles() {
     	$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tests a LEFT JOIN " . DB_PREFIX . "tests_to_store a2s ON (a.tests_id = a2s.tests_id) WHERE a2s.store_id = '" . (int)$this->config->get('config_store_id') . "' AND a.status = '1'");
	
		if ($query->row) {
			return $query->row['total'];
		} else {
			return FALSE;
		}
	}




}
?>
