<?php

class ControllerInformationPromotions extends Controller {

	public function index() {
	
    	$this->language->load('information/promotions');
	
		$this->load->model('catalog/promotions');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['promotions_id'])) {
			$promotions_id = $this->request->get['promotions_id'];
		} else {
			$promotions_id = 0;
		}
	
		$promotions_info = $this->model_catalog_promotions->getPromotionsStory($promotions_id);
	
		if ($promotions_info) {
	  	
			$this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/promotions'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/promotions', 'promotions_id=' . $this->request->get['promotions_id']),
				'text'      => $promotions_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			$this->document->setTitle($promotions_info['title']);
			$this->document->setDescription($promotions_info['meta_description']);
			$this->document->setKeywords($promotions_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/promotions', 'promotions_id=' . $this->request->get['promotions_id']), 'canonical');
		
     		$this->data['promotions_info'] = $promotions_info;
		
     		$this->data['heading_title'] = $promotions_info['title'];
     		
			$this->data['description'] = html_entity_decode($promotions_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($promotions_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $promotions_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('promotions_promotionspage_addthis');
		
			$this->data['min_height'] = $this->config->get('promotions_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($promotions_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($promotions_info['image'], $this->config->get('promotions_thumb_width'), $this->config->get('promotions_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($promotions_info['image'], $this->config->get('promotions_popup_width'), $this->config->get('promotions_popup_height'));
		
     		$this->data['button_promotions'] = $this->language->get('button_promotions');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['promotions'] = $this->url->link('information/promotions');
			$this->data['continue'] = $this->url->link('common/home');
			
			$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_promotions->updateViewed($this->request->get['promotions_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/promotions.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/promotions.tpl';
			} else {
				$this->template = 'default/template/information/promotions.tpl';
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
			
			$limit = 6;
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
	  		$promotions_data = $this->model_catalog_promotions->getPromotions($data);
			$promotions_total = $this->model_catalog_promotions->getTotalPromotions();
		
	  		if ($promotions_data) {
			
				$this->document->setTitle(translatereturn("Видео о работе нашего центра | МДЦ LUX", "Відео про роботу нашого центру | МДЦ LUX", "Video about the work of our center | MDC LUX"));
				$this->document->setDescription(translatereturn("Видео о работе медицинского оздоровительного центра МДЦ LUX ➾ Переходите на сайт для просмотра видео ➾", "Відео про роботу медичного оздоровчого центру МДЦ LUX ➾ Переходьте на сайт для перегляду відео ➾", "Video about the work of the medical wellness center of MDC LUX ➾ Go to the site to watch the video ➾"));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/promotions'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('promotions_headline_chars');
				$this->load->model('tool/image');
				foreach ($promotions_data as $result) {
					$this->data['promotions_data'][] = array(
						'id'  				=> $result['promotions_id'],
						'title'        		=> html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
						'image'        		=> $this->model_tool_image->resize($result['image'],360,240),
						'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars),
						'href'         		=> $this->url->link('information/promotions', 'promotions_id=' . $result['promotions_id']),
						'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
					);
				}
			
				$pagination = new Pagination();
				$pagination->total = $promotions_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/promotions', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/promotions.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/promotions.tpl';
				} else {
					$this->template = 'default/template/information/promotions.tpl';
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
	        		'href'      => $this->url->link('information/promotions'),
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
