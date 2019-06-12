<?php

class ControllerInformationvacancy extends Controller {

	public function index() {
	
    	$this->language->load('information/vacancy');
	
		$this->load->model('catalog/vacancy');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['vacancy_id'])) {
			$vacancy_id = $this->request->get['vacancy_id'];
		} else {
			$vacancy_id = 0;
		}
	
		$vacancy_info = $this->model_catalog_vacancy->getvacancyStory($vacancy_id);
	
		if ($vacancy_info) {
	  	
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/vacancy.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/vacancy'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/vacancy', 'vacancy_id=' . $this->request->get['vacancy_id']),
				'text'      => $vacancy_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			$this->document->setTitle($vacancy_info['title']);
			$this->document->setDescription($vacancy_info['meta_description']);
			$this->document->setKeywords($vacancy_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/vacancy', 'vacancy_id=' . $this->request->get['vacancy_id']), 'canonical');
		
     		$this->data['vacancy_info'] = $vacancy_info;
		
     		$this->data['heading_title'] = $vacancy_info['title'];
     		$this->data['date_added'] = $vacancy_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($vacancy_info['description']);
			$this->data['description2'] = html_entity_decode($vacancy_info['description2']);
			
     		$this->data['meta_keyword'] = html_entity_decode($vacancy_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $vacancy_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('vacancy_vacancypage_addthis');
		
			$this->data['min_height'] = $this->config->get('vacancy_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($vacancy_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = "/image/" . $vacancy_info['image'];
			$this->data['popup'] = $this->model_tool_image->resize($vacancy_info['image'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb1'] = $this->model_tool_image->resize($vacancy_info['image1'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup1'] = $this->model_tool_image->resize($vacancy_info['image1'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb2'] = $this->model_tool_image->resize($vacancy_info['image2'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup2'] = $this->model_tool_image->resize($vacancy_info['image2'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb3'] = $this->model_tool_image->resize($vacancy_info['image3'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup3'] = $this->model_tool_image->resize($vacancy_info['image3'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb4'] = $this->model_tool_image->resize($vacancy_info['image4'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup4'] = $this->model_tool_image->resize($vacancy_info['image4'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb5'] = $this->model_tool_image->resize($vacancy_info['image5'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup5'] = $this->model_tool_image->resize($vacancy_info['image5'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb6'] = $this->model_tool_image->resize($vacancy_info['image6'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup6'] = $this->model_tool_image->resize($vacancy_info['image6'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb7'] = $this->model_tool_image->resize($vacancy_info['image7'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup7'] = $this->model_tool_image->resize($vacancy_info['image7'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb8'] = $this->model_tool_image->resize($vacancy_info['image8'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup8'] = $this->model_tool_image->resize($vacancy_info['image8'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb9'] = $this->model_tool_image->resize($vacancy_info['image9'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup9'] = $this->model_tool_image->resize($vacancy_info['image9'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
			$this->data['thumb10'] = $this->model_tool_image->resize($vacancy_info['image10'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup10'] = $this->model_tool_image->resize($vacancy_info['image10'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));

			$this->data['thumb11'] = $this->model_tool_image->resize($vacancy_info['image11'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup11'] = $this->model_tool_image->resize($vacancy_info['image11'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));

			$this->data['thumb12'] = $this->model_tool_image->resize($vacancy_info['image12'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup12'] = $this->model_tool_image->resize($vacancy_info['image12'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));

			$this->data['thumb13'] = $this->model_tool_image->resize($vacancy_info['image13'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup13'] = $this->model_tool_image->resize($vacancy_info['image13'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));

			$this->data['thumb14'] = $this->model_tool_image->resize($vacancy_info['image14'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup14'] = $this->model_tool_image->resize($vacancy_info['image14'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));

			$this->data['thumb15'] = $this->model_tool_image->resize($vacancy_info['image15'], $this->config->get('vacancy_thumb_width'), $this->config->get('vacancy_thumb_height'));
			$this->data['popup15'] = $this->model_tool_image->resize($vacancy_info['image15'], $this->config->get('vacancy_popup_width'), $this->config->get('vacancy_popup_height'));
			
     			$this->data['button_vacancy'] = $this->language->get('button_vacancy');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['vacancy'] = $this->url->link('information/vacancy');
			$this->data['continue'] = $this->url->link('common/home');
			
			//$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			//if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_vacancy->updateViewed($this->request->get['vacancy_id']);
			//}
			if (strlen($_SERVER['REQUEST_URI']) > 9) {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/vacancy_single.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/vacancy_single.tpl';
				} else {
					$this->template = 'default/template/information/vacancy_single.tpl';
				}

			} else {
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/vacancy.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/vacancy.tpl';
				} else {
					$this->template = 'default/template/information/vacancy.tpl';
				}
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
			
			$limit = 400;
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
			
			
			$data_big = array(
				'start'              => 0,
				'limit'              => 1000
			);
			
	  		$vacancy_data = $this->model_catalog_vacancy->getvacancy($data);
			$vacancy_data_big = $this->model_catalog_vacancy->getvacancy($data_big);
			$vacancy_total = $this->model_catalog_vacancy->getTotalvacancy();
			
			if($vacancy_data_big) {
				foreach ($vacancy_data_big as $result1) {
					$this->data['vacancy_data_big'][] = array(
						'id'  			=> $result1['vacancy_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/vacancy', 'vacancy_id=' . $result1['vacancy_id'])
					);
				}
			}
			
	  		if ($vacancy_data) {
			
				$this->document->setTitle(translatereturn("Вакансии медцентра МДЦ LUX, Харьков, Украина | МДЦ LUX", "Вакансії медцентру МДЦ LUX, Харків, Україна | МДЦ LUX", "Vacancшуы of the MEDC MEDICUM LUX, Kharkov, Ukraine | MDC LUX"));
				$this->document->setDescription(translatereturn("Медицинский оздоровительный центр: врач высшей категории, врач-рентгенолог, ортопед-травматолог. Лечащий врач - медицинский центр ⚕ Наши врачи, фотографии. ", "Медичний оздоровчий центр: лікар вищої категорії, лікар-рентгенолог, ортопед-травматолог. Лікуючий лікар - медичний центр ⚕ Наші лікарі, фотографії.", "Medical wellness center: a doctor of the highest category, a radiologist, an orthopedic trauma specialist. The attending physician is the medical center. ⚕ Our doctors, photos."));
			
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/vacancy'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				$this->data['text_error'] = $this->language->get('text_error');
				
				$chars = $this->config->get('vacancy_headline_chars');
				
				$this->load->model('tool/image');
				
				foreach ($vacancy_data as $result) {
					if($result['image']) {
						$image = $this->model_tool_image->resize($result['image'],220,220);
					}
					else {
						$image = "/image/no_image.jpg";
					}
					
					$images_certificates = array();
					
					if($result['image1']) {
						$image1 = "/image/".$result['image1'];
						array_push($images_certificates, $image1);
					}
					else {
						//$image1 = "";
					}
					
					if($result['image2']) {
						$image2 = "/image/".$result['image2'];
						array_push($images_certificates, $image2);
					}
					else {
						//$image2 = "";
					}
					
					if($result['image3']) {
						$image3 = "/image/".$result['image3'];
						array_push($images_certificates, $image3);
					}
					else {
						//$image3 = "";
					}
					
					if($result['image4']) {
						$image4 = "/image/".$result['image4'];
						array_push($images_certificates, $image4);
					}
					else {
						//$image4 = "";
					}
					
					if($result['image5']) {
						$image5 = "/image/".$result['image5'];
						array_push($images_certificates, $image5);
					}
					else {
						//$image5 = "";
					}
					
					if($result['image6']) {
						$image6 = "/image/".$result['image6'];
						array_push($images_certificates, $image6);
					}
					else {
						//$image6 = "";
					}
					
					if($result['image7']) {
						$image7 = "/image/".$result['image7'];
						array_push($images_certificates, $image7);
					}
					else {
						//$image7 = "";
					}
					
					if($result['image8']) {
						$image8 = "/image/".$result['image8'];
						array_push($images_certificates, $image8);
					}
					else {
						//$image8 = "";
					}
					
					if($result['image9']) {
						$image9 = "/image/".$result['image9'];
						array_push($images_certificates, $image9);
					}
					else {
						//$image9 = "";
					}
					
					if($result['image10']) {
						$image10 = "/image/".$result['image10'];
						array_push($images_certificates, $image10);
					}
					else {
						//$image10 = "";
					}

					if($result['image11']) {
						$image11 = "/image/".$result['image11'];
						array_push($images_certificates, $image11);
					}
					else {
						//$image11 = "";
					}

					if($result['image12']) {
						$image12 = "/image/".$result['image12'];
						array_push($images_certificates, $image12);
					}
					else {
						//$image12 = "";
					}

					if($result['image13']) {
						$image13 = "/image/".$result['image13'];
						array_push($images_certificates, $image13);
					}
					else {
						//$image13 = "";
					}

					if($result['image14']) {
						$image14 = "/image/".$result['image14'];
						array_push($images_certificates, $image14);
					}
					else {
						//$image14 = "";
					}

					if($result['image15']) {
						$image15 = "/image/".$result['image15'];
						array_push($images_certificates, $image15);
					}
					else {
						//$image15 = "";
					}
					
					//array_push($images_certificates, $image1, $image2, $image3, $image4, $image5, $image6, $image7, $image8, $image9, $image10, $image11, $image12, $image13, $image14, $image15);
					//var_dump($images_certificates);
					
					$this->data['vacancy_data'][] = array(
						'id'  			=> $result['vacancy_id'],
						'title'        		=> $result['title'],
						'page_url'        	=> "/vacancy" . $result['page_url'],
						'image'        		=> $image,
						'images'        	=> $images_certificates,
                        'description' =>  html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
						'href'         		=> $this->url->link('information/vacancy', 'vacancy_id=' . $result['vacancy_id']),
						'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
					);
				}
			
				$pagination = new Pagination();
				$pagination->total = $vacancy_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/vacancy', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/vacancy.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/vacancy.tpl';
				} else {
					$this->template = 'default/template/information/vacancy.tpl';
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
	        		'href'      => $this->url->link('information/vacancy'),
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
