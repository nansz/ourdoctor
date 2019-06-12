<?php

class ControllerInformationFaq extends Controller {

	public function index() {
	
    	$this->language->load('information/faq');
	
		$this->load->model('catalog/faq');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['faq_id'])) {
			$faq_id = $this->request->get['faq_id'];
		} else {
			$faq_id = 0;
		}
	
		$faq_info = $this->model_catalog_faq->getFaqStory($faq_id);
	
		if ($faq_info) {
	  	
			$this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/faq'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/faq', 'faq_id=' . $this->request->get['faq_id']),
				'text'      => $faq_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			$this->document->setTitle($faq_info['title']);
			$this->document->setDescription($faq_info['meta_description']);
			$this->document->setKeywords($faq_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/faq', 'faq_id=' . $this->request->get['faq_id']), 'canonical');
		
     		$this->data['faq_info'] = $faq_info;
		
     		$this->data['heading_title'] = $faq_info['title'];
     		
			$this->data['description'] = html_entity_decode($faq_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($faq_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $faq_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('faq_faqpage_addthis');
		
			$this->data['min_height'] = $this->config->get('faq_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($faq_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($faq_info['image'], $this->config->get('faq_thumb_width'), $this->config->get('faq_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($faq_info['image'], $this->config->get('faq_popup_width'), $this->config->get('faq_popup_height'));
		
     		$this->data['button_faq'] = $this->language->get('button_faq');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['faq'] = $this->url->link('information/faq');
			$this->data['continue'] = $this->url->link('common/home');
			
			$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_faq->updateViewed($this->request->get['faq_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/faq.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/faq.tpl';
			} else {
				$this->template = 'default/template/information/faq.tpl';
			}
		
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
			);
		
			$this->response->setOutput($this->render());
		
	  	} else {
		
			
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else { 
				$page = 1;
			}	
			
			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];
			} else {
				$limit = $this->config->get('config_catalog_limit');
			}
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
	  		$faq_data = $this->model_catalog_faq->getFaq($data);
			$faq_total = $this->model_catalog_faq->getTotalFaq();
		
	  		if ($faq_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/faq'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('faq_headline_chars');
			
				foreach ($faq_data as $result) {
					$this->data['faq_data'][] = array(
						'id'  				=> $result['faq_id'],
						'title'        		=> html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
						'image'        		=> "/image/".$result['image'],
						'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars),
						'href'         		=> $this->url->link('information/faq', 'faq_id=' . $result['faq_id']),
						'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
					);
				}
			
				$pagination = new Pagination();
				$pagination->total = $faq_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/faq', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/faq.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/faq.tpl';
				} else {
					$this->template = 'default/template/information/faq.tpl';
				}
			
				$this->children = array(
					'common/column_left',
					'common/column_right',
					'common/content_top',
					'common/content_bottom',
					'common/footer',
					'common/header'
				);
			
				$this->response->setOutput($this->render());
			
	    	} else {
			
		  		$this->document->setTitle($this->language->get('text_error'));
			
	     		$this->document->breadcrumbs[] = array(
	        		'href'      => $this->url->link('information/faq'),
	        		'text'      => $this->language->get('text_error'),
	        		'separator' => $this->language->get('text_separator')
	     		);
			
				$this->data['heading_title'] = $this->language->get('text_error');
			
				$this->data['text_error'] = $this->language->get('text_error');
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/error/not_found.tpl';
				} else {
					$this->template = 'default/template/error/not_found.tpl';
				}
			
				$this->children = array(
					'common/column_left',
					'common/column_right',
					'common/content_top',
					'common/content_bottom',
					'common/footer',
					'common/header'
				);
			
				$this->response->setOutput($this->render());
		  	}
		}
	}
}
?>
