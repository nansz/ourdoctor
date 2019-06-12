<?php

class ControllerInformationSdorthopedics extends Controller {

	public function index() {
	
    	$this->language->load('information/sdorthopedics');
	
		$this->load->model('catalog/sdorthopedics');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['sdorthopedics_id'])) {
			$sdorthopedics_id = $this->request->get['sdorthopedics_id'];
		} else {
			$sdorthopedics_id = 0;
		}
	
		$sdorthopedics_info = $this->model_catalog_sdorthopedics->getSdorthopedicsStory($sdorthopedics_id);
	
		if ($sdorthopedics_info) {
			
			if($this->session->data['language']=='ua' && $sdorthopedics_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/sale/"); 
				exit(); 
			}
			
			if($this->session->data['language']=='ru' && $sdorthopedics_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /sale/"); 
				exit(); 
			}
	  	
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/sdorthopedics.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sdorthopedics'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sdorthopedics', 'sdorthopedics_id=' . $this->request->get['sdorthopedics_id']),
				'text'      => $sdorthopedics_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($sdorthopedics_info['meta_title']) {
				$this->document->setTitle($sdorthopedics_info['meta_title']);
			}
			else {
				$this->document->setTitle($sdorthopedics_info['title']);
			}
			$this->document->setDescription($sdorthopedics_info['meta_description']);
			$this->document->setKeywords($sdorthopedics_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/sdorthopedics', 'sdorthopedics_id=' . $this->request->get['sdorthopedics_id']), 'canonical');
		
     		$this->data['sdorthopedics_info'] = $sdorthopedics_info;
		
     		$this->data['heading_title'] = $sdorthopedics_info['title'];
     		$this->data['date_added'] = $sdorthopedics_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($sdorthopedics_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($sdorthopedics_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $sdorthopedics_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('sdorthopedics_sdorthopedicspage_addthis');
		
			$this->data['min_height'] = $this->config->get('sdorthopedics_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($sdorthopedics_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($sdorthopedics_info['image'], $this->config->get('sdorthopedics_thumb_width'), $this->config->get('sdorthopedics_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($sdorthopedics_info['image'], $this->config->get('sdorthopedics_popup_width'), $this->config->get('sdorthopedics_popup_height'));
		
     		$this->data['button_sdorthopedics'] = $this->language->get('button_sdorthopedics');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['sdorthopedics'] = $this->url->link('information/sdorthopedics');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_sdorthopedics->updateViewed($this->request->get['sdorthopedics_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sdorthopedics.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/sdorthopedics.tpl';
			} else {
				$this->template = 'default/template/information/sdorthopedics.tpl';
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
			
			$limit = 7;
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
			
			
			$data_big = array(
				'start'              => 0,
				'limit'              => 1000
			);
			
			
			if($this->session->data['language']=='ru') {
	  			$sdorthopedics_data = $this->model_catalog_sdorthopedics->getSdorthopedicsRus($data);
				$sdorthopedics_data_big = $this->model_catalog_sdorthopedics->getSdorthopedicsRus($data_big);
				$sdorthopedics_total = $this->model_catalog_sdorthopedics->getTotalSdorthopedicsRus();
			} elseif ($this->session->data['language']=='ua') {
	  			$sdorthopedics_data = $this->model_catalog_sdorthopedics->getSdorthopedicsUkr($data);
				$sdorthopedics_data_big = $this->model_catalog_sdorthopedics->getSdorthopedicsUkr($data_big);
				$sdorthopedics_total = $this->model_catalog_sdorthopedics->getTotalSdorthopedicsUkr();
			} elseif ($this->session->data['language']=='en') {
	  			$sdorthopedics_data = $this->model_catalog_sdorthopedics->getSdorthopedicsEng($data);
				$sdorthopedics_data_big = $this->model_catalog_sdorthopedics->getSdorthopedicsEng($data_big);
				$sdorthopedics_total = $this->model_catalog_sdorthopedics->getTotalSdorthopedicsEng();
			} else {
	  			$sdorthopedics_data = $this->model_catalog_sdorthopedics->getSdorthopedics($data);
				$sdorthopedics_data_big = $this->model_catalog_sdorthopedics->getSdorthopedics($data_big);
				$sdorthopedics_total = $this->model_catalog_sdorthopedics->getTotalSdorthopedics();
			}


			if($sdorthopedics_data_big) {
				foreach ($sdorthopedics_data_big as $result1) {
					$this->data['sdorthopedics_data_big'][] = array(
						'id'  				=> $result1['sdorthopedics_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/sdorthopedics', 'sdorthopedics_id=' . $result1['sdorthopedics_id'])
					);
				}
			}
			
	  		if ($sdorthopedics_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/sdorthopedics'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('sdorthopedics_headline_chars');
				
				
				
				foreach ($sdorthopedics_data as $result) {

						if($result['image']) {
							$image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						
						$this->data['sdorthopedics_data'][] = array(
							'id'  				=> $result['sdorthopedics_id'],
							'title'        		=> $result['title'],
							'image'        		=> $image,
							'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars).'...',
							'href'         		=> $this->url->link('information/sdorthopedics', 'sdorthopedics_id=' . $result['sdorthopedics_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
				}
			
				$pagination = new Pagination();
				$pagination->total = $sdorthopedics_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/sdorthopedics', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sdorthopedics.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/sdorthopedics.tpl';
				} else {
					$this->template = 'default/template/information/sdorthopedics.tpl';
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
	        		'href'      => $this->url->link('information/sdorthopedics'),
	        		'text'      => $this->language->get('text_error'),
	        		'separator' => $this->language->get('text_separator')
	     		);
			
				$this->data['heading_title'] = $this->language->get('text_error');
			
				$this->data['text_error'] = $this->language->get('text_error');
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/not_found_some.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/error/not_found_some.tpl';
				} else {
					$this->template = 'default/template/error/not_found_some.tpl';
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
