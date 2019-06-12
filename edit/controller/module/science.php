<?php

class Controllermodulescience extends Controller {
    private $error = array();
    private $_name = 'science';
    private $_version = '1.5.5';

    public function index() {

        if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
            $this->language->load('module/' . $this->_name);
        } else {
            $this->load->language('module/' . $this->_name);
        }

        $this->data[$this->_name . '_version'] = $this->_version;

        $this->load->model('catalog/science');

        $this->model_catalog_science->checkArticles();

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

        $this->load->model('catalog/science');

        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {


            $this->model_catalog_science->addArticles($this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->getForm();
    }

    public function update() {

        if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
            $this->language->load('module/' . $this->_name);
        } else {
            $this->load->language('module/' . $this->_name);
        }

        $this->load->model('catalog/science');

        $this->document->setTitle($this->language->get('heading_title'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validateForm())) {

            $this->model_catalog_science->editArticles($this->request->get['science_id'], $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $this->getForm();
    }

    public function delete() {

        if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
            $this->language->load('module/' . $this->_name);
        } else {
            $this->load->language('module/' . $this->_name);
        }

        $this->load->model('catalog/science');

        $this->document->setTitle($this->language->get('heading_title'));

        if (isset($this->request->post['selected']) && $this->validateDelete()) {
            foreach ($this->request->post['selected'] as $science_id) {
                $this->model_catalog_science->deleteArticles($science_id);
            }

            $this->session->data['success'] = $this->language->get('text_success');

            $this->redirect($this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL'));
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
        $this->load->language('module/science' );
        $this->load->model('catalog/science');

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

        $this->data['entry_customtitle'] = $this->language->get('entry_customtitle');
        $this->data['entry_header'] = $this->language->get('entry_header');
        $this->data['entry_icon'] = $this->language->get('entry_icon');
        $this->data['entry_box'] = $this->language->get('entry_box');

        $this->data['entry_template'] = $this->language->get('entry_template');

        $this->data['entry_headline_module'] = $this->language->get('entry_headline_module');
        $this->data['entry_sciencepage_thumb'] = $this->language->get('entry_sciencepage_thumb');
        $this->data['entry_sciencepage_popup'] = $this->language->get('entry_sciencepage_popup');
        $this->data['entry_sciencepage_addthis'] = $this->language->get('entry_sciencepage_addthis');
        $this->data['entry_headline_chars'] = $this->language->get('entry_headline_chars');


        $this->data['entry_limit'] = $this->language->get('entry_limit');
        $this->data['entry_headline'] = $this->language->get('entry_headline');
        $this->data['entry_numchars'] = $this->language->get('entry_numchars');
        $this->data['entry_layout'] = $this->language->get('entry_layout');
        $this->data['entry_position'] = $this->language->get('entry_position');
        $this->data['entry_status'] = $this->language->get('entry_status');
        $this->data['entry_sort_order'] = $this->language->get('entry_sort_order');

        $this->data['button_science'] = $this->language->get('button_science');
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

        if (isset($this->error['sciencepage_thumb'])) {
            $this->data['error_sciencepage_thumb'] = $this->error['sciencepage_thumb'];
        } else {
            $this->data['error_sciencepage_thumb'] = '';
        }

        if (isset($this->error['sciencepage_popup'])) {
            $this->data['error_sciencepage_popup'] = $this->error['sciencepage_popup'];
        } else {
            $this->data['error_sciencepage_popup'] = '';
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

        $this->data['science'] = $this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL');

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
        if (isset($this->request->post[$this->_name . '_sciencepage_addthis'])) {
            $this->data[$this->_name . '_sciencepage_addthis'] = $this->request->post[$this->_name . '_sciencepage_addthis'];
        } else {
            $this->data[$this->_name . '_sciencepage_addthis'] = $this->config->get($this->_name . '_sciencepage_addthis');
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

        $this->template = 'module/science.tpl';
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

        $this->load->model('catalog/science');

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
            'href'      => $this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL'),
            'text'      => $this->language->get('heading_title'),
        );

        $this->data['module'] = $this->url->link('module/science', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['insert'] = $this->url->link('module/science/insert', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['delete'] = $this->url->link('module/science/delete', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['totalscience'] = $this->model_catalog_science->getTotalArticles();

        $this->load->model('tool/image');

        $this->data['science'] = array();

        $results = $this->model_catalog_science->getArticles();

        foreach ($results as $result) {
            $action = array();

            $action[] = array(
                'text' => $this->language->get('text_edit'),
                'href' => $this->url->link('module/science/update', 'token=' . $this->session->data['token'] . '&science_id=' . $result['science_id'], 'SSL')
            );

            if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
                $image = $this->model_tool_image->resize($result['image'], 40, 40);
            } else {
                $image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
            }

            $this->data['science'][] = array(
                'science_id'     	=> $result['science_id'],
                'title'       		=> $result['title'],
                'image'      		=> $image,
                'date_added'  	=> date($this->language->get('date_format_short'), strtotime($result['date_added'])),
                'viewed'			=> $result['viewed'],
                'status'     		=> ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
                'selected'    	=> isset($this->request->post['selected']) && in_array($result['science_id'], $this->request->post['selected']),
                'action'      		=> $action
            );
        }

        $this->template = 'module/science/list.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    private function getForm() {

        if ((VERSION == '1.5.5') || (substr(VERSION, 0, -2) == '1.5.5')) {
            $this->language->load('module/' . $this->_name);
        } else {
            $this->load->language('module/' . $this->_name);
        }

        $this->load->model('catalog/science');

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
        $this->data['entry_sciencepage_thumb'] = $this->language->get('entry_sciencepage_thumb');
        $this->data['entry_sciencepage_popup'] = $this->language->get('entry_sciencepage_popup');
        $this->data['entry_sciencepage_addthis'] = $this->language->get('entry_sciencepage_addthis');
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

        $this->load->model('tool/image');

        if (isset($this->request->post['product_related'])) {
            $products = $this->request->post['product_related'];
        } elseif (isset($this->request->get['science_id'])) {
            $products = $this->model_catalog_science->getProductRelated($this->request->get['science_id']);

        } else {
            $products = array();
        }

        $this->data['product_related'] = array();
        foreach ($products as $product_id) {
            $related_info = $this->model_catalog_science->getProduct($product_id['science_id']);
            if ($related_info) {
                $this->data['product_related'][] = array(
                    'product_id' => $related_info['science_id'],
                    'name'       => $related_info['title']
                );
            }
        }


        $staff_info=  $this->model_catalog_science->getStaff();
        $this->data['staffs_info'] = array();
        foreach ($staff_info as $staff_inf) {
            $this->data['staffs_info'][] = array(
                'staff_id' => $staff_inf['staff_id'],
                'name'       => $staff_inf['title']
            );
        }
        // Images
        if (isset($this->request->post['product_image'])) {
            $product_images = $this->request->post['product_image'];
        } elseif (isset($this->request->get['science_id'])) {
            $product_images = $this->model_catalog_science->getProductImages($this->request->get['science_id']);
        } else {
            $product_images = array();
        }
        $this->data['product_images'] = array();

        foreach ($product_images as $product_image) {
            if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
                $image = $product_image['image'];
            } else {
                $image = 'no_image.jpg';
            }

            $this->data['product_images'][] = array(
                'image'      => $image,
                'thumb'      => $this->model_tool_image->resize($image, 100, 100),
                'sort_order' => $product_image['sort_order']
            );
        }
        $this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

//		if (isset($this->error['title'])) {
//			$this->data['error_title'] = $this->error['title'];
//		} else {
//			$this->data['error_title'] = '';
//		}

//		if (isset($this->error['description'])) {
//			$this->data['error_description'] = $this->error['description'];
//		} else {
//			$this->data['error_description'] = '';
//		}

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'text'      => $this->language->get('text_home'),
        );

        $this->data['breadcrumbs'][] = array(
            'href'      => $this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL'),
            'text'      => $this->language->get('heading_title'),
        );

        if (!isset($this->request->get['science_id'])) {
            $this->data['action'] = $this->url->link('module/science/insert', 'token=' . $this->session->data['token'], 'SSL');
        } else {
            $this->data['action'] = $this->url->link('module/science/update', 'token=' . $this->session->data['token'] . '&science_id=' . $this->request->get['science_id'], 'SSL');
        }

        $this->data['cancel'] = $this->url->link('module/science/listing', 'token=' . $this->session->data['token'], 'SSL');

        if ((isset($this->request->get['science_id'])) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
            $science_info = $this->model_catalog_science->getArticlesStory($this->request->get['science_id']);
        }
        $this->load->model('localisation/language');

        $this->data['languages'] = $this->model_localisation_language->getLanguages();

        if (isset($this->request->post['science_description'])) {
            $this->data['science_description'] = $this->request->post['science_description'];
        } elseif (isset($this->request->get['science_id'])) {
            $this->data['science_description'] = $this->model_catalog_science->getArticlesDescriptions($this->request->get['science_id']);
        } else {
            $this->data['science_description'] = array();
        }
        if (isset($this->request->post['science_description2'])) {
            $this->data['science_description2'] = $this->request->post['science_description2'];
        } elseif (isset($this->request->get['science_id'])) {
            $this->data['science_description2'] = $this->model_catalog_science->getArticlesDescriptions($this->request->get['science_id']);
        } else {
            $this->data['science_description2'] = array();
        }
        if (isset($this->request->post['science_description3'])) {
            $this->data['science_description3'] = $this->request->post['science_description3'];
        } elseif (isset($this->request->get['science_id'])) {
            $this->data['science_description3'] = $this->model_catalog_science->getArticlesDescriptions($this->request->get['science_id']);
        } else {
            $this->data['science_description3'] = array();
        }
        if (isset($this->request->post['meta_keyword'])) {
            $this->data['meta_keyword'] = $this->request->post['meta_keyword'];
        } elseif (isset($this->request->get['science_id'])) {
            $this->data['meta_keyword'] = $this->model_catalog_science->getArticlesDescriptions($this->request->get['science_id']);
        } else {
            $this->data['meta_keyword'] = array();
        }

        if (isset($this->request->post['date_added'])) {
            $this->data['date_added'] = $this->request->post['date_added'];
        } elseif (isset($science_info['date_added'])) {
            $this->data['date_added'] = $science_info['date_added'];
        } else {
            $this->data['date_added'] = date('Y-m-d', time() - 86400 % 7);
        }

        $this->load->model('setting/store');

        $this->data['stores'] = $this->model_setting_store->getStores();

        if (isset($this->request->post['science_store'])) {
            $this->data['science_store'] = $this->request->post['science_store'];
        } elseif (isset($science_info)) {
            $this->data['science_store'] = $this->model_catalog_science->getArticlesStores($this->request->get['science_id']);
        } else {
            $this->data['science_store'] = array(0);
        }

        function translitIt($str)
        {
            $tr = array
            (
                "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
                "Д"=>"d","Е"=>"e","Ж"=>"j","З"=>"z","И"=>"i",
                "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
                "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
                "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"ts","Ч"=>"ch",
                "Ш"=>"sh","Щ"=>"sch","Ъ"=>"","Ы"=>"yi","Ь"=>"",
                "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
                "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ж"=>"j",
                "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
                "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
                "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
                "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"y",
                "ы"=>"yi","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya"
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
        elseif (!empty($science_info['keyword']))
        {
            $this->data['keyword'] = utf8_strtolower($science_info['keyword']);
        }
        else
        {
            if (!empty($this->data['science_description'][1]['title']))
            {
                $this->data['keyword'] = utf8_strtolower(translitIt($this->data['science_description'][1]['title']));
            }
            else
            {
                $this->data['keyword'] = '';
            }
        }

        if (isset($this->request->post['author'])) {
            $this->data['author'] = $this->request->post['author'];
        } elseif (isset($science_info)) {
            $this->data['author'] = $science_info['author'];
        } else {
            $this->data['author'] = '';
        }
        if (isset($this->request->post['author_id'])) {
            $this->data['author_id'] = $this->request->post['author_id'];
        } elseif (isset($science_info)) {
            $this->data['author_id'] = $science_info['author_id'];
        } else {
            $this->data['author_id'] = '';
        }
        if (isset($this->request->post['hrefwebsite'])) {
            $this->data['hrefwebsite'] = $this->request->post['hrefwebsite'];
        } elseif (isset($science_info)) {
            $this->data['hrefwebsite'] = $science_info['hrefwebsite'];
        } else {
            $this->data['hrefwebsite'] = '';
        }

        if (isset($this->request->post['status'])) {
            $this->data['status'] = $this->request->post['status'];
        } elseif (isset($science_info)) {
            $this->data['status'] = $science_info['status'];
        } else {
            $this->data['status'] = '';
        }

        if (isset($this->request->post['rus'])) {
            $this->data['rus'] = $this->request->post['rus'];
        } elseif (!empty($science_info)) {
            $this->data['rus'] = $science_info['rus'];
        } else {
            $this->data['rus'] = 0;
        }

        if (isset($this->request->post['ukr'])) {
            $this->data['ukr'] = $this->request->post['ukr'];
        } elseif (!empty($science_info)) {
            $this->data['ukr'] = $science_info['ukr'];
        } else {
            $this->data['ukr'] = 0;
        }

        if (isset($this->request->post['eng'])) {
            $this->data['eng'] = $this->request->post['eng'];
        } elseif (!empty($science_info)) {
            $this->data['eng'] = $science_info['eng'];
        } else {
            $this->data['eng'] = 0;
        }

        if (isset($this->request->post['image'])) {
            $this->data['image'] = $this->request->post['image'];
        } elseif (!empty($science_info)) {
            $this->data['image'] = $science_info['image'];
        } else {
            $this->data['image'] = '';
        }

        $this->load->model('tool/image');

        $this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

        if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
            $this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
        } elseif (!empty($science_info) && $science_info['image'] && file_exists(DIR_IMAGE . $science_info['image'])) {
            $this->data['thumb'] = $this->model_tool_image->resize($science_info['image'], 100, 100);
        } else {
            $this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
        }

        $this->template = 'module/science/form.tpl';
        $this->children = array(
            'common/header',
            'common/footer'
        );

        $this->response->setOutput($this->render());
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'module/science')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['science_headline_chars']) {
            $this->error['numchars'] = $this->language->get('error_numchars');
        }

        if (!$this->request->post['science_thumb_width'] || !$this->request->post['science_thumb_height']) {
            $this->error['sciencepage_thumb'] = $this->language->get('error_sciencepage_thumb');
        }

        if (!$this->request->post['science_popup_width'] || !$this->request->post['science_popup_height']) {
            $this->error['sciencepage_popup'] = $this->language->get('error_sciencepage_popup');
        }

        if (!$this->error) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function validateForm() {
        if (!$this->user->hasPermission('modify', 'module/science')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

//		foreach ($this->request->post['science_description'] as $language_id => $value) {
//			if ((strlen($value['title']) < 3) || (strlen($value['title']) > 250)) {
//				$this->error['title'][$language_id] = $this->language->get('error_title');
//			}
//
//			if (strlen($value['description']) < 3) {
//				$this->error['description'][$language_id] = $this->language->get('error_description');
//			}
//		}

        if (!$this->error) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    private function validateDelete() {
        if (!$this->user->hasPermission('modify', 'module/science')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function autocomplete() {
        $json = array();
        $this->load->model('catalog/science');
        if (isset($this->request->get['filter_name']) || isset($this->request->get['filter_model']) || isset($this->request->get['filter_category_id'])) {
            $this->load->model('catalog/product');
            $this->load->model('catalog/option');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            if (isset($this->request->get['filter_model'])) {
                $filter_model = $this->request->get['filter_model'];
            } else {
                $filter_model = '';
            }

            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
                $limit = 20;
            }

            $data = array(
                'filter_name'  => $filter_name,
                'filter_model' => $filter_model,
                'start'        => 0,
                'limit'        => $limit
            );

            if (isset($this->request->get['filter_category_id'])) {
                $data['filter_category_id'] = $this->request->get['filter_category_id'];
            }

            $results = $this->model_catalog_science->getProducts($data);

            foreach ($results as $result) {




                $json[] = array(
                    'product_id' => $result['science_id'],
                    'name'       => strip_tags(html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8')),


                );
            }
        }

        $this->response->setOutput(json_encode($json));
    }


    public function install() {
        //create science table
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science`");
        $this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "science` (`science_id` int(11) NOT NULL auto_increment, `status` int(1) NOT NULL default '0', `image` VARCHAR(255) COLLATE utf8_general_ci default NULL, `image_size` int(1) NOT NULL default '0', `date_added` date default NULL, `viewed` int(5) NOT NULL DEFAULT '0', PRIMARY KEY (`science_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
        //create science description table
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science_description`");
        $this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "science_description` (`science_id` int(11) NOT NULL default '0', `language_id` int(11) NOT NULL default '0', `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_description` VARCHAR(255) COLLATE utf8_general_ci NOT NULL, `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, `meta_keyword` varchar(255) COLLATE utf8_general_ci NOT NULL, PRIMARY KEY (`science_id`,`language_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
        //create science store table
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science_to_store`");
        $this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "science_to_store` (`science_id` int(11) NOT NULL, `store_id` int(11) NOT NULL, PRIMARY KEY (`science_id`, `store_id`)) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci");
    }

    public function uninstall() {
        $this->cache->delete('science');

        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science`");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science_description`");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "science_to_store`");

        $this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE `query` LIKE 'science_id=%'");
    }
}
?>