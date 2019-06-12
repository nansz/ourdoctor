<?php

class ControllerInformationSterminytomography extends Controller {

	public function index() {
	
    	$this->language->load('information/sterminytomography');
	
		$this->load->model('catalog/sterminytomography');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['sterminytomography_id'])) {
			$sterminytomography_id = $this->request->get['sterminytomography_id'];
		} else {
			$sterminytomography_id = 0;
		}
	
		$sterminytomography_info = $this->model_catalog_sterminytomography->getSterminytomographyStory($sterminytomography_id);
	
		if ($sterminytomography_info) {
			
			if($this->session->data['language']=='ua' && $sterminytomography_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/sale/"); 
				exit(); 
			}
			
			if($this->session->data['language']=='ru' && $sterminytomography_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /sale/"); 
				exit(); 
			}
	  	
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/sterminytomography.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sterminytomography'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sterminytomography', 'sterminytomography_id=' . $this->request->get['sterminytomography_id']),
				'text'      => $sterminytomography_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($sterminytomography_info['meta_title']) {
				$this->document->setTitle($sterminytomography_info['meta_title']);
			}
			else {
				$this->document->setTitle($sterminytomography_info['title']);
			}
			$this->document->setDescription($sterminytomography_info['meta_description']);
			$this->document->setKeywords($sterminytomography_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/sterminytomography', 'sterminytomography_id=' . $this->request->get['sterminytomography_id']), 'canonical');
		
     		$this->data['sterminytomography_info'] = $sterminytomography_info;
		
     		$this->data['heading_title'] = $sterminytomography_info['title'];
     		$this->data['date_added'] = $sterminytomography_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($sterminytomography_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($sterminytomography_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $sterminytomography_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('sterminytomography_sterminytomographypage_addthis');
		
			$this->data['min_height'] = $this->config->get('sterminytomography_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($sterminytomography_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($sterminytomography_info['image'], $this->config->get('sterminytomography_thumb_width'), $this->config->get('sterminytomography_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($sterminytomography_info['image'], $this->config->get('sterminytomography_popup_width'), $this->config->get('sterminytomography_popup_height'));
		
     		$this->data['button_sterminytomography'] = $this->language->get('button_sterminytomography');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['sterminytomography'] = $this->url->link('information/sterminytomography');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_sterminytomography->updateViewed($this->request->get['sterminytomography_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sterminytomography.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/sterminytomography.tpl';
			} else {
				$this->template = 'default/template/information/sterminytomography.tpl';
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
	  			$sterminytomography_data = $this->model_catalog_sterminytomography->getSterminytomographyRus($data);
				$sterminytomography_data_big = $this->model_catalog_sterminytomography->getSterminytomographyRus($data_big);
				$sterminytomography_total = $this->model_catalog_sterminytomography->getTotalSterminytomographyRus();
			} elseif ($this->session->data['language']=='ua') {
	  			$sterminytomography_data = $this->model_catalog_sterminytomography->getSterminytomographyUkr($data);
				$sterminytomography_data_big = $this->model_catalog_sterminytomography->getSterminytomographyUkr($data_big);
				$sterminytomography_total = $this->model_catalog_sterminytomography->getTotalSterminytomographyUkr();
			} elseif ($this->session->data['language']=='en') {
	  			$sterminytomography_data = $this->model_catalog_sterminytomography->getSterminytomographyEng($data);
				$sterminytomography_data_big = $this->model_catalog_sterminytomography->getSterminytomographyEng($data_big);
				$sterminytomography_total = $this->model_catalog_sterminytomography->getTotalSterminytomographyEng();
			}

			
			if($sterminytomography_data_big) {
				foreach ($sterminytomography_data_big as $result1) {
					$this->data['sterminytomography_data_big'][] = array(
						'id'  				=> $result1['sterminytomography_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/sterminytomography', 'sterminytomography_id=' . $result1['sterminytomography_id'])
					);
				}
			}
			
	  		if ($sterminytomography_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/sterminytomography'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('sterminytomography_headline_chars');
				
				
				
				foreach ($sterminytomography_data as $result) {
						if($result['image']) {
							$image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						
						$this->data['sterminytomography_data'][] = array(
							'id'  				=> $result['sterminytomography_id'],
							'title'        		=> $result['title'],
							'image'        		=> $image,
							'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars).'...',
							'href'         		=> $this->url->link('information/sterminytomography', 'sterminytomography_id=' . $result['sterminytomography_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
				}
			
				$pagination = new Paginationz();
				$pagination->total = $sterminytomography_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/sterminytomography', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sterminytomography.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/sterminytomography.tpl';
				} else {
					$this->template = 'default/template/information/sterminytomography.tpl';
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
	        		'href'      => $this->url->link('information/sterminytomography'),
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
