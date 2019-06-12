<?php

class ControllerModuleStaff extends Controller {
	private $error = array();
	private $_name = 'staff';
	private $_version = '1.5.5'; 

	public function index() {
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->data[$this->_name . '_version'] = $this->_version;
	
		$this->load->model('catalog/staff');
		
		$this->model_catalog_staff->checkStaff();
	
		$this->document->setTitle($this->language->get('heading_title'));
	
		$this->load->model('setting/setting');
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			$this->model_setting_setting->editSetting($this->_name, $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			if ($this->request->post['buttonForm'] == 'apply') {
				$this->redirect($this->url->link('module/' . $this->_name, 'token=' . $this->session->data['token'], 'SSL'));
			} else {
				$this->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
			}
		}
	
		$this->getModule();
	}

	public function insert() { 
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
		$this->document->setTitle($this->language->get('heading_title'));
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {
			$this->model_catalog_staff->addStaff($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL'));
		}
	
		$this->getForm();
	}

	public function update() { 
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
		$this->document->setTitle($this->language->get('heading_title'));
	
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {
			$this->model_catalog_staff->editStaff($this->request->get['staff_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->redirect($this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL'));
		}
	
		$this->getForm();
	}
	
	public function delete() { 
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
		$this->document->setTitle($this->language->get('heading_title'));
	
		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $staff_id) {
				$this->model_catalog_staff->deleteStaff($staff_id);
			}
		
			$this->session->data['success'] = $this->language->get('text_success');
		
			$this->redirect($this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL'));
		}
	
		$this->getList();
	}

	public function listing() { 
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->document->setTitle($this->language->get('heading_title'));
	
		$this->getList();
	}

	private function getModule() {
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
		$this->data['heading_title'] = $this->language->get('heading_title');
	
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
	
		$this->data['entry_customtitle'] = $this->language->get('entry_customtitle');
		$this->data['entry_header'] = $this->language->get('entry_header'); 
		$this->data['entry_icon'] = $this->language->get('entry_icon');
		$this->data['entry_box'] = $this->language->get('entry_box');
	
		$this->data['entry_template'] = $this->language->get('entry_template');
	
		$this->data['entry_headline_module'] = $this->language->get('entry_headline_module');
		$this->data['entry_staffpage_thumb'] = $this->language->get('entry_staffpage_thumb');
		$this->data['entry_staffpage_popup'] = $this->language->get('entry_staffpage_popup');
		$this->data['entry_staffpage_addthis'] = $this->language->get('entry_staffpage_addthis');
		$this->data['entry_headline_chars'] = $this->language->get('entry_headline_chars');
	
		$this->data['entry_limit'] = $this->language->get('entry_limit');
		$this->data['entry_headline'] = $this->language->get('entry_headline');
		$this->data['entry_numchars'] = $this->language->get('entry_numchars');	
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_position'] = $this->language->get('entry_position');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
	
		$this->data['button_staff'] = $this->language->get('button_staff');
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_apply'] = $this->language->get('button_apply');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_module'] = $this->language->get('button_add_module');
		$this->data['button_remove'] = $this->language->get('button_remove');
	
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
	
 		if (isset($this->error['numchars'])) {
			$this->data['error_numchars'] = $this->error['numchars'];
		} else {
			$this->data['error_numchars'] = '';
		}
	
		if (isset($this->error['staffpage_thumb'])) {
			$this->data['error_staffpage_thumb'] = $this->error['staffpage_thumb'];
		} else {
			$this->data['error_staffpage_thumb'] = '';
		}
	
		if (isset($this->error['staffpage_popup'])) {
			$this->data['error_staffpage_popup'] = $this->error['staffpage_popup'];
		} else {
			$this->data['error_staffpage_popup'] = '';
		}
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
   		);
	
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_module'),
			'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
   		);
	
		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('module/' . $this->_name, 'token=' . $this->session->data['token'], 'SSL'),
   		);
	
		$this->data['staff'] = $this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL');
	
		$this->data['action'] = $this->url->link('module/' . $this->_name, 'token=' . $this->session->data['token'], 'SSL');
	
		$this->data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
	
		$this->data['templates'] = array();
	
		$directories = glob(DIR_CATALOG . 'view/theme/*', GLOB_ONLYDIR);
	
		foreach ($directories as $directory) {
			$this->data['templates'][] = basename($directory);
		}
	
		if (isset($this->request->post['config_template'])) {
			$this->data['config_template'] = $this->request->post['config_template'];
		} else {
			$this->data['config_template'] = $this->config->get('config_template');			
		}
	
		$this->load->model('localisation/language');
	
		$languages = $this->model_localisation_language->getLanguages();
	
		foreach ($languages as $language) {
			if (isset($this->request->post[$this->_name . '_customtitle' . $language['language_id']])) {
				$this->data[$this->_name . '_customtitle' . $language['language_id']] = $this->request->post[$this->_name . '_customtitle' . $language['language_id']];
			} else {
				$this->data[$this->_name . '_customtitle' . $language['language_id']] = $this->config->get($this->_name . '_customtitle' . $language['language_id']);
			}
		}
	
		$this->data['languages'] = $languages;
	
		if (isset($this->request->post[$this->_name . '_header'])) { 
			$this->data[$this->_name . '_header'] = $this->request->post[$this->_name . '_header']; 
		} else { 
			$this->data[$this->_name . '_header'] = $this->config->get($this->_name . '_header'); 
		}
		if (isset($this->request->post[$this->_name . '_icon'])) { 
			$this->data[$this->_name . '_icon'] = $this->request->post[$this->_name . '_icon']; 
		} else { 
			$this->data[$this->_name . '_icon'] = $this->config->get($this->_name . '_icon'); 
		}
		if (isset($this->request->post[$this->_name . '_box'])) { 
			$this->data[$this->_name . '_box'] = $this->request->post[$this->_name . '_box']; 
		} else { 
			$this->data[$this->_name . '_box'] = $this->config->get($this->_name . '_box'); 
		}
	
		if (isset($this->request->post[$this->_name . '_template'])) {
			$this->data[$this->_name . '_template'] = $this->request->post[$this->_name . '_template'];
		} else {
			$this->data[$this->_name . '_template'] = $this->config->get($this->_name . '_template');
		}
	
		if (isset($this->request->post[$this->_name . '_headline_module'])) {
			$this->data[$this->_name . '_headline_module'] = $this->request->post[$this->_name . '_headline_module'];
		} else {
			$this->data[$this->_name . '_headline_module'] = $this->config->get($this->_name . '_headline_module');
		}
	
		if (isset($this->request->post[$this->_name . '_thumb_width'])) {
			$this->data[$this->_name . '_thumb_width'] = $this->request->post[$this->_name . '_thumb_width'];
		} else {
			$this->data[$this->_name . '_thumb_width'] = $this->config->get($this->_name . '_thumb_width');
		}
		if (isset($this->request->post[$this->_name . '_thumb_height'])) {
			$this->data[$this->_name . '_thumb_height'] = $this->request->post[$this->_name . '_thumb_height'];
		} else {
			$this->data[$this->_name . '_thumb_height'] = $this->config->get($this->_name . '_thumb_height');
		}
		if (isset($this->request->post[$this->_name . '_popup_width'])) {
			$this->data[$this->_name . '_popup_width'] = $this->request->post[$this->_name . '_popup_width'];
		} else {
			$this->data[$this->_name . '_popup_width'] = $this->config->get($this->_name . '_popup_width');
		}
		if (isset($this->request->post[$this->_name . '_popup_height'])) {
			$this->data[$this->_name . '_popup_height'] = $this->request->post[$this->_name . '_popup_height'];
		} else {
			$this->data[$this->_name . '_popup_height'] = $this->config->get($this->_name . '_popup_height');
		}
		if (isset($this->request->post[$this->_name . '_staffpage_addthis'])) {
			$this->data[$this->_name . '_staffpage_addthis'] = $this->request->post[$this->_name . '_staffpage_addthis'];
		} else {
			$this->data[$this->_name . '_staffpage_addthis'] = $this->config->get($this->_name . '_staffpage_addthis');
		}
	
		if (isset($this->request->post[$this->_name . '_headline_chars'])) {
			$this->data[$this->_name . '_headline_chars'] = $this->request->post[$this->_name . '_headline_chars'];
		} else {
			$this->data[$this->_name . '_headline_chars'] = $this->config->get($this->_name . '_headline_chars');
		}
	
		$this->data['modules'] = array();
	
		if (isset($this->request->post[$this->_name . '_module'])) {
			$this->data['modules'] = $this->request->post[$this->_name . '_module'];
		} elseif ($this->config->get($this->_name . '_module')) { 
			$this->data['modules'] = $this->config->get($this->_name . '_module');
		}
	
		$this->load->model('design/layout');
	
		$this->data['layouts'] = $this->model_design_layout->getLayouts();
	
		$this->template = 'module/staff.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
	
		$this->response->setOutput($this->render());
	}

	private function getList() {
	
		if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
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
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
		);
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
		);
	
		$this->data['module'] = $this->url->link('module/staff', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['insert'] = $this->url->link('module/staff/insert', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['delete'] = $this->url->link('module/staff/delete', 'token=' . $this->session->data['token'], 'SSL');
	
		$this->data['totalstaff'] = $this->model_catalog_staff->getTotalStaff();
	
		$this->load->model('tool/image');
	
		$this->data['staff'] = array();
	
		$results = $this->model_catalog_staff->getStaff();
	
    	foreach ($results as $result) {
			$action = array();
		
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('module/staff/update', 'token=' . $this->session->data['token'] . '&staff_id=' . $result['staff_id'], 'SSL')
			);
		
			if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			}
		
			$this->data['staff'][] = array(
				'staff_id'     	=> $result['staff_id'],
				'title'       		=> $result['title'],
				'image'      		=> $image,
				'date_added'  	=> date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'viewed'			=> $result['viewed'],
				'status'     		=> ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'selected'    	=> isset($this->request->post['selected']) && in_array($result['staff_id'], $this->request->post['selected']),
				'action'      		=> $action
			);
		}
	
		$this->template = 'module/staff/list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
	
		$this->response->setOutput($this->render());
	}

	private function getForm() {
        $this->load->model('tool/image');

        if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
			$this->language->load('module/' . $this->_name);
		} else {
			$this->load->language('module/' . $this->_name);
		}
	
		$this->load->model('catalog/staff');
	
		$this->data['heading_title'] = $this->language->get('heading_title');
	
    	$this->data['text_enabled'] = $this->language->get('text_enabled');
    	$this->data['text_disabled'] = $this->language->get('text_disabled');
    	$this->data['text_default'] = $this->language->get('text_default');
    	$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
        $this->data['text_experience'] = $this->language->get('text_experience');
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
        $this->data['text_tab_image'] = $this->language->get('text_tab_image');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $this->data['entry_keyword'] = $this->language->get('entry_keyword');
        $this->data['entry_author'] = $this->language->get('entry_author');
        $this->data['entry_image'] = $this->language->get('entry_image');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_title'] = $this->language->get('entry_title');
		$this->data['entry_page_url'] = $this->language->get('entry_page_url');
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
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
	
		if (isset($this->error['title'])) {
			$this->data['error_title'] = $this->error['title'];
		} else {
			$this->data['error_title'] = '';
		}
	
		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = '';
		}
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('text_home'),
		);
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL'),
			'text'      => $this->language->get('heading_title'),
		);
	
		if (!isset($this->request->get['staff_id'])) {
			$this->data['action'] = $this->url->link('module/staff/insert', 'token=' . $this->session->data['token'], 'SSL');
		} else {
			$this->data['action'] = $this->url->link('module/staff/update', 'token=' . $this->session->data['token'] . '&staff_id=' . $this->request->get['staff_id'], 'SSL');
		}
	
		$this->data['cancel'] = $this->url->link('module/staff/listing', 'token=' . $this->session->data['token'], 'SSL');
	
		if ((isset($this->request->get['staff_id'])) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$staff_info = $this->model_catalog_staff->getStaffStory($this->request->get['staff_id']);
		}
		$this->load->model('localisation/language');
	
		$this->data['languages'] = $this->model_localisation_language->getLanguages();
	
		if (isset($this->request->post['staff_description'])) {
			$this->data['staff_description'] = $this->request->post['staff_description'];
		} elseif (isset($this->request->get['staff_id'])) {
			$this->data['staff_description'] = $this->model_catalog_staff->getStaffDescriptions($this->request->get['staff_id']);
		} else {
			$this->data['staff_description'] = array();
		}

		
		if (isset($this->request->post['meta_keyword'])) {
			$this->data['meta_keyword'] = $this->request->post['meta_keyword'];
		} elseif (isset($this->request->get['staff_id'])) {
			$this->data['meta_keyword'] = $this->model_catalog_staff->getStaffDescriptions($this->request->get['staff_id']);
		} else {
			$this->data['meta_keyword'] = array();
		}

		if (isset($this->request->post['date_added'])) {
       		$this->data['date_added'] = $this->request->post['date_added'];
		} elseif (isset($staff_info['date_added'])) {
			$this->data['date_added'] = $staff_info['date_added'];
		} else {
			$this->data['date_added'] = date('Y-m-d', time() - 86400 % 7);
		}
	
		$this->load->model('setting/store');
	
		$this->data['stores'] = $this->model_setting_store->getStores();
	
		if (isset($this->request->post['staff_store'])) {
			$this->data['staff_store'] = $this->request->post['staff_store'];
		} elseif (isset($staff_info)) {
			$this->data['staff_store'] = $this->model_catalog_staff->getStaffStores($this->request->get['staff_id']);
		} else {
			$this->data['staff_store'] = array(0);
		}

        // Images
        if (isset($this->request->post['product_image'])) {
            $product_images = $this->request->post['product_image'];
        } elseif (isset($this->request->get['staff_id'])) {
            $product_images = $this->model_catalog_staff->getProductImages($this->request->get['staff_id']);
        } else {
            $product_images = array();
        }
//        var_dump($product_images)
        $this->data['product_imagesz'] = array();

        foreach ($product_images as $product_image) {
            if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
                $image = $product_image['image'];
            } else {
                $image = 'no_image.jpg';
            }

            $this->data['product_imagesz'][] = array(
                'imagez'      => $image,
                'thumbz'      => $this->model_tool_image->resize($image, 100, 100),
                'sort_order' => $product_image['sort_order']
            );
        }
        $this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

        // Images
        if (isset($this->request->post['product_image'])) {
            $product_images = $this->request->post['product_image'];
        } elseif (isset($this->request->get['staff_id'])) {
            $product_images = $this->model_catalog_staff->getCertificatesImages($this->request->get['staff_id']);
        } else {
            $product_images = array();
        }
//        var_dump($product_images)
        $this->data['product_imagess'] = array();

        foreach ($product_images as $product_image) {
            if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
                $image = $product_image['image'];
            } else {
                $image = 'no_image.jpg';
            }

            $this->data['product_imagess'][] = array(
                'images'      => $image,
                'thumbs'      => $this->model_tool_image->resize($image, 100, 100),
                'sort_order' => $product_image['sort_order']
            );
        }
        $this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		function translitIt($str)
		{
			$tr = array
			(
                "?"=>"a","?"=>"b","?"=>"v","?"=>"g",
                "?"=>"d","?"=>"e","?"=>"j","?"=>"z","?"=>"i",
                "?"=>"y","?"=>"k","?"=>"l","?"=>"m","?"=>"n",
                "?"=>"o","?"=>"p","?"=>"r","?"=>"s","?"=>"t",
                "?"=>"u","?"=>"f","?"=>"h","?"=>"ts","?"=>"ch",
                "?"=>"sh","?"=>"sch","?"=>"","?"=>"yi","?"=>"",
                "?"=>"e","?"=>"yu","?"=>"ya","?"=>"a","?"=>"b",
                "?"=>"v","?"=>"g","?"=>"d","?"=>"e","?"=>"j",
                "?"=>"z","?"=>"i","?"=>"y","?"=>"k","?"=>"l",
                "?"=>"m","?"=>"n","?"=>"o","?"=>"p","?"=>"r",
                "?"=>"s","?"=>"t","?"=>"u","?"=>"f","?"=>"h",
                "?"=>"ts","?"=>"ch","?"=>"sh","?"=>"sch","?"=>"y",
                "?"=>"yi","?"=>"","?"=>"e","?"=>"yu","?"=>"ya"
			);
			
			$seo_name  = preg_replace('/\%/', ' procent ', strtr($str, $tr));
			$seo_name  = preg_replace('/\@/', ' sobaka ', $seo_name);
			$seo_name  = preg_replace('/\&/', ' i ', $seo_name);
			$seo_name  = preg_replace('/\+/', ' plus ', $seo_name);
			$seo_name  = preg_replace('/\s[\s]+/', '-', $seo_name);
			$seo_name  = preg_replace('/[\s\W]+/', '-', $seo_name);
			$seo_name  = preg_replace('/^[\-]+/', '', $seo_name);
			$seo_name  = preg_replace('/[\-]+$/', '', $seo_name);
			
			return $seo_name;
		}
		
		if (isset($this->request->post['keyword']))
		{
			$this->data['keyword'] = utf8_strtolower($this->request->post['keyword']);
		}
		elseif (!empty($staff_info['keyword']))
		{
			$this->data['keyword'] = utf8_strtolower($staff_info['keyword']);
		}
		else
		{
			if (!empty($this->data['staff_description'][1]['title']))
			{
				$this->data['keyword'] = utf8_strtolower(translitIt($this->data['staff_description'][1]['title']));
			}
			else
			{
				$this->data['keyword'] = '';
			}
		}
	
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (isset($staff_info)) {
			$this->data['status'] = $staff_info['status'];
		} else {
			$this->data['status'] = '';
		}

		if (isset($this->request->post['page_url'])) {
			$this->data['page_url'] = $this->request->post['page_url'];
		} elseif (!empty($staff_info)) {
			$this->data['page_url'] = $staff_info['page_url'];
		} else {
			$this->data['page_url'] = "";
		}
	
		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($staff_info)) {
			$this->data['image'] = $staff_info['image'];
		} else {
			$this->data['image'] = '';
		}



        if (isset($this->request->post['staff_image'])) {
            $this->data['staff_image'] = $this->request->post['staff_image'];
        } elseif (!empty($staff_info)) {
            $this->data['staff_image'] = $staff_info['staff_image'];
        } else {
            $this->data['staff_image'] = '';
        }


		if (isset($this->request->post['image1'])) {
			$this->data['image1'] = $this->request->post['image1'];
		} elseif (!empty($staff_info)) {
			$this->data['image1'] = $staff_info['image1'];
		} else {
			$this->data['image1'] = '';
		}
		
		if (isset($this->request->post['image2'])) {
			$this->data['image2'] = $this->request->post['image2'];
		} elseif (!empty($staff_info)) {
			$this->data['image2'] = $staff_info['image2'];
		} else {
			$this->data['image2'] = '';
		}
		
		if (isset($this->request->post['image3'])) {
			$this->data['image3'] = $this->request->post['image3'];
		} elseif (!empty($staff_info)) {
			$this->data['image3'] = $staff_info['image3'];
		} else {
			$this->data['image3'] = '';
		}
		
		if (isset($this->request->post['image4'])) {
			$this->data['image4'] = $this->request->post['image4'];
		} elseif (!empty($staff_info)) {
			$this->data['image4'] = $staff_info['image4'];
		} else {
			$this->data['image4'] = '';
		}
		
		if (isset($this->request->post['image5'])) {
			$this->data['image5'] = $this->request->post['image5'];
		} elseif (!empty($staff_info)) {
			$this->data['image5'] = $staff_info['image5'];
		} else {
			$this->data['image5'] = '';
		}
		
		if (isset($this->request->post['image6'])) {
			$this->data['image6'] = $this->request->post['image6'];
		} elseif (!empty($staff_info)) {
			$this->data['image6'] = $staff_info['image6'];
		} else {
			$this->data['image6'] = '';
		}
		
		if (isset($this->request->post['image7'])) {
			$this->data['image7'] = $this->request->post['image7'];
		} elseif (!empty($staff_info)) {
			$this->data['image7'] = $staff_info['image7'];
		} else {
			$this->data['image7'] = '';
		}
		
		if (isset($this->request->post['image8'])) {
			$this->data['image8'] = $this->request->post['image8'];
		} elseif (!empty($staff_info)) {
			$this->data['image8'] = $staff_info['image8'];
		} else {
			$this->data['image8'] = '';
		}
		
		if (isset($this->request->post['image9'])) {
			$this->data['image9'] = $this->request->post['image9'];
		} elseif (!empty($staff_info)) {
			$this->data['image9'] = $staff_info['image9'];
		} else {
			$this->data['image9'] = '';
		}
		
		if (isset($this->request->post['image10'])) {
			$this->data['image10'] = $this->request->post['image10'];
		} elseif (!empty($staff_info)) {
			$this->data['image10'] = $staff_info['image10'];
		} else {
			$this->data['image10'] = '';
		}

		if (isset($this->request->post['image11'])) {
			$this->data['image11'] = $this->request->post['image11'];
		} elseif (!empty($staff_info)) {
			$this->data['image11'] = $staff_info['image11'];
		} else {
			$this->data['image11'] = '';
		}

		if (isset($this->request->post['image12'])) {
			$this->data['image12'] = $this->request->post['image12'];
		} elseif (!empty($staff_info)) {
			$this->data['image12'] = $staff_info['image12'];
		} else {
			$this->data['image12'] = '';
		}

		if (isset($this->request->post['image13'])) {
			$this->data['image13'] = $this->request->post['image13'];
		} elseif (!empty($staff_info)) {
			$this->data['image13'] = $staff_info['image13'];
		} else {
			$this->data['image13'] = '';
		}

		if (isset($this->request->post['image14'])) {
			$this->data['image14'] = $this->request->post['image14'];
		} elseif (!empty($staff_info)) {
			$this->data['image14'] = $staff_info['image14'];
		} else {
			$this->data['image14'] = '';
		}

		if (isset($this->request->post['image15'])) {
			$this->data['image15'] = $this->request->post['image15'];
		} elseif (!empty($staff_info)) {
			$this->data['image15'] = $staff_info['image15'];
		} else {
			$this->data['image15'] = '';
		}


            $this->data['experience']  		=$staff_info['experience'];
		$this->load->model('tool/image');
	
		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);


			if (isset($this->request->post['staff_image']) && file_exists(DIR_IMAGE . $this->request->post['staff_image'])) {
                $this->data['staff_image_thumb'] = $this->model_tool_image->resize($this->request->post['staff_image'], 100, 100);
            } elseif (!empty($staff_info) && $staff_info['staff_image'] && file_exists(DIR_IMAGE . $staff_info['staff_image'])) {
                $this->data['staff_image_thumb'] = $this->model_tool_image->resize($staff_info['staff_image'], 100, 100);
            } else {
                $this->data['staff_image_thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
            }


		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image'] && file_exists(DIR_IMAGE . $staff_info['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($staff_info['image'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image1']) && file_exists(DIR_IMAGE . $this->request->post['image1'])) {
			$this->data['thumb1'] = $this->model_tool_image->resize($this->request->post['image1'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image1'] && file_exists(DIR_IMAGE . $staff_info['image1'])) {
			$this->data['thumb1'] = $this->model_tool_image->resize($staff_info['image1'], 100, 100);
		} else {
			$this->data['thumb1'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image2']) && file_exists(DIR_IMAGE . $this->request->post['image2'])) {
			$this->data['thumb2'] = $this->model_tool_image->resize($this->request->post['image2'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image2'] && file_exists(DIR_IMAGE . $staff_info['image2'])) {
			$this->data['thumb2'] = $this->model_tool_image->resize($staff_info['image2'], 100, 100);
		} else {
			$this->data['thumb2'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image3']) && file_exists(DIR_IMAGE . $this->request->post['image3'])) {
			$this->data['thumb3'] = $this->model_tool_image->resize($this->request->post['image3'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image3'] && file_exists(DIR_IMAGE . $staff_info['image3'])) {
			$this->data['thumb3'] = $this->model_tool_image->resize($staff_info['image3'], 100, 100);
		} else {
			$this->data['thumb3'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image4']) && file_exists(DIR_IMAGE . $this->request->post['image4'])) {
			$this->data['thumb4'] = $this->model_tool_image->resize($this->request->post['image4'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image4'] && file_exists(DIR_IMAGE . $staff_info['image4'])) {
			$this->data['thumb4'] = $this->model_tool_image->resize($staff_info['image4'], 100, 100);
		} else {
			$this->data['thumb4'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image5']) && file_exists(DIR_IMAGE . $this->request->post['image5'])) {
			$this->data['thumb5'] = $this->model_tool_image->resize($this->request->post['image5'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image5'] && file_exists(DIR_IMAGE . $staff_info['image5'])) {
			$this->data['thumb5'] = $this->model_tool_image->resize($staff_info['image5'], 100, 100);
		} else {
			$this->data['thumb5'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image6']) && file_exists(DIR_IMAGE . $this->request->post['image6'])) {
			$this->data['thumb6'] = $this->model_tool_image->resize($this->request->post['image6'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image6'] && file_exists(DIR_IMAGE . $staff_info['image6'])) {
			$this->data['thumb6'] = $this->model_tool_image->resize($staff_info['image6'], 100, 100);
		} else {
			$this->data['thumb6'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image7']) && file_exists(DIR_IMAGE . $this->request->post['image7'])) {
			$this->data['thumb7'] = $this->model_tool_image->resize($this->request->post['image7'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image7'] && file_exists(DIR_IMAGE . $staff_info['image7'])) {
			$this->data['thumb7'] = $this->model_tool_image->resize($staff_info['image7'], 100, 100);
		} else {
			$this->data['thumb7'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image8']) && file_exists(DIR_IMAGE . $this->request->post['image8'])) {
			$this->data['thumb8'] = $this->model_tool_image->resize($this->request->post['image8'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image8'] && file_exists(DIR_IMAGE . $staff_info['image8'])) {
			$this->data['thumb8'] = $this->model_tool_image->resize($staff_info['image8'], 100, 100);
		} else {
			$this->data['thumb8'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image9']) && file_exists(DIR_IMAGE . $this->request->post['image9'])) {
			$this->data['thumb9'] = $this->model_tool_image->resize($this->request->post['image9'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image9'] && file_exists(DIR_IMAGE . $staff_info['image9'])) {
			$this->data['thumb9'] = $this->model_tool_image->resize($staff_info['image9'], 100, 100);
		} else {
			$this->data['thumb9'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		
		if (isset($this->request->post['image10']) && file_exists(DIR_IMAGE . $this->request->post['image10'])) {
			$this->data['thumb10'] = $this->model_tool_image->resize($this->request->post['image10'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image10'] && file_exists(DIR_IMAGE . $staff_info['image10'])) {
			$this->data['thumb10'] = $this->model_tool_image->resize($staff_info['image10'], 100, 100);
		} else {
			$this->data['thumb10'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		if (isset($this->request->post['image11']) && file_exists(DIR_IMAGE . $this->request->post['image11'])) {
			$this->data['thumb11'] = $this->model_tool_image->resize($this->request->post['image11'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image11'] && file_exists(DIR_IMAGE . $staff_info['image11'])) {
			$this->data['thumb11'] = $this->model_tool_image->resize($staff_info['image11'], 100, 100);
		} else {
			$this->data['thumb11'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		if (isset($this->request->post['image12']) && file_exists(DIR_IMAGE . $this->request->post['image12'])) {
			$this->data['thumb12'] = $this->model_tool_image->resize($this->request->post['image12'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image12'] && file_exists(DIR_IMAGE . $staff_info['image12'])) {
			$this->data['thumb12'] = $this->model_tool_image->resize($staff_info['image12'], 100, 100);
		} else {
			$this->data['thumb12'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		if (isset($this->request->post['image13']) && file_exists(DIR_IMAGE . $this->request->post['image13'])) {
			$this->data['thumb13'] = $this->model_tool_image->resize($this->request->post['image13'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image13'] && file_exists(DIR_IMAGE . $staff_info['image13'])) {
			$this->data['thumb13'] = $this->model_tool_image->resize($staff_info['image13'], 100, 100);
		} else {
			$this->data['thumb13'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		if (isset($this->request->post['image14']) && file_exists(DIR_IMAGE . $this->request->post['image14'])) {
			$this->data['thumb14'] = $this->model_tool_image->resize($this->request->post['image14'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image14'] && file_exists(DIR_IMAGE . $staff_info['image14'])) {
			$this->data['thumb14'] = $this->model_tool_image->resize($staff_info['image14'], 100, 100);
		} else {
			$this->data['thumb14'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}
		if (isset($this->request->post['image15']) && file_exists(DIR_IMAGE . $this->request->post['image15'])) {
			$this->data['thumb15'] = $this->model_tool_image->resize($this->request->post['image15'], 100, 100);
		} elseif (!empty($staff_info) && $staff_info['image15'] && file_exists(DIR_IMAGE . $staff_info['image15'])) {
			$this->data['thumb15'] = $this->model_tool_image->resize($staff_info['image15'], 100, 100);
		} else {
			$this->data['thumb15'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}


	
		$this->template = 'module/staff/form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
	
		$this->response->setOutput($this->render());
	}

	private function validate() {
		if (!$this->user->hasPermission('modify', 'module/staff')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
	
		if (!$this->request->post['staff_headline_chars']) {
			$this->error['numchars'] = $this->language->get('error_numchars');
		}
	
		if (!$this->request->post['staff_thumb_width'] || !$this->request->post['staff_thumb_height']) {
			$this->error['staffpage_thumb'] = $this->language->get('error_staffpage_thumb');
		}
	
		if (!$this->request->post['staff_popup_width'] || !$this->request->post['staff_popup_height']) {
			$this->error['staffpage_popup'] = $this->language->get('error_staffpage_popup');
		}
	
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function validateForm() {
		if (!$this->user->hasPermission('modify', 'module/staff')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
	
		foreach ($this->request->post['staff_description'] as $language_id => $value) {
			if ((strlen($value['title']) < 3) || (strlen($value['title']) > 250)) {
				$this->error['title'][$language_id] = $this->language->get('error_title');
			}
		
			if (strlen($value['description']) < 3) {
				$this->error['description'][$language_id] = $this->language->get('error_description');
			}
		}
	
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	private function validateDelete() {
		if (!$this->user->hasPermission('modify', 'module/staff')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
	
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function install() { 
		//create staff table
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff`");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff` (`staff_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image1` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image2` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image3` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image4` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image5` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image6` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image7` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image8` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image9` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image10` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image11` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image12` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image13` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image14` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image15` VARCHAR(255) COLLATE utf8_general_ci default NULL, `page_url` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`staff_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
		//create staff description table
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff_description`");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff_description` (`staff_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`staff_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
		//create staff store table
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff_to_store`");
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "staff_to_store` (`staff_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`staff_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
    }

	public function uninstall() { 
		$this->cache->delete('staff');
	
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff_description`");
		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "staff_to_store`");
	
		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE `query` LIKE 'staff_id=%'");
    }
}
?>