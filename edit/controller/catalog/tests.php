<?php

class ControllerCatalogTests extends Controller {
	private $error = array();
	private $_name = 'tests';

	public function index() {

        $this->language->load('catalog/tests');
		$this->load->model('catalog/tests');
		$this->document->setTitle($this->language->get('heading_title'));
        $this->getList();

	
	}
	public function insert() {

        $this->language->load('catalog/tests');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/tests');

        if (($this->request->server['REQUEST_METHOD'] == 'POST')) {
            $this->model_catalog_tests->addTests($this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('catalog/tests', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->getForm();

	}
	public function update() {

        $this->load->model('catalog/tests');
        $this->load->language('module/tests' );
        $this->document->setTitle($this->language->get('heading_title'));
        if (($this->request->server['REQUEST_METHOD'] == 'POST') ) {
            $this->model_catalog_tests->editTests($this->request->get['tests_id'], $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('catalog/tests', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->getForm();

	}
	public function delete() {

        $this->language->load('catalog/tests');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('catalog/tests');

        if (isset($this->request->post['selected'])) {
            foreach ($this->request->post['selected'] as $tests_id) {
                $this->model_catalog_tests->deleteTests($tests_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('catalog/tests', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->getList();

	}


	private function getList() {

	
		$this->load->model('catalog/tests');
        $this->load->language('catalog/tests' );

        $this->data['heading_title'] = $this->language->get('heading_title');
	
		$this->data['text_no_results'] = $this->language->get('text_no_results');
	
		$this->data['column_image'] = $this->language->get('column_image');		
		$this->data['column_title'] = $this->language->get('column_title');
		$this->data['column_date_added'] = $this->language->get('column_date_added');
		$this->data['column_viewed'] = $this->language->get('column_viewed');
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_action'] = $this->language->get('column_action');		
	
		$this->data['button_module'] = $this->language->get('button_module');
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');
	
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
	
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}
	
		$this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text'      => "Главная",
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
        );

        $this->data['breadcrumbs'][] = array(
            'text'      => "Тесты",
            'href'      => $this->url->link('catalog/tests', 'token=' . $this->session->data['token'] . '&path=', 'SSL'),
        );



		$this->data['insert'] = $this->url->link('catalog/tests/insert', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['delete'] = $this->url->link('catalog/tests/delete', 'token=' . $this->session->data['token'], 'SSL');
	

		$this->load->model('tool/image');
	
		$this->data['tests'] = array();
	
		$results = $this->model_catalog_tests->getTests();

    	foreach ($results as $result) {
			$action = array();
		
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/tests/update', 'token=' . $this->session->data['token'] . '&tests_id=' . $result['tests_id'], 'SSL')
			);
		

			$this->data['tests'][] = array(
				'tests_id'     	=> $result['tests_id'],
				'title'       		=> $result['title'],
				'status'     		=> ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'selected'    	     => isset($this->request->post['selected']) && in_array($result['tests_id'], $this->request->post['selected']),
				'action'      		=> $action
			);
		}
	
		$this->template = 'catalog/test_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
	
		$this->response->setOutput($this->render());
	}

	private function getForm() { 
	


		$this->load->model('catalog/tests');
        $this->load->language('module/tests' );

        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['heading_title'] = $this->language->get('heading_title');
        $this->data['text_tab_image'] = $this->language->get('text_tab_image');
        $this->data['text_enabled'] = $this->language->get('text_enabled');
        $this->data['text_disabled'] = $this->language->get('text_disabled');
        $this->data['text_yes'] = $this->language->get('text_yes');
        $this->data['text_no'] = $this->language->get('text_no');
        $this->data['text_content_top'] = $this->language->get('text_content_top');
        $this->data['text_content_bottom'] = $this->language->get('text_content_bottom');
        $this->data['text_column_left'] = $this->language->get('text_column_left');
        $this->data['text_column_right'] = $this->language->get('text_column_right');
        $this->data['text_module_settings'] = $this->language->get('text_module_settings');
        $this->data['text_chars'] = $this->language->get('text_chars');
        $this->data['text_select_all'] = $this->language->get('text_select_all');
        $this->data['text_unselect_all'] = $this->language->get('text_unselect_all');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $this->data['entry_customtitle'] = $this->language->get('entry_customtitle');
        $this->data['entry_header'] = $this->language->get('entry_header');
        $this->data['entry_icon'] = $this->language->get('entry_icon');
        $this->data['entry_box'] = $this->language->get('entry_box');

        $this->data['entry_template'] = $this->language->get('entry_template');

        $this->data['entry_headline_module'] = $this->language->get('entry_headline_module');
        $this->data['entry_testspage_thumb'] = $this->language->get('entry_testspage_thumb');
        $this->data['entry_testspage_popup'] = $this->language->get('entry_testspage_popup');
        $this->data['entry_testspage_addthis'] = $this->language->get('entry_testspage_addthis');
        $this->data['entry_headline_chars'] = $this->language->get('entry_headline_chars');

        $this->data['text_enabled'] = $this->language->get('text_enabled');
    	$this->data['text_disabled'] = $this->language->get('text_disabled');
    	$this->data['text_default'] = $this->language->get('text_default');
    	$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
        $this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_select_all'] = $this->language->get('text_select_all');
		$this->data['text_unselect_all'] = $this->language->get('text_unselect_all');
		$this->data['column_date_added'] = $this->language->get('column_date_added');
        $this->data['button_add_image'] = $this->language->get('button_add_image');
        $this->data['entry_title'] = $this->language->get('entry_title');
        $this->data['entry_image'] = $this->language->get('entry_image');
        $this->data['entry_related'] = $this->language->get('entry_related');
        $this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
        $this->data['entry_author'] = $this->language->get('entry_author');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_status'] = $this->language->get('entry_status');
	
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
	
		$this->data['tab_language'] = $this->language->get('tab_language');
		$this->data['tab_setting'] = $this->language->get('tab_setting');
	
		$this->data['token'] = $this->session->data['token'];
	
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}




	
		$this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'text'      => "Главная",
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
        );

        $this->data['breadcrumbs'][] = array(
            'text'      => "Тесты",
            'href'      => $this->url->link('catalog/tests', 'token=' . $this->session->data['token'] . '&path=', 'SSL'),
        );
	
		if (!isset($this->request->get['tests_id'])) {
			$this->data['action'] = $this->url->link('catalog/tests/insert', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/tests/update', 'token=' . $this->session->data['token'] . '&tests_id=' . $this->request->get['tests_id'], 'SSL');
		}
	
		$this->data['cancel'] = $this->url->link('catalog/tests', 'token=' . $this->session->data['token'], 'SSL');


		$this->load->model('localisation/language');


		$this->data['languages'] = $this->model_localisation_language->getLanguages();
	
		if (isset($this->request->post['test_description'])) {
			$this->data['test_description'] = $this->request->post['test_description'];
		} elseif (isset($this->request->get['tests_id'])) {
			$this->data['test_description'] = $this->model_catalog_tests->getTestsDescriptions($this->request->get['tests_id']);
		} else {
			$this->data['test_description'] = array();
		}



       if (isset($this->request->get['tests_id'])) {
           $this->data['product_simptomys'] = $this->model_catalog_tests->getTestsTest($this->request->get['tests_id']);
        } else {
            $this->data['product_simptomys'] = array();
        }






	
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (isset($tests_info)) {
			$this->data['status'] = $tests_info['status'];
		} else {
			$this->data['status'] = '';
		}

		$this->template = 'catalog/test_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
	
		$this->response->setOutput($this->render());
	}






}
?>