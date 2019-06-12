<?php

class modelCatalogLastaddarticles extends model {


//ru
    public function getlastaddarticlesharticlesru() {
        $query = $this->db->query("sELECt * FROm " . DB_PREFIX . "articles a LEFt JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFt JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;

    }

    public function getlastaddarticlesDiseasesandsymptomsru() {
        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "diseasesandsymptoms a LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_description ad ON (a.diseasesandsymptoms_id = ad.diseasesandsymptoms_id) LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_to_store a2s ON (a.diseasesandsymptoms_id = a2s.diseasesandsymptoms_id) WHERE a.status=  '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;
    }

    public function getLastaddarticlesmedicalcasesru() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicalcases a LEFt JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFt JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;

    }

    public function getLastaddarticlesterminologyru() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "terminology a LEFt JOIN " . DB_PREFIX . "terminology_description ad ON (a.terminology_id = ad.terminology_id) LEFt JOIN " . DB_PREFIX . "terminology_to_store a2s ON (a.terminology_id = a2s.terminology_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );


        return $query->rows;
    }

    public function getLastaddarticlesmedicinenewsru() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicinenews a LEFt JOIN " . DB_PREFIX . "medicinenews_description ad ON (a.medicinenews_id = ad.medicinenews_id) LEFt JOIN " . DB_PREFIX . "medicinenews_to_store a2s ON (a.medicinenews_id = a2s.medicinenews_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesannouncementru() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "announcement a LEFt JOIN " . DB_PREFIX . "announcement_description ad ON (a.announcement_id = ad.announcement_id) LEFt JOIN " . DB_PREFIX . "announcement_to_store a2s ON (a.announcement_id = a2s.announcement_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;;
    }

    public function getLastaddarticlesscienceru() {


        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "science a LEFt JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFt JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesgeneralru() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "general a LEFt JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFt JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.rus = '" . (int)1 ."' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

//    ua
    public function getlastaddarticlesharticlesua() {
        $query = $this->db->query("sELECt * FROm " . DB_PREFIX . "articles a LEFt JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFt JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;

    }

    public function getlastaddarticlesDiseasesandsymptomsua() {
        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "diseasesandsymptoms a LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_description ad ON (a.diseasesandsymptoms_id = ad.diseasesandsymptoms_id) LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_to_store a2s ON (a.diseasesandsymptoms_id = a2s.diseasesandsymptoms_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;
    }

    public function getLastaddarticlesmedicalcasesua() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicalcases a LEFt JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFt JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;

    }

    public function getLastaddarticlesterminologyua() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "terminology a LEFt JOIN " . DB_PREFIX . "terminology_description ad ON (a.terminology_id = ad.terminology_id) LEFt JOIN " . DB_PREFIX . "terminology_to_store a2s ON (a.terminology_id = a2s.terminology_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );


        return $query->rows;
    }

    public function getLastaddarticlesmedicinenewsua() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicinenews a LEFt JOIN " . DB_PREFIX . "medicinenews_description ad ON (a.medicinenews_id = ad.medicinenews_id) LEFt JOIN " . DB_PREFIX . "medicinenews_to_store a2s ON (a.medicinenews_id = a2s.medicinenews_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesannouncementua() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "announcement a LEFt JOIN " . DB_PREFIX . "announcement_description ad ON (a.announcement_id = ad.announcement_id) LEFt JOIN " . DB_PREFIX . "announcement_to_store a2s ON (a.announcement_id = a2s.announcement_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;;
    }

    public function getLastaddarticlesscienceua() {


        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "science a LEFt JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFt JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesgeneralua() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "general a LEFt JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFt JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' And a.ukr = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

//en
    public function getlastaddarticlesharticlesen() {
        $query = $this->db->query("sELECt * FROm " . DB_PREFIX . "articles a LEFt JOIN " . DB_PREFIX . "articles_description ad ON (a.articles_id = ad.articles_id) LEFt JOIN " . DB_PREFIX . "articles_to_store a2s ON (a.articles_id = a2s.articles_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;

    }

    public function getlastaddarticlesDiseasesandsymptomsen() {
        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "diseasesandsymptoms a LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_description ad ON (a.diseasesandsymptoms_id = ad.diseasesandsymptoms_id) LEFt JOIN " . DB_PREFIX . "diseasesandsymptoms_to_store a2s ON (a.diseasesandsymptoms_id = a2s.diseasesandsymptoms_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;
    }

    public function getLastaddarticlesmedicalcasesen() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicalcases a LEFt JOIN " . DB_PREFIX . "medicalcases_description ad ON (a.medicalcases_id = ad.medicalcases_id) LEFt JOIN " . DB_PREFIX . "medicalcases_to_store a2s ON (a.medicalcases_id = a2s.medicalcases_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );
        return $query->rows;

    }

    public function getLastaddarticlesterminologyen() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "terminology a LEFt JOIN " . DB_PREFIX . "terminology_description ad ON (a.terminology_id = ad.terminology_id) LEFt JOIN " . DB_PREFIX . "terminology_to_store a2s ON (a.terminology_id = a2s.terminology_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );


        return $query->rows;
    }

    public function getLastaddarticlesmedicinenewsen() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "medicinenews a LEFt JOIN " . DB_PREFIX . "medicinenews_description ad ON (a.medicinenews_id = ad.medicinenews_id) LEFt JOIN " . DB_PREFIX . "medicinenews_to_store a2s ON (a.medicinenews_id = a2s.medicinenews_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesannouncementen() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "announcement a LEFt JOIN " . DB_PREFIX . "announcement_description ad ON (a.announcement_id = ad.announcement_id) LEFt JOIN " . DB_PREFIX . "announcement_to_store a2s ON (a.announcement_id = a2s.announcement_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;;
    }

    public function getLastaddarticlesscienceen() {


        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "science a LEFt JOIN " . DB_PREFIX . "science_description ad ON (a.science_id = ad.science_id) LEFt JOIN " . DB_PREFIX . "science_to_store a2s ON (a.science_id = a2s.science_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

    public function getLastaddarticlesgeneralen() {

        $query = $this->db->query("SELECT * FROm " . DB_PREFIX . "general a LEFt JOIN " . DB_PREFIX . "general_description ad ON (a.general_id = ad.general_id) LEFt JOIN " . DB_PREFIX . "general_to_store a2s ON (a.general_id = a2s.general_id) WHERE a.status= '" . '1'.  "' And ad.language_id = '" . (int)$this->config->get('config_language_id') .  "' AND a.eng = '" . (int)1 . "' ORDER BY a.date_added DEsC LImIt " . (int)6  );

        return $query->rows;
    }

}
?>
