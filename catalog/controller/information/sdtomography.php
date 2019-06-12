<?php

class ControllerInformationSdtomography extends Controller {

	public function index() {
	
    	$this->language->load('information/sdtomography');
	
		$this->load->model('catalog/sdtomography');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['sdtomography_id'])) {
			$sdtomography_id = $this->request->get['sdtomography_id'];
		} else {
			$sdtomography_id = 0;
		}
	
		$sdtomography_info = $this->model_catalog_sdtomography->getSdtomographyStory($sdtomography_id);
	
		if ($sdtomography_info) {
			
			if($this->session->data['language']=='ua' && $sdtomography_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/sale/"); 
				exit(); 
			}
			
			if($this->session->data['language']=='ru' && $sdtomography_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /sale/"); 
				exit(); 
			}
	  	
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/sdtomography.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sdtomography'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sdtomography', 'sdtomography_id=' . $this->request->get['sdtomography_id']),
				'text'      => $sdtomography_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($sdtomography_info['meta_title']) {
				$this->document->setTitle($sdtomography_info['meta_title']);
			}
			else {
				$this->document->setTitle($sdtomography_info['title']);
			}
			$this->document->setDescription($sdtomography_info['meta_description']);
			$this->document->setKeywords($sdtomography_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/sdtomography', 'sdtomography_id=' . $this->request->get['sdtomography_id']), 'canonical');
		
     		$this->data['sdtomography_info'] = $sdtomography_info;
		
     		$this->data['heading_title'] = $sdtomography_info['title'];
     		$this->data['date_added'] = $sdtomography_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($sdtomography_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($sdtomography_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $sdtomography_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('sdtomography_sdtomographypage_addthis');
		
			$this->data['min_height'] = $this->config->get('sdtomography_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($sdtomography_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($sdtomography_info['image'], $this->config->get('sdtomography_thumb_width'), $this->config->get('sdtomography_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($sdtomography_info['image'], $this->config->get('sdtomography_popup_width'), $this->config->get('sdtomography_popup_height'));
		
			//var_dump($sdtomography_info['image']);
		
     		$this->data['button_sdtomography'] = $this->language->get('button_sdtomography');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['sdtomography'] = $this->url->link('information/sdtomography');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_sdtomography->updateViewed($this->request->get['sdtomography_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sdtomography.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/sdtomography.tpl';
			} else {
				$this->template = 'default/template/information/sdtomography.tpl';
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
	  			$sdtomography_data = $this->model_catalog_sdtomography->getSdtomographyRus($data);
				$sdtomography_data_big = $this->model_catalog_sdtomography->getSdtomographyRus($data_big);
				$sdtomography_total = $this->model_catalog_sdtomography->getTotalSdtomographyRus();
			} elseif ($this->session->data['language']=='ua') {
	  			$sdtomography_data = $this->model_catalog_sdtomography->getSdtomographyUkr($data);
				$sdtomography_data_big = $this->model_catalog_sdtomography->getSdtomographyUkr($data_big);
				$sdtomography_total = $this->model_catalog_sdtomography->getTotalSdtomographyUkr();
			} elseif ($this->session->data['language']=='en') {
	  			$sdtomography_data = $this->model_catalog_sdtomography->getSdtomographyEng($data);
				$sdtomography_data_big = $this->model_catalog_sdtomography->getSdtomographyEng($data_big);
				$sdtomography_total = $this->model_catalog_sdtomography->getTotalSdtomographyEng();
			} else {
	  			$sdtomography_data = $this->model_catalog_sdtomography->getSdtomography($data);
				$sdtomography_data_big = $this->model_catalog_sdtomography->getSdtomography($data_big);
				$sdtomography_total = $this->model_catalog_sdtomography->getTotalSdtomography();
			}


			
			if($sdtomography_data_big) {
				foreach ($sdtomography_data_big as $result1) {
					$this->data['sdtomography_data_big'][] = array(
						'id'  				=> $result1['sdtomography_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/sdtomography', 'sdtomography_id=' . $result1['sdtomography_id'])
					);
				}
			}
			
	  		if ($sdtomography_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/sdtomography'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('sdtomography_headline_chars');
				
				
				
				foreach ($sdtomography_data as $result) {

						if($result['image']) {
							$image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						
						$this->data['sdtomography_data'][] = array(
							'id'  				=> $result['sdtomography_id'],
							'title'        		=> $result['title'],
							'image'        		=> $image,
							'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars).'...',
							'href'         		=> $this->url->link('information/sdtomography', 'sdtomography_id=' . $result['sdtomography_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
				}
			
				$pagination = new Pagination();
				$pagination->total = $sdtomography_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/sdtomography', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sdtomography.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/sdtomography.tpl';
				} else {
					$this->template = 'default/template/information/sdtomography.tpl';
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
	        		'href'      => $this->url->link('information/sdtomography'),
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
