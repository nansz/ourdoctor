<?php

class ControllerInformationScience extends Controller {

	public function index() {
	
    	$this->language->load('information/science');
        $this->load->model('tool/image');

        $this->load->model('catalog/science');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['science_id'])) {
			$science_id = $this->request->get['science_id'];
		} else {
			$science_id = 0;
		}
	
		$science_info = $this->model_catalog_science->getScienceStory($science_id);

		if ($science_info) {
            $this->data['text_red'] = $this->language->get('text_red');

            if($this->session->data['language']=='ua' && $science_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: /ua/science/");
				exit();
			}

			if($this->session->data['language']=='ru' && $science_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently");
				header("Location: /science/");
				exit();
			}

            if($this->session->data['language']=='en' && $science_info['eng'] =='0') {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /en/science/");
                exit();
            }

			//$this->document->addStyle('catalog/view/theme/default/stylesheet/science.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/science'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/science', 'science_id=' . $this->request->get['science_id']),
				'text'      => $science_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($science_info['meta_title']) {
				$this->document->setTitle($science_info['meta_title']);
			}
			else {
				$this->document->setTitle($science_info['title']);
			}


            $this->data['images'] = array();

            $this->data['article_related'] = array();
            $this->data['article_related_id'] = array();
            $results = $this->model_catalog_science->getProductImages($this->request->get['science_id']);
            foreach ($results as $result) {
                $this->data['images'][] = array(
                    'popup' => $this->model_tool_image->resize($result['image'], 500, 500),
                    'thumb' => $this->model_tool_image->resize($result['image'], 500, 500),
                );
            }

            $this->load->model('catalog/articles');

            $staf_results = $this->model_catalog_science->getStaffStory($science_info['author_id']);
            $this->data['staf_description']  = $staf_results['position'];
            $this->data['staf_name']  = $staf_results['title'];
            $this->data['staf_image'] =   $this->model_tool_image->resize($staf_results['image'], 138,138);
            $this->data['author_href'] = $this->url->link('information/staff', 'staff_id=' . $science_info['author_id']);
//            $staf_results['page_url'];
//            $this->url->link('information/staff', 'staff_id=' . $articles_info['author_id']);
            $results = $this->model_catalog_science->getscienceRelated($this->request->get['science_id']);
//
            $i=0;

            foreach ($results as $result) {
            	if($i<2){

                foreach ($result as $resultz) {
                    if ($resultz['image']) {
                        $image = $this->model_tool_image->resize($resultz['image'], 360,265);
                    } else {
                        $image = false;
                    }

                    $staf_results = $this->model_catalog_science->getStaffStory($science_info['author_id']);

                    $staf_description = $staf_results['position'];
                    $staf_title = $staf_results['title'];
                    $this->data['article_related'][] = array(
                        'articles_id' => $resultz['science_id'],
                        'thumb' => $image,
                        'name' => $resultz['title'],
                        'author' => $staf_results['title'],
//                        'author_href' => $this->url->link('information/staff', 'author_id=' . $resultz['author_id']),
                        'description' =>  utf8_substr(strip_tags(html_entity_decode($resultz['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',

                        'staf_description' => $staf_description,
                        'staf_title' => $staf_title,
                        'href' => $this->url->link('information/science', 'science_id=' . $resultz['science_id'])
                    );
                }
                $i++;
                }

            }


            $this->document->setDescription($science_info['meta_description']);
			$this->document->setKeywords($science_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/science', 'science_id=' . $this->request->get['science_id']), 'canonical');
		
     		$this->data['science_info'] = $science_info;
		
     		$this->data['heading_title'] = $science_info['title'];
     		$this->data['date_added'] = $science_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($science_info['description']);
            $this->data['description2'] = html_entity_decode($science_info['description2']);
            $this->data['description2'] = html_entity_decode($science_info['description2']);
            $this->data['hrefwebsite'] = html_entity_decode($science_info['hrefwebsite']);

     		$this->data['meta_keyword'] = html_entity_decode($science_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $science_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('science_sciencepage_addthis');
		
			$this->data['min_height'] = $this->config->get('science_thumb_height');
		

			if ($science_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($science_info['image'], 755,755 );
//			$this->config->get('science_thumb_width'), $this->config->get('science_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($science_info['image'],  755,755 );
//			$this->config->get('science_popup_width'), $this->config->get('science_popup_height'));
		
     		$this->data['button_science'] = $this->language->get('button_science');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['science'] = $this->url->link('information/science');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_science->updateViewed($this->request->get['science_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/science.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/science.tpl';
			} else {
				$this->template = 'default/template/information/science.tpl';
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

            if (isset($this->request->get['sort'])) {
                $sort = $this->request->get['sort'];
            } else {
                $sort = 'p.sort_order';
            }

            if (isset($this->request->get['order'])) {
                $order = $this->request->get['order'];
            } else {
                $order = 'ASC';
            }



            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
                //$limit = $this->config->get('config_catalog_limit');
                //$limit = 5;
            }
            $limit = 10;
            $data = array(
                'start' => ($page - 1) * $limit,
                'limit' => $limit
            );
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
			
			
			$data_big = array(
				'start'              => 0,
				'limit'              => 1000
			);

			if($this->session->data['language']=='ru') {

	  			$science_data = $this->model_catalog_science->getScienceRus($data);
				$science_data_big = $this->model_catalog_science->getScienceRus($data_big);
				$science_total = $this->model_catalog_science->getTotalScienceRus();
			} elseif ($this->session->data['language']=='ua') {
	  			$science_data = $this->model_catalog_science->getScienceUkr($data);
				$science_data_big = $this->model_catalog_science->getScienceUkr($data_big);
				$science_total = $this->model_catalog_science->getTotalScienceUkr();
			} elseif ($this->session->data['language']=='en') {
	  			$science_data = $this->model_catalog_science->getScienceEng($data);
				$science_data_big = $this->model_catalog_science->getScienceEng($data_big);
				$science_total = $this->model_catalog_science->getTotalScienceEng();
			}


			
			if($science_data_big) {
				foreach ($science_data_big as $result1) {
					
						$this->data['science_data_big'][] = array(
							'id'  				=> $result1['science_id'],
							'title'        		=> $result1['title'],
							'href'         		=> $this->url->link('information/science', 'science_id=' . $result1['science_id'])
						);
					
				}
			}
			
	  		if ($science_data) {
			
				$this->document->setTitle(translatereturn("Медицинские научные публикации, медицинские исследования | МДЦ LUX", "Медичні наукові публікації, медичні дослідження | МДЦ LUX", ""));
				$this->document->setDescription(translatereturn("Научные публикации посвященные медицинским вопросам ✓ Читайте публикации на сайте медицинского оздоровительного центра МДЦ LUX ➾", "Наукові публікації присвячені медичних питань ✓ Читайте публікації на сайті медичного оздоровчого центру МДЦ LUX ➾", "Scientific publications dedicated to medical issues ✓ Read publications on the website of the medical wellness center of MDC LUX ➾"));
			
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/science'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('science_headline_chars');



                foreach ($science_data as $result) {
					
						if($result['image']) {
							$image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						$this->data['science_data'][] = array(
							'id'  				=> $result['science_id'],
							'title'        		=> $result['title'],
                            'author'       => $result['author'],
                            'date' => $result['date_added'],

                            'image'         => $this->model_tool_image->resize($result['image'], 350, 256),
                            'description' =>  utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
							'href'         		=> $this->url->link('information/science', 'science_id=' . $result['science_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
					
				}




                $pagination = new Paginationz();
                $pagination->total = $science_total;
                $pagination->page = $page;
                $pagination->limit = $limit;
                $pagination->text = $this->language->get('text_pagination');
                $pagination->url = $this->url->link('information/science', '&page={page}');

                $this->data['continue'] = $this->url->link('common/home');
                $this->data['pagination'] = $pagination->render();
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/science.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/science.tpl';
				} else {
					$this->template = 'default/template/information/science.tpl';
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
	        		'href'      => $this->url->link('information/science'),
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
					'common/content_bottom',
                    'information/minileftcolumn',
                    'information/lastaddarticles',
                    'information/search',
                    'common/footer',
					'common/header'
				);
				$this->response->setOutput($this->render());
		  	}
		}
	}
}
?>
