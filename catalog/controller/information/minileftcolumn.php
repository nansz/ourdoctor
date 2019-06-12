<?php

class ControllerInformationminileftcolumn extends Controller
{

    protected function index() {

        $this->load->model('design/layout');
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('catalog/information');

        if (isset($this->request->get['route'])) {
            $route = (string)$this->request->get['route'];
        } else {
            $route = 'common/home';
        }

        $layout_id = 0;

        if ($route == 'product/category' && isset($this->request->get['path'])) {
            $path = explode('_', (string)$this->request->get['path']);

            $layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
        }

        if ($route == 'product/product' && isset($this->request->get['product_id'])) {
            $layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
        }

        if ($route == 'information/information' && isset($this->request->get['information_id'])) {
            $layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
        }

        if (!$layout_id) {
            $layout_id = $this->model_design_layout->getLayout($route);
        }

        if (!$layout_id) {
            $layout_id = $this->config->get('config_layout_id');
        }

        $module_data = array();

        $this->load->model('setting/extension');

        $extensions = $this->model_setting_extension->getExtensions('module');
        $this->language->load('common/header');
        $this->data['text_publications'] = $this->language->get('text_publications');
        $this->data['text_publicationsz'] = $this->language->get('text_publicationsz');
        $this->data['text_science'] = $this->language->get('text_science');
        $this->data['text_general'] = $this->language->get('text_general');
        $this->data['text_diseasesandsymptoms'] = $this->language->get('text_diseasesandsymptoms');
        $this->data['text_medicalcases'] = $this->language->get('text_medicalcases');
        $this->data['text_announcement'] = $this->language->get('text_announcement');
        $this->data['text_medicinenews'] = $this->language->get('text_medicinenews');
        $this->data['text_terminology'] = $this->language->get('text_terminology');
        $this->data['text_news'] = $this->language->get('text_news');
        $this->data['text_newz'] = $this->language->get('text_newz');
        $this->data['text_clasufication'] = $this->language->get('text_clasufication');


        foreach ($extensions as $extension) {
            $modules = $this->config->get($extension['code'] . '_module');

            if ($modules) {
                foreach ($modules as $module) {
                    if ($module['layout_id'] == $layout_id && $module['position'] == 'column_left' && $module['status']) {
                        $module_data[] = array(
                            'code'       => $extension['code'],
                            'setting'    => $module,
                            'sort_order' => $module['sort_order']
                        );
                    }
                }
            }
        }

        $sort_order = array();
        $this->data['general']=$this->url->link('information/general');
        $this->data['science']=$this->url->link('information/science');
        $this->data['news']=$this->url->link('information/articles');
        $this->data['medicalcases']=$this->url->link('information/medicalcases');
        $this->data['diseasesandsymptoms']=$this->url->link('information/diseasesandsymptoms');
        $this->data['terminology']=$this->url->link('information/terminology');
        $this->data['medicinenews']=$this->url->link('information/medicinenews');
        $this->data['announcement']=$this->url->link('information/announcement');

        foreach ($module_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }

        array_multisort($sort_order, SORT_ASC, $module_data);

        $this->data['modules'] = array();

        foreach ($module_data as $module) {
            $module = $this->getChild('module/' . $module['code'], $module['setting']);

            if ($module) {
                $this->data['modules'][] = $module;
            }
        }

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/minileftcolumn.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/information/minileftcolumn.tpl';
        } else {
            $this->template = 'default/template/information/minileftcolumn.tpl';
        }

        $this->render();
    }
}

?>