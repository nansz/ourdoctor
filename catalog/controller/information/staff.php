<?php

class ControllerInformationStaff extends Controller {

	public function index() {
	
    	$this->language->load('information/staff');
	
		$this->load->model('catalog/staff');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['staff_id'])) {
			$staff_id = $this->request->get['staff_id'];
		} else {
			$staff_id = 0;
		}
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		$staff_info = $this->model_catalog_staff->getStaffStory($staff_id);
		if ($staff_info) {

			//$this->document->addStyle('catalog/view/theme/default/stylesheet/staff.css');
//			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
//
//			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
//			$this->data['breadcrumbs'][] = array(
//				'href'      => $this->url->link('information/staff'),
//				'text'      => $this->language->get('heading_title'),
//				'separator' => $this->language->get('text_separator')
//			);
		
//			$this->data['breadcrumbs'][] = array(
//				'href'      => $this->url->link('information/staff', 'staff_id=' . $this->request->get['staff_id']),
//				'text'      => $staff_info['title'],
//				'separator' => $this->language->get('text_separator')
//			);
//
			$this->document->setTitle($staff_info['title']);
			$this->document->setDescription($staff_info['meta_description']);
			$this->document->setKeywords($staff_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/staff', 'staff_id=' . $this->request->get['staff_id']), 'canonical');
		
     		$this->data['staff_info'] = $staff_info;
     		$this->data['heading_title'] = $staff_info['title'];
     		$this->data['date_added'] = $staff_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($staff_info['description']);
            $this->data['description2'] = html_entity_decode($staff_info['description2']);
            $this->data['description3'] = html_entity_decode($staff_info['description3']);
            $this->data['experience'] = $staff_info['experience'];
            $this->data['position'] = $staff_info['position'];


     		$this->data['meta_keyword'] = html_entity_decode($staff_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $staff_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('staff_staffpage_addthis');
		
			$this->data['min_height'] = $this->config->get('staff_thumb_height');
		
			$this->load->model('tool/image');

//            'id'  				=> $result['staff_id'],
//						'title'        		=> $result['title'],
//						'page_url'        	=> $result['page_url'],
////						'position'          => $result['position'] ,
//
//                        'image'        		=> $image, $result,
//						'images'        	=> $images_certificates,


			if ($staff_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }


//            if($staff_info['image1']) {
//                $image1 = $this->model_tool_image->resize($staff_info['image1'], 350, 450);
//                array_push($images_certificates, $image1);
//            }
//            else {
//                //$image1 = "";
//            }
//
//            if($staff_info['image2']) {
//                $image2 = $this->model_tool_image->resize($staff_info['image2'], 350, 450);
//                array_push($images_certificates, $image2);
//            }
//            else {
//                //$image2 = "";
//            }
////            $this->model_tool_image->resize($staff_info['image1'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//
//            if($staff_info['image3']) {
//                $image3 = $this->model_tool_image->resize($staff_info['image3'], 350, 450);
//                array_push($images_certificates, $image3);
//            }
//            else {
//                //$image3 = "";
//            }
//
//            if($staff_info['image4']) {
//                $image4 = $this->model_tool_image->resize($staff_info['image4'], 350, 450);
//                array_push($images_certificates, $image4);
//            }
//            else {
//                //$image4 = "";
//            }
//
//            if($staff_info['image5']) {
//                $image5 = $this->model_tool_image->resize($staff_info['image5'], 350, 450);
//                array_push($images_certificates, $image5);
//            }
//            else {
//                //$image5 = "";
//            }
//
//            if($staff_info['image6']) {
//                $image6 = $this->model_tool_image->resize($staff_info['image6'], 350, 450);
//                array_push($images_certificates, $image6);
//            }
//            else {
//                //$image6 = "";
//            }
//
//            if($staff_info['image7']) {
//                $image7 = $this->model_tool_image->resize($staff_info['image7'], 350, 450);
//                array_push($images_certificates, $image7);
//            }
//            else {
//                //$image7 = "";
//            }
//
//            if($staff_info['image8']) {
//                $image8 = $this->model_tool_image->resize($staff_info['image8'], 350, 450);
//                array_push($images_certificates, $image8);
//            }
//            else {
//                //$image8 = "";
//            }
//
//            if($staff_info['image9']) {
//                $image9 =  $this->model_tool_image->resize($staff_info['image9'], 350, 450);
//                array_push($images_certificates, $image9);
//            }
//            else {
//                //$image9 = "";
//            }
//
//            if($staff_info['image10']) {
//                $image10 = $this->model_tool_image->resize($staff_info['image10'], 350, 450);
//                array_push($images_certificates, $image10);
//            }
//            else {
//                //$image10 = "";
//            }
//
//            if($staff_info['image11']) {
//                $image11 = $this->model_tool_image->resize($staff_info['image11'], 350, 450);
//                array_push($images_certificates, $image11);
//            }
//            else {
//                //$image11 = "";
//            }
//
//            if($staff_info['image12']) {
//                $image12 = $this->model_tool_image->resize($staff_info['image12'], 350, 450);
//                array_push($images_certificates, $image12);
//            }
//            else {
//                //$image12 = "";
//            }
//
//            if($staff_info['image13']) {
//                $image13 = $this->model_tool_image->resize($staff_info['image13'], 350, 450);
//                array_push($images_certificates, $image13);
//            }
//            else {
//                //$image13 = "";
//            }
//
//            if($staff_info['image14']) {
//                $image14 = $this->model_tool_image->resize($staff_info['image14'], 350, 450);
//                array_push($images_certificates, $image14);
//            }
//            else {
//                //$image14 = "";
//            }
//
//            if($staff_info['image15']) {
//                $image15 = $this->model_tool_image->resize($staff_info['image15'], 350, 450);
//                array_push($images_certificates, $image15);
//            }
//            else {
//                //$image15 = "";
//            }

            $this->data['images'] = array();

            $this->data['article_related'] = array();
            $this->data['article_related_id'] = array();
            $results = $this->model_catalog_staff->getProductImages($this->request->get['staff_id']);
            foreach ($results as $result) {
                $this->data['images'][] = array(
//                    'popup' => $this->model_tool_image->resize($result['image'], 650, 979),,

                    'popup' => "/image/".$result['image'],
                );
            }

            $images_certificates = array();

            if($staff_info['image1']) {
                $image1 = "/image/".$staff_info['image1'];
                array_push($images_certificates, $image1);
            }
            else {
                //$image1 = "";
            }

            if($staff_info['image2']) {
                $image2 = "/image/".$staff_info['image2'];
                array_push($images_certificates, $image2);
            }
            else {
                //$image2 = "";
            }
//            $this->model_tool_image->resize($staff_info['image1'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));

            if($staff_info['image3']) {
                $image3 = "/image/".$staff_info['image3'];
                array_push($images_certificates, $image3);
            }
            else {
                //$image3 = "";
            }

            if($staff_info['image4']) {
                $image4 = "/image/".$staff_info['image4'];
                array_push($images_certificates, $image4);
            }
            else {
                //$image4 = "";
            }

            if($staff_info['image5']) {
                $image5 = "/image/".$staff_info['image5'];
                array_push($images_certificates, $image5);
            }
            else {
                //$image5 = "";
            }

            if($staff_info['image6']) {
                $image6 = "/image/".$staff_info['image6'];
                array_push($images_certificates, $image6);
            }
            else {
                //$image6 = "";
            }

            if($staff_info['image7']) {
                $image7 = "/image/".$staff_info['image7'];
                array_push($images_certificates, $image7);
            }
            else {
                //$image7 = "";
            }

            if($staff_info['image8']) {
                $image8 = "/image/".$staff_info['image8'];
                array_push($images_certificates, $image8);
            }
            else {
                //$image8 = "";
            }

            if($staff_info['image9']) {
                $image9 = "/image/".$staff_info['image9'];
                array_push($images_certificates, $image9);
            }
            else {
                //$image9 = "";
            }

            if($staff_info['image10']) {
                $image10 = "/image/".$staff_info['image10'];
                array_push($images_certificates, $image10);
            }
            else {
                //$image10 = "";
            }

            if($staff_info['image11']) {
                $image11 = "/image/".$staff_info['image11'];
                array_push($images_certificates, $image11);
            }
            else {
                //$image11 = "";
            }

            if($staff_info['image12']) {
                $image12 = "/image/".$staff_info['image12'];
                array_push($images_certificates, $image12);
            }
            else {
                //$image12 = "";
            }

            if($staff_info['image13']) {
                $image13 = "/image/".$staff_info['image13'];
                array_push($images_certificates, $image13);
            }
            else {
                //$image13 = "";
            }

            if($staff_info['image14']) {
                $image14 = "/image/".$staff_info['image14'];
                array_push($images_certificates, $image14);
            }
            else {
                //$image14 = "";
            }

            if($staff_info['image15']) {
                $image15 = "/image/".$staff_info['image15'];
                array_push($images_certificates, $image15);
            }
            else {
                //$image15 = "";
            }
            $this->data['count']=count($images_certificates);
            $this->data['certification']=$images_certificates;
				$this->data['thumb'] = $this->model_tool_image->resize($staff_info['image'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
				$this->data['popup'] = $this->model_tool_image->resize($staff_info['image'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb1'] = $this->model_tool_image->resize($staff_info['image1'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup1'] = $this->model_tool_image->resize($staff_info['image1'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb2'] = $this->model_tool_image->resize($staff_info['image2'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup2'] = $this->model_tool_image->resize($staff_info['image2'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb3'] = $this->model_tool_image->resize($staff_info['image3'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup3'] = $this->model_tool_image->resize($staff_info['image3'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb4'] = $this->model_tool_image->resize($staff_info['image4'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup4'] = $this->model_tool_image->resize($staff_info['image4'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb5'] = $this->model_tool_image->resize($staff_info['image5'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup5'] = $this->model_tool_image->resize($staff_info['image5'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb6'] = $this->model_tool_image->resize($staff_info['image6'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup6'] = $this->model_tool_image->resize($staff_info['image6'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb7'] = $this->model_tool_image->resize($staff_info['image7'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup7'] = $this->model_tool_image->resize($staff_info['image7'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb8'] = $this->model_tool_image->resize($staff_info['image8'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup8'] = $this->model_tool_image->resize($staff_info['image8'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb9'] = $this->model_tool_image->resize($staff_info['image9'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup9'] = $this->model_tool_image->resize($staff_info['image9'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb10'] = $this->model_tool_image->resize($staff_info['image10'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup10'] = $this->model_tool_image->resize($staff_info['image10'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb11'] = $this->model_tool_image->resize($staff_info['image11'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup11'] = $this->model_tool_image->resize($staff_info['image11'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb12'] = $this->model_tool_image->resize($staff_info['image12'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup12'] = $this->model_tool_image->resize($staff_info['image12'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb13'] = $this->model_tool_image->resize($staff_info['image13'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup13'] = $this->model_tool_image->resize($staff_info['image13'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb14'] = $this->model_tool_image->resize($staff_info['image14'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup14'] = $this->model_tool_image->resize($staff_info['image14'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
//
//			$this->data['thumb15'] = $this->model_tool_image->resize($staff_info['image15'], $this->config->get('staff_thumb_width'), $this->config->get('staff_thumb_height'));
//			$this->data['popup15'] = $this->model_tool_image->resize($staff_info['image15'], $this->config->get('staff_popup_width'), $this->config->get('staff_popup_height'));
			
     		$this->data['button_staff'] = $this->language->get('button_staff');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['staff'] = $this->url->link('information/staff');
			$this->data['continue'] = $this->url->link('common/home');
			
			$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_staff->updateViewed($this->request->get['staff_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/staff.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/staff.tpl';
			} else {
				$this->template = 'default/template/information/staff.tpl';
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
			
	  		$staff_data = $this->model_catalog_staff->getStaff($data);
			$staff_data_big = $this->model_catalog_staff->getStaff($data_big);
			$staff_total = $this->model_catalog_staff->getTotalStaff();
			
			if($staff_data_big) {
				foreach ($staff_data_big as $result1) {
					$this->data['staff_data_big'][] = array(
						'id'  			=> $result1['staff_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/staff', 'staff_id=' . $result1['staff_id'])
					);
				}
			}
			
	  		if ($staff_data) {
				$this->document->setTitle(translatereturn("Врачи медцентра МДЦ LUX, Харьков, Украина | МДЦ LUX", "Лікарі медцентру МДЦ LUX, Харків, Україна | МДЦ LUX", "Doctors of the MEDC MEDICUM LUX, Kharkov, Ukraine | MDC LUX"));
				$this->document->setDescription(translatereturn("Медицинский оздоровительный центр: врач высшей категории, врач-рентгенолог, ортопед-травматолог. Лечащий врач - медицинский центр ⚕ Наши врачи, фотографии. ", "Медичний оздоровчий центр: лікар вищої категорії, лікар-рентгенолог, ортопед-травматолог. Лікуючий лікар - медичний центр ⚕ Наші лікарі, фотографії.", "Medical wellness center: a doctor of the highest category, a radiologist, an orthopedic trauma specialist. The attending physician is the medical center. ⚕ Our doctors, photos."));
			
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/staff'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('staff_headline_chars');
				
				$this->load->model('tool/image');
				foreach ($staff_data as $result) {
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
					if($result['staff_id']!=21){

					$this->data['staff_data'][] = array(
						'id'  				=> $result['staff_id'],
						'title'        		=> $result['title'],
						'page_url'        	=> $result['page_url'],
						'position'          => $result['position'] ,
                        'experience'        => $result['experience'],
                        'image'        		=> $image, $result,
						'images'        	=> $images_certificates,
						'description'  		=> html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'),
						'href'         		=> $this->url->link('information/staff', 'staff_id=' . $result['staff_id']),
						'posted'   			=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
					);
                    }
				}
				$pagination = new Pagination();
				$pagination->total = $staff_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/staff', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/staff.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/staff.tpl';
				} else {
					$this->template = 'default/template/information/staff.tpl';
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
	        		'href'      => $this->url->link('information/staff'),
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
