<?php  
class ControllerCommonHome extends Controller {
	public function index() {
		$this->language->load('common/header');
        $this->load->model('tool/image');

        $this->data['text_okompanii'] = $this->language->get('text_okompanii');
		$this->data['text_price'] = $this->language->get('text_price');
		$this->data['text_akcii'] = $this->language->get('text_akcii');
		$this->data['text_services'] = $this->language->get('text_services');
		$this->data['text_news'] = $this->language->get('text_news');
		$this->data['text_publications'] = $this->language->get('text_publications');
		$this->data['text_staff'] = $this->language->get('text_staff');
		$this->data['text_video'] = $this->language->get('text_video');
		$this->data['text_reviews'] = $this->language->get('text_reviews');
		$this->data['text_contacts'] = $this->language->get('text_contacts');
		$this->data['text_zapis'] = $this->language->get('text_zapis');
		$this->data['text_zvonok'] = $this->language->get('text_zvonok');
		$this->data['text_science'] = $this->language->get('text_science');
		$this->data['text_general'] = $this->language->get('text_general');
		$this->data['text_podrobnee'] = $this->language->get('text_podrobnee');
		$this->data['text_spec'] = $this->language->get('text_spec');
		$this->data['text_tom'] = $this->language->get('text_tom');
		$this->data['text_ort'] = $this->language->get('text_ort');
		$this->data['text_last'] = $this->language->get('text_last');
        $this->data['text_MDC'] = $this->language->get('text_MDC');

        $this->document->setTitle(translatereturn($this->config->get('config_title'), "МДЦ-Lux - діагностичний центр комп'ютерної томографії в Харкові", ""));
		$this->document->setDescription(translatereturn($this->config->get('config_meta_description'), "Консультативно-діагностичний центр комп'ютерної томографії (КТ) МДЦ-Lux в Харкові проводить обстеження всього організму на сучасному обладнанні - всі види КТ за доступними цінами.", ""));

		$this->data['heading_title'] = $this->config->get('config_title');
		
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['categories'] = array();
					
		$categories = $this->model_catalog_category->getCategories(0);
		
		$i=1;
		foreach ($categories as $category) {
		if($i>8) { break; }	
			$children_data = array();
			$children = $this->model_catalog_category->getCategories($category['category_id']);
			
			//var_dump($category['name']);
			foreach($children as $child) {
			
				
				
				//var_dump($child['name']);
				
				$subchildren_data = array();
				$subchildren = $this->model_catalog_category->getCategories($child['category_id']);
				
				
				foreach($subchildren as $subchild) {
					$subchildren_data[] = array(
						'category_id' => $subchild['category_id'],
						'name' => $subchild['name'],
						'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'] .'_'. $subchild['category_id'])
					);
					//var_dump($subchild['name']);
				}
				$children_data[] = array(
					'category_id' => $child['category_id'],
					'subchildren' => $subchildren_data,
					'name' => $child['name'],
					'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
				);
			}
			$this->data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					//'subchildren' => $subchildren_data,
					'active'   => in_array($category['category_id'], $parts),
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			$i++;
		}
		

		
		$this->load->model('catalog/information');
		$information_info = $this->model_catalog_information->getInformation(4);
		if ($information_info) {
			$this->data['video'] = $information_info['video'];
			$this->data['videotitle'] = $information_info['videotitle'];
			$this->data['videoimage'] = $information_info['videoimage'];
			$this->data['smalltext'] = $information_info['smalltext'];
		}
		
		$this->load->model('catalog/category');
		$this->load->model('tool/image');





		$tomography_info = $this->model_catalog_category->getCategory(110989);
		$this->data['tomography_text'] = html_entity_decode($tomography_info['smalltext'], ENT_QUOTES, 'UTF-8');
		$this->data['tomography_image'] = $tomography_info['image'];
		$this->data['tomography_image2'] = $tomography_info['image2'];
		$this->data['tomography_image3'] = $tomography_info['image3'];
		$this->data['tomography_image4'] = $tomography_info['image4'];
		
		
		
		$orthopedics_info = $this->model_catalog_category->getCategory(110988);
		$this->data['orthopedics_text'] = html_entity_decode($orthopedics_info['smalltext'], ENT_QUOTES, 'UTF-8');
		$this->data['orthopedics_image'] = $orthopedics_info['image'];
		$this->data['orthopedics_image2'] = $orthopedics_info['image2'];
		$this->data['orthopedics_image3'] = $orthopedics_info['image3'];
		$this->data['orthopedics_image4'] = $orthopedics_info['image4'];
		
		$this->load->model('catalog/general');
		$this->load->model('catalog/science');
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else { 
			$page = 1;
		}	
		
		if (isset($this->request->get['limit'])) {
			$limit = $this->request->get['limit'];
		} else {
			$limit = 5;
		}
		
		$data = array(
			'start'              => ($page - 1) * $limit,
			'limit'              => $limit
		);
		$general_data = $this->model_catalog_general->getGeneral($data);
		$science_data = $this->model_catalog_science->getScience($data);


        $this->data['products'] = array();
//        $this->load->model('catalog/category');

        $this->load->model('catalog/lastaddarticles');

        /*news */
        if($this->config->get('config_language_id') ==1){

        $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesru();
        foreach ($results_lastaddarticles_articles as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['articles_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
            );
        }

        $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsru();
        foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['diseasesandsymptoms_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
            );
        }

        $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesru();
        foreach ($results_lastaddarticles_medicalcases as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['medicalcases_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
            );
        }

        $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyru();
        foreach ($results_lastaddarticles_terminology as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['terminology_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
            );
        }

        $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsru();
        foreach ($results_lastaddarticles_medicinenews as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['medicinenews_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
            );
        }


        $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceru();
        foreach ($results_lastaddarticles_science as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['science_id'],
                'thumb'       => $image,
                'name'        => $result['title'],
                'date_added'        => $result['date_added'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
            );
        }

        $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralru();
        foreach ($results_lastaddarticles_general as $result) {
            if ($result['image']) {
                $image = $this->model_tool_image->resize($result['image'], 360,265);
            } else {
                $image = false;
            }
            $this->data['products'][] = array(
                'product_id'  => $result['general_id'],
                'thumb'       => $image,

                'date_added'        => $result['date_added'],
                'name'        => $result['title'],
                'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
            );
        }
        } elseif($this->config->get('config_language_id') ==3){
                $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesen();
                foreach ($results_lastaddarticles_articles as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['articles_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                    );
                }

                $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsen();
                foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['diseasesandsymptoms_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
                    );
                }

                $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesen();
                foreach ($results_lastaddarticles_medicalcases as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['medicalcases_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
                    );
                }

                $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyen();
                foreach ($results_lastaddarticles_terminology as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['terminology_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
                    );
                }

                $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsen();
                foreach ($results_lastaddarticles_medicinenews as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['medicinenews_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
                    );
                }


                $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceen();
                foreach ($results_lastaddarticles_science as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['science_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
                    );
                }

                $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralen();
                foreach ($results_lastaddarticles_general as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['general_id'],
                        'thumb'       => $image,

                        'date_added'        => $result['date_added'],
                        'name'        => $result['title'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
                    );
                }
            }

        elseif($this->config->get('config_language_id') ==2){
                $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesua();
                foreach ($results_lastaddarticles_articles as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['articles_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                    );
                }

                $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsua();
                foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['diseasesandsymptoms_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
                    );
                }

                $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesua();
                foreach ($results_lastaddarticles_medicalcases as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['medicalcases_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
                    );
                }

                $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyua();
                foreach ($results_lastaddarticles_terminology as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['terminology_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
                    );
                }

                $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsua();
                foreach ($results_lastaddarticles_medicinenews as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['medicinenews_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
                    );
                }


                $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceua();
                foreach ($results_lastaddarticles_science as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['science_id'],
                        'thumb'       => $image,
                        'name'        => $result['title'],
                        'date_added'        => $result['date_added'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
                    );
                }

                $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralua();
                foreach ($results_lastaddarticles_general as $result) {
                    if ($result['image']) {
                        $image = $this->model_tool_image->resize($result['image'], 360,265);
                    } else {
                        $image = false;
                    }
                    $this->data['products'][] = array(
                        'product_id'  => $result['general_id'],
                        'thumb'       => $image,

                        'date_added'        => $result['date_added'],
                        'name'        => $result['title'],
                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                        'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
                    );
                }
            }






        $home_publications_data = array();
		
		    array_push($home_publications_data, $general_data, $science_data);
		//array_push($home_publications_data, $science_data);
		
		//echo "<pre>";
		//var_dump($home_publications_data);
		//echo "</pre>";

		
		$this->data['publications_data'] = array();
		$this->data['publications_data'] = $home_publications_data;
		
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}
		
		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			//'common/footer1',
			'common/footer',
			//'common/header1',
			'common/header'
		);
										
		$this->response->setOutput($this->render());
	}
	
	public function send() {
		echo "111";
	}

    public function customMultiSort($array,$field) {
        $sortArr = array();
        // Получение списка столбцов
        foreach ($array as $key => $row) {
            $volume[$key]  = $row['date_added'];
        }

        $volume  = array_column($array, 'date_added');
        array_multisort($volume, SORT_DESC,   $array);
        return $array;
    }
}
?>