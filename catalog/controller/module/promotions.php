<?php

class ControllerModulePromotions extends Controller {

	private $_promotions = 'promotions';

	protected function index($setting) {
		static $module = 0;
	
		$this->language->load('module/' . $this->_promotions);
	
      	$this->data['heading_title'] = $this->language->get('heading_title');
	
		$this->load->model('localisation/language');
	
		$languages = $this->model_localisation_language->getLanguages();
	
		$this->data['customtitle'] = $this->config->get($this->_promotions . '_customtitle' . $this->config->get('config_language_id'));
		$this->data['header'] = $this->config->get($this->_promotions . '_header');
	
		if (!$this->data['customtitle']) { $this->data['customtitle'] = $this->data['heading_title']; } 
		if (!$this->data['header']) { $this->data['customtitle'] = ''; }
	
		$this->data['icon'] = $this->config->get($this->_promotions . '_icon');
		$this->data['box'] = $this->config->get($this->_promotions . '_box');
	
		$this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
	
		$this->load->model('catalog/promotions');
	
		$this->data['text_more'] = $this->language->get('text_more');
		$this->data['text_posted'] = $this->language->get('text_posted');
	
		$this->data['show_headline'] = $this->config->get($this->_promotions . '_headline_module');
	
		$this->data['promotions_count'] = $this->model_catalog_promotions->getTotalPromotions();
		
		$this->data['promotions_limit'] = $setting['limit'];
	
		if ($this->data['promotions_count'] > $this->data['promotions_limit']) { $this->data['showbutton'] = true; } else { $this->data['showbutton'] = false; }
	
		$this->data['buttonlist'] = $this->language->get('buttonlist');
	
		$this->data['promotionslist'] = $this->url->link('information/promotions');
		
		$this->data['numchars'] = $setting['numchars'];
		
		if (isset($this->data['numchars'])) { $chars = $this->data['numchars']; } else { $chars = 100; }
		
		$this->data['promotions'] = array();
	
		$results = $this->model_catalog_promotions->getPromotionsShorts($setting['limit']);
	
		foreach ($results as $result) {
			$this->data['promotions'][] = array(
				'title'        		=> html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
				'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars),
				'href'         		=> $this->url->link('information/promotions', 'promotions_id=' . $result['promotions_id']),
				'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}
	
		$this->data['module'] = $module++; 
	
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/' . $this->_promotions . '.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/' . $this->_promotions . '.tpl';
		} else {
			$this->template = 'default/template/module/' . $this->_promotions . '.tpl';
		}
	
		$this->render();
	}
}
?>
