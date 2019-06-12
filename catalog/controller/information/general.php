<?php

class ControllerInformationGeneral extends Controller {

	public function index() {
	
    	$this->language->load('information/general');
        $this->load->model('tool/image');

        $this->load->model('catalog/general');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);

        if (isset($this->request->get['general_id'])) {
			$general_id = $this->request->get['general_id'];
		} else {
			$general_id = 0;
		}
	
		$general_info = $this->model_catalog_general->getGeneralStory($general_id);
	
		if ($general_info) {
            $this->data['text_red'] = $this->language->get('text_red');

            if($this->session->data['language']=='ua' && $general_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/general/");
				exit(); 
			}

            if($this->session->data['language']=='en' && $general_info['eng']=='0') {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /en/general/");
                exit();
            }
			
			if($this->session->data['language']=='ru' && $general_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /general/");
				exit(); 
			}
			
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/general.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/general'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/general', 'general_id=' . $this->request->get['general_id']),
				'text'      => $general_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($general_info['meta_title']) {
				$this->document->setTitle($general_info['meta_title']);
			}
			else {
				$this->document->setTitle($general_info['title']);
			}

            $results = $this->model_catalog_general->getProductImages($this->request->get['general_id']);
            foreach ($results as $result) {
                $this->data['images'][] = array(
                    'popup' => $this->model_tool_image->resize($result['image'], 500, 500),
                    'thumb' => $this->model_tool_image->resize($result['image'], 500, 500),
                );
            }
            $staf_results = $this->model_catalog_general->getStaffStory($general_info['author_id']);
            $this->data['staf_description']  = $staf_results['position'];
            $this->data['staf_name']  = $staf_results['title'];
            $this->data['staf_image'] =   $this->model_tool_image->resize($staf_results['image'], 138,138);
            $this->data['author_href'] = $staf_results['page_url'];
//            $this->url->link('information/staff', 'staff_id=' . $articles_info['author_id']);
            $results = $this->model_catalog_general->getArticlesRelated($this->request->get['general_id']);

            $i=0;
            foreach ($results as $result) {
                	if($i<2){
                foreach ($result as $resultz) {
                    if ($resultz['image']) {
                        $image = $this->model_tool_image->resize($resultz['image'], 360,265);
                    } else {
                        $image = false;
                    }

                    $staf_results = $this->model_catalog_general->getStaffStory($general_info['general_id']);
                    $staf_description = $staf_results['position'];
                    $staf_title = $staf_results['title'];
                    $this->data['article_related'][] = array(
                        'articles_id' => $resultz['general_id'],
                        'thumb' => $image,
                        'name' => $resultz['title'],
                        'author' => $staf_results['title'],
//                        'author_href' => $this->url->link('information/staff', 'author_id=' . $resultz['author_id']),
                        'description' =>  utf8_substr(strip_tags(html_entity_decode($resultz['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',

                        'staf_description' => $staf_description,
                        'staf_title' => $staf_title,
                        'href' => $this->url->link('information/general', 'general_id=' . $resultz['general_id'])
                    );
                }
                        $i++;
                    }
            }


            $this->document->setDescription($general_info['meta_description']);
			$this->document->setKeywords($general_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/general', 'general_id=' . $this->request->get['general_id']), 'canonical');
		
     		$this->data['general_info'] = $general_info;
		
     		$this->data['heading_title'] = $general_info['title'];
     		$this->data['date_added'] = $general_info['date_added'];

            $this->data['description'] = html_entity_decode($general_info['description']);
            $this->data['description2'] = html_entity_decode($general_info['description2']);
            $this->data['description2'] = html_entity_decode($general_info['description2']);
            $this->data['hrefwebsite'] = html_entity_decode($general_info['hrefwebsite']);
     		$this->data['meta_keyword'] = html_entity_decode($general_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $general_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('general_generalpage_addthis');
		
			$this->data['min_height'] = $this->config->get('general_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($general_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($general_info['image'],755,755);
//			$this->config->get('general_thumb_width'), $this->config->get('general_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($general_info['image'], 755,755);
//			$this->config->get('general_popup_width'), $this->config->get('general_popup_height'));
		
     		$this->data['button_general'] = $this->language->get('button_general');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['general'] = $this->url->link('information/general');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_general->updateViewed($this->request->get['general_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/general.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/general.tpl';
			} else {
				$this->template = 'default/template/information/general.tpl';
			}
		
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
                'information/minileftcolumn',
                'information/lastaddarticles',
                'information/search',
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

            $limit = 10;
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
			$data_big = array(
				'start'              => 0,
				'limit'              => 1000
			);

			if($this->session->data['language']=='ru') {
				$general_data = $this->model_catalog_general->getGeneralRus($data);
				$general_data_big = $this->model_catalog_general->getGeneralRus($data_big);
				$general_total = $this->model_catalog_general->getTotalGeneralRus();
			} elseif ($this->session->data['language']=='ua') {
				$general_data = $this->model_catalog_general->getGeneralUkr($data);
				$general_data_big = $this->model_catalog_general->getGeneralUkr($data_big);
				$general_total = $this->model_catalog_general->getTotalGeneralUkr();
			} elseif ($this->session->data['language']=='en') {
				$general_data = $this->model_catalog_general->getGeneralEng($data);
				$general_data_big = $this->model_catalog_general->getGeneralEng($data_big);
				$general_total = $this->model_catalog_general->getTotalGeneralEng();
			}
			
	  		
			
			
			if($general_data_big) {
				foreach ($general_data_big as $result1) {
					
						$this->data['general_data_big'][] = array(
							'id'  			=> $result1['general_id'],
							'title'        		=> $result1['title'],
							'href'         		=> $this->url->link('information/general', 'general_id=' . $result1['general_id'])
						);
					
				}
			}
			
	  		if ($general_data) {
			
				$this->document->setTitle(translatereturn("Общие медицинские публикации и статьи | МДЦ LUX", "Загальні медичні публікації і статті | МДЦ LUX", "General medical publications and articles | MDC LUX"));
				$this->document->setDescription(translatereturn("Медицинские статьи посвященные  общим медицинским вопросам ✓ Читайте полезное на сайте медицинского оздоровительного центра МДЦ LUX ➾", "Медичні статті присвячені загальним медичних питань ✓ Читайте корисне на сайті медичного оздоровчого центру МДЦ LUX ➾", "MDC LUX is a medical center. Articles devoted to general medical issues ✓ Read useful on the website of the medical wellness center of MDC LUX ➾"));
			
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/general'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('general_headline_chars');

				foreach ($general_data as $result) {

						$this->data['general_data'][] = array(
							'id'  				=> $result['general_id'],
							'title'        		=> $result['title'],
                            'author'       => $result['author'],
                            'date' => $result['date_added'],

                            'image' => $this->model_tool_image->resize($result['image'], 350, 256),
//                            'description' =>  utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                            'description' =>  utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',

                            'href'         		=> $this->url->link('information/general', 'general_id=' . $result['general_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
					
				}
			
				$pagination = new Paginationz();
				$pagination->total = $general_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/general', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/general.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/general.tpl';
				} else {
					$this->template = 'default/template/information/general.tpl';
				}
			
				$this->children = array(
					'common/column_left',
					'common/column_right',
					'common/content_top',
					'common/content_bottom',
                    'information/minileftcolumn',
                    'information/lastaddarticles',
                    'information/search',
					'common/footer',
					'common/header'
				);
			
				$this->response->setOutput($this->render());
			
	    	} else {
			
		  		$this->document->setTitle($this->language->get('text_error'));
			
	     		$this->document->breadcrumbs[] = array(
	        		'href'      => $this->url->link('information/general'),
	        		'text'      => $this->language->get('text_error'),
	        		'separator' => $this->language->get('text_separator')
	     		);
			
				$this->data['heading_title'] = $this->language->get('text_error');
			
				$this->data['text_error'] = $this->language->get('text_error');
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/pagenotfound.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/error/pagenotfound.tpl';
				} else {
					$this->template = 'default/template/error/pagenotfound.tpl';
				}
			
				$this->children = array(
					'common/column_left',
					'common/column_right',
					'common/content_top',
                    'information/minileftcolumn',
                    'information/lastaddarticles',
                    'information/search',
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
