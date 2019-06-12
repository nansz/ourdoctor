<?php

class ControllerInformationSterminyorthopedics extends Controller {

	public function index() {
	
    	$this->language->load('information/sterminyorthopedics');
        $this->load->model('tool/image');
		$this->load->model('catalog/sterminyorthopedics');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['sterminyorthopedics_id'])) {
			$sterminyorthopedics_id = $this->request->get['sterminyorthopedics_id'];
		} else {
			$sterminyorthopedics_id = 0;
		}
	
		$sterminyorthopedics_info = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsStory($sterminyorthopedics_id);
	
		if ($sterminyorthopedics_info) {
			
			if($this->session->data['language']=='ua' && $sterminyorthopedics_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/sale/"); 
				exit(); 
			}
			
			if($this->session->data['language']=='ru' && $sterminyorthopedics_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /sale/"); 
				exit(); 
			}
	  	
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/sterminyorthopedics.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sterminyorthopedics'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sterminyorthopedics', 'sterminyorthopedics_id=' . $this->request->get['sterminyorthopedics_id']),
				'text'      => $sterminyorthopedics_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($sterminyorthopedics_info['meta_title']) {
				$this->document->setTitle($sterminyorthopedics_info['meta_title']);
			}
			else {
				$this->document->setTitle($sterminyorthopedics_info['title']);
			}
			$this->document->setDescription($sterminyorthopedics_info['meta_description']);
			$this->document->setKeywords($sterminyorthopedics_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/sterminyorthopedics', 'sterminyorthopedics_id=' . $this->request->get['sterminyorthopedics_id']), 'canonical');
		
     		$this->data['sterminyorthopedics_info'] = $sterminyorthopedics_info;
		
     		$this->data['heading_title'] = $sterminyorthopedics_info['title'];
     		$this->data['date_added'] = $sterminyorthopedics_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($sterminyorthopedics_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($sterminyorthopedics_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $sterminyorthopedics_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('sterminyorthopedics_sterminyorthopedicspage_addthis');
		
			$this->data['min_height'] = $this->config->get('sterminyorthopedics_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($sterminyorthopedics_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }


            if($sterminyorthopedics_info['image']) {
//                            $this->data['thumb'] = $sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_thumb_width'), $this->config->get('sterminyorthopedics_thumb_height'));
                $this->data['thumb'] = $this->model_tool_image->resize($sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_thumb_width'), $this->config->get('sterminyorthopedics_thumb_height'));
            }
            else {
                $this->data['thumb'] = "/image/no_image.jpg";

            }

            if($sterminyorthopedics_info['popup']) {
//                            $this->data['thumb'] = $sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_thumb_width'), $this->config->get('sterminyorthopedics_thumb_height'));
                $this->data['popup'] = $this->model_tool_image->resize($sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_thumb_width'), $this->config->get('sterminyorthopedics_thumb_height'));
            }
            else {
                $this->data['popup'] = "/image/no_image.jpg";

            }
//			$this->data['thumb'] = $this->model_tool_image->resize($sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_thumb_width'), $this->config->get('sterminyorthopedics_thumb_height'));
//			$this->data['popup'] = $this->model_tool_image->resize($sterminyorthopedics_info['image'], $this->config->get('sterminyorthopedics_popup_width'), $this->config->get('sterminyorthopedics_popup_height'));
		
     		$this->data['button_sterminyorthopedics'] = $this->language->get('button_sterminyorthopedics');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['sterminyorthopedics'] = $this->url->link('information/sterminyorthopedics');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_sterminyorthopedics->updateViewed($this->request->get['sterminyorthopedics_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sterminyorthopedics.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/sterminyorthopedics.tpl';
			} else {
				$this->template = 'default/template/information/sterminyorthopedics.tpl';
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
		  		$sterminyorthopedics_data = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsRus($data);

		  		$sterminyorthopedics_data_big = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsRus($data_big);
				$sterminyorthopedics_total = $this->model_catalog_sterminyorthopedics->getTotalSterminyorthopedicsRus();
//                var_dump($sterminyorthopedics_data);
//                var_dump($sterminyorthopedics_total);
//                var_dump($sterminyorthopedics_data_big);
			} elseif ($this->session->data['language']=='ua') {
		  		$sterminyorthopedics_data = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsUkr($data);

				$sterminyorthopedics_data_big = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsUkr($data_big);
				$sterminyorthopedics_total = $this->model_catalog_sterminyorthopedics->getTotalSterminyorthopedicsUkr();
//                var_dump($sterminyorthopedics_data);
//     				var_dump($sterminyorthopedics_total);
//                var_dump($sterminyorthopedics_data_big);

			} elseif ($this->session->data['language']=='en') {
		  		$sterminyorthopedics_data = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsEng($data);
				$sterminyorthopedics_data_big = $this->model_catalog_sterminyorthopedics->getSterminyorthopedicsEng($data_big);
				$sterminyorthopedics_total = $this->model_catalog_sterminyorthopedics->getTotalSterminyorthopedicsEng();
			}
//			else {
//		  		$sterminyorthopedics_data = $this->model_catalog_sterminyorthopedics->getSterminyorthopedics($data);
//				$sterminyorthopedics_data_big = $this->model_catalog_sterminyorthopedics->getSterminyorthopedics($data_big);
//				$sterminyorthopedics_total = $this->model_catalog_sterminyorthopedics->getTotalSterminyorthopedics();
//			}
//

			
			if($sterminyorthopedics_data_big) {
				foreach ($sterminyorthopedics_data_big as $result1) {
					$this->data['sterminyorthopedics_data_big'][] = array(
						'id'  				=> $result1['sterminyorthopedics_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/sterminyorthopedics', 'sterminyorthopedics_id=' . $result1['sterminyorthopedics_id'])
					);
				}
			}
			
	  		if ($sterminyorthopedics_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/sterminyorthopedics'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('sterminyorthopedics_headline_chars');
				
				
				
				foreach ($sterminyorthopedics_data as $result) {
						if($result['image']) {
                            $image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						
						$this->data['sterminyorthopedics_data'][] = array(
							'id'  				=> $result['sterminyorthopedics_id'],
							'title'        		=> $result['title'],
							'image'        		=> $image,
							'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars).'...',
							'href'         		=> $this->url->link('information/sterminyorthopedics', 'sterminyorthopedics_id=' . $result['sterminyorthopedics_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
				}

				$pagination = new Paginationz();
				$pagination->total = $sterminyorthopedics_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/sterminyorthopedics', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sterminyorthopedics.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/sterminyorthopedics.tpl';
				} else {
					$this->template = 'default/template/information/sterminyorthopedics.tpl';
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
	        		'href'      => $this->url->link('information/sterminyorthopedics'),
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
