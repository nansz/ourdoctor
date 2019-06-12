<?php //
class ControllerProductSearch extends Controller {
	public function index() {
    	$this->language->load('product/search');

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['search'])) {
			$search = $this->request->get['search'];
		} else {
			$search = '';
		}

		if (isset($this->request->get['tag'])) {
			$tag = $this->request->get['tag'];
		} elseif (isset($this->request->get['search'])) {
			$tag = $this->request->get['search'];
		} else {
			$tag = '';
		}

		if (isset($this->request->get['description'])) {
			$description = $this->request->get['description'];
		} else {
			$description = '';
		}

		if (isset($this->request->get['filter_category_id'])) {
			$filter_category_id = $this->request->get['filter_category_id'];
		} else {
			$filter_category_id = 0;
		}

		if (isset($this->request->get['sub_category'])) {
			$sub_category = $this->request->get['sub_category'];
		} else {
			$sub_category = '';
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

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}


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


		if (isset($this->request->get['search'])) {
			$this->document->setTitle($this->language->get('heading_title') .  ' - ' . $this->request->get['search']);
		} else {
			$this->document->setTitle($this->language->get('heading_title'));
		}

		$this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
      		'separator' => false
   		);

		$url = '';

		if (isset($this->request->get['search'])) {
			$url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['tag'])) {
			$url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['description'])) {
			$url .= '&description=' . $this->request->get['description'];
		}

		if (isset($this->request->get['filter_category_id'])) {
			$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
		}

		if (isset($this->request->get['sub_category'])) {
			$url .= '&sub_category=' . $this->request->get['sub_category'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		if (isset($this->request->get['limit'])) {
			$url .= '&limit=' . $this->request->get['limit'];
		}

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('product/search', $url),
      		'separator' => $this->language->get('text_separator')
   		);

		if (isset($this->request->get['search'])) {
    		$this->data['heading_title'] = $this->language->get('heading_title') .  ' - ' . $this->request->get['search'];
		} else {
			$this->data['heading_title'] = $this->language->get('heading_title');
		}

		$this->data['text_empty'] = $this->language->get('text_empty');
    	$this->data['text_critea'] = $this->language->get('text_critea');
    	$this->data['text_search'] = $this->language->get('text_search');
		$this->data['text_keyword'] = $this->language->get('text_keyword');
		$this->data['text_category'] = $this->language->get('text_category');
		$this->data['text_sub_category'] = $this->language->get('text_sub_category');
		$this->data['text_quantity'] = $this->language->get('text_quantity');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_model'] = $this->language->get('text_model');
		$this->data['text_price'] = $this->language->get('text_price');
		$this->data['text_tax'] = $this->language->get('text_tax');
		$this->data['text_points'] = $this->language->get('text_points');
		$this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
		$this->data['text_display'] = $this->language->get('text_display');
		$this->data['text_list'] = $this->language->get('text_list');
		$this->data['text_grid'] = $this->language->get('text_grid');
		$this->data['text_sort'] = $this->language->get('text_sort');
		$this->data['text_limit'] = $this->language->get('text_limit');
        $this->data['error_search'] = $this->language->get('error_search');


		$this->data['entry_search'] = $this->language->get('entry_search');
    	$this->data['entry_description'] = $this->language->get('entry_description');

    	$this->data['button_search'] = $this->language->get('button_search');
		$this->data['button_cart'] = $this->language->get('button_cart');
		$this->data['button_wishlist'] = $this->language->get('button_wishlist');
		$this->data['button_compare'] = $this->language->get('button_compare');

		$this->data['compare'] = $this->url->link('product/compare');

		$this->load->model('catalog/category');

		// 3 Level Category Search
		$this->data['categories'] = array();

		$categories_1 = $this->model_catalog_category->getCategories(0);

		foreach ($categories_1 as $category_1) {
			$level_2_data = array();

			$categories_2 = $this->model_catalog_category->getCategories($category_1['category_id']);

			foreach ($categories_2 as $category_2) {
				$level_3_data = array();

				$categories_3 = $this->model_catalog_category->getCategories($category_2['category_id']);

				foreach ($categories_3 as $category_3) {
					$level_3_data[] = array(
						'category_id' => $category_3['category_id'],
						'name'        => $category_3['name'],
					);
				}

				$level_2_data[] = array(
					'category_id' => $category_2['category_id'],
					'name'        => $category_2['name'],
					'children'    => $level_3_data
				);
			}

			$this->data['categories'][] = array(
				'category_id' => $category_1['category_id'],
				'name'        => $category_1['name'],
				'children'    => $level_2_data
			);
		}
		$this->data['products'] = array();

		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$data = array(
				'filter_name'         => $search,
				'filter_tag'          => $tag,
				'filter_description'  => $description,
				'filter_category_id'  => $filter_category_id,
				'filter_sub_category' => $sub_category,
				'sort'                => $sort,
				'order'               => $order,
				'start'               => ($page - 1) * $limit,
				'limit'               => $limit
			);
            $this->load->model('catalog/search');

            $results_seerch_product = $this->model_catalog_search->getSearchProducts($data);


            //Вызов метода getFoundProducts должен проводится сразу же после getProducts
			//только тогда он выдает правильное значения количества товаров
			$product_total = $this->model_catalog_product->getFoundProducts();

			foreach ($results_seerch_product as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'],360,265);
//					$this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
				} else {
					$image = false;
				}
				$this->data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'] )
				);
			}

			/*news */
            $results_seerch_articles = $this->model_catalog_search->getSearchArticles($data);
            foreach ($results_seerch_articles as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                );
            }

            $results_seerch_Diseasesandsymptoms = $this->model_catalog_search->getSearchDiseasesandsymptoms($data);
            foreach ($results_seerch_Diseasesandsymptoms as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'])
                );
            }

            $results_seerch_medicalcases = $this->model_catalog_search->getSearchMedicalcases($data);
            foreach ($results_seerch_medicalcases as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['articles_id'] )
                );
            }

            $results_seerch_terminology = $this->model_catalog_search->getSearchTerminology($data);
            foreach ($results_seerch_terminology as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['articles_id'] )
                );
            }
            $results_seerch_medicinenews = $this->model_catalog_search->getSearchMedicinenews($data);
            foreach ($results_seerch_medicinenews as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['articles_id'] )
                );
            }


			$results_seerch_science = $this->model_catalog_search->getSearchScience($data);
            foreach ($results_seerch_science as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/science', 'science_id=' . $result['articles_id'] )
                );
            }

            $results_seerch_general = $this->model_catalog_search->getSearchGeneral($data);
            foreach ($results_seerch_general as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['name'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                    'href'        => $this->url->link('information/general', 'general_id=' . $result['articles_id'] )
                );
            }


			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['filter_category_id'])) {
				$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$this->data['sorts'] = array();

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_default'),
				'value' => 'p.sort_order-ASC',
				'href'  => $this->url->link('product/search', 'sort=p.sort_order&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_asc'),
				'value' => 'pd.name-ASC',
				'href'  => $this->url->link('product/search', 'sort=pd.name&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_name_desc'),
				'value' => 'pd.name-DESC',
				'href'  => $this->url->link('product/search', 'sort=pd.name&order=DESC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_asc'),
				'value' => 'p.price-ASC',
				'href'  => $this->url->link('product/search', 'sort=p.price&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_price_desc'),
				'value' => 'p.price-DESC',
				'href'  => $this->url->link('product/search', 'sort=p.price&order=DESC' . $url)
			);

			if ($this->config->get('config_review_status')) {
				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_desc'),
					'value' => 'rating-DESC',
					'href'  => $this->url->link('product/search', 'sort=rating&order=DESC' . $url)
				);

				$this->data['sorts'][] = array(
					'text'  => $this->language->get('text_rating_asc'),
					'value' => 'rating-ASC',
					'href'  => $this->url->link('product/search', 'sort=rating&order=ASC' . $url)
				);
			}

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_asc'),
				'value' => 'p.model-ASC',
				'href'  => $this->url->link('product/search', 'sort=p.model&order=ASC' . $url)
			);

			$this->data['sorts'][] = array(
				'text'  => $this->language->get('text_model_desc'),
				'value' => 'p.model-DESC',
				'href'  => $this->url->link('product/search', 'sort=p.model&order=DESC' . $url)
			);

			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['filter_category_id'])) {
				$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			$this->data['limits'] = array();

			$limits = array_unique(array($this->config->get('config_catalog_limit'), 25, 50, 75, 100));

			sort($limits);

			foreach($limits as $value){
				$this->data['limits'][] = array(
					'text'  => $value,
					'value' => $value,
					'href'  => $this->url->link('product/search', $url . '&limit=' . $value)
				);
			}

			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['filter_category_id'])) {
				$url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}
			$count=count($this->data['products']);

            /*I created a new file with pagination. I changed the styles in it to the ones we need. And added it to the inclusion of startup.php*/
            /*создал новый файл с пагинацией поменял в нем стили на те что нам надо. И добавил ее во включение startup.php*/
            $pagination = new Paginationz();
            $pagination->total = $count;
            $pagination->page = $page;
            $pagination->limit = $limit;
            $pagination->text = $this->language->get('text_pagination');
            $pagination->url = $this->url->link('product/search', '&page={page}'.$url);

            $this->data['sort'] = $sort;
            $this->data['order'] = $order;
            $this->data['limit'] = $limit;

            $this->data['continue'] = $this->url->link('common/home');
            $this->data['pagination'] = $pagination->render();
		}

		$this->data['search'] = $search;
		$this->data['description'] = $description;
		$this->data['filter_category_id'] = $filter_category_id;
		$this->data['sub_category'] = $sub_category;

		$this->data['sort'] = $sort;
		$this->data['order'] = $order;
		$this->data['limit'] = $limit;

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/search.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/product/search.tpl';
		} else {
			$this->template = 'default/template/product/search.tpl';
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
//?>
<?php
////class ControllerProductSearchajax extends Controller {
//    class ControllerProductSearch extends Controller {
//
//    public function index() {
//        $this->language->load('product/search');
//
//        $this->load->model('catalog/category');
//
//        $this->load->model('catalog/product');
//
//        $this->load->model('tool/image');
//
//        if (isset($this->request->get['search'])) {
//            $search = $this->request->get['search'];
//        } else {
//            $search = '';
//        }
//
//        if (isset($this->request->get['tag'])) {
//            $tag = $this->request->get['tag'];
//        } elseif (isset($this->request->get['search'])) {
//            $tag = $this->request->get['search'];
//        } else {
//            $tag = '';
//        }
//
//        if (isset($this->request->get['description'])) {
//            $description = $this->request->get['description'];
//        } else {
//            $description = '';
//        }
//
//        if (isset($this->request->get['filter_category_id'])) {
//            $filter_category_id = $this->request->get['filter_category_id'];
//        } else {
//            $filter_category_id = 0;
//        }
//
//        if (isset($this->request->get['sub_category'])) {
//            $sub_category = $this->request->get['sub_category'];
//        } else {
//            $sub_category = '';
//        }
//
//        if (isset($this->request->get['sort'])) {
//            $sort = $this->request->get['sort'];
//        } else {
//            $sort = 'p.sort_order';
//        }
//
//        if (isset($this->request->get['order'])) {
//            $order = $this->request->get['order'];
//        } else {
//            $order = 'ASC';
//        }
//
//        if (isset($this->request->get['page'])) {
//            $page = $this->request->get['page'];
//        } else {
//            $page = 1;
//        }
//
//
//        if (isset($this->request->get['page'])) {
//            $page = $this->request->get['page'];
//        } else {
//            $page = 1;
//        }
//
//        if (isset($this->request->get['sort'])) {
//            $sort = $this->request->get['sort'];
//        } else {
//            $sort = 'p.sort_order';
//        }
//
//        if (isset($this->request->get['order'])) {
//            $order = $this->request->get['order'];
//        } else {
//            $order = 'ASC';
//        }
//
//
//
//        if (isset($this->request->get['limit'])) {
//            $limit = $this->request->get['limit'];
//        } else {
//            //$limit = $this->config->get('config_catalog_limit');
//            //$limit = 5;
//        }
//        $limit = 10;
//        $limits = 10;
//        $data = array(
//            'start' => ($page - 1) * $limit,
//            'limit' => $limit
//        );
//
//
//        if (isset($this->request->get['search'])) {
//            $this->document->setTitle($this->language->get('heading_title') .  ' - ' . $this->request->get['search']);
//        } else {
//            $this->document->setTitle($this->language->get('heading_title'));
//        }
//
//        $this->document->addScript('catalog/view/javascript/jquery/jquery.total-storage.min.js');
//
//        $this->data['breadcrumbs'] = array();
//
//        $this->data['breadcrumbs'][] = array(
//            'text'      => $this->language->get('text_home'),
//            'href'      => $this->url->link('common/home'),
//            'separator' => false
//        );
//
//        $url = '';
//
//        if (isset($this->request->get['search'])) {
//            $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['tag'])) {
//            $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['description'])) {
//            $url .= '&description=' . $this->request->get['description'];
//        }
//
//        if (isset($this->request->get['filter_category_id'])) {
//            $url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
//        }
//
//        if (isset($this->request->get['sub_category'])) {
//            $url .= '&sub_category=' . $this->request->get['sub_category'];
//        }
//
//        if (isset($this->request->get['sort'])) {
//            $url .= '&sort=' . $this->request->get['sort'];
//        }
//
//        if (isset($this->request->get['order'])) {
//            $url .= '&order=' . $this->request->get['order'];
//        }
//
//        if (isset($this->request->get['page'])) {
//            $url .= '&page=' . $this->request->get['page'];
//        }
//
//        if (isset($this->request->get['limit'])) {
//            $url .= '&limit=' . $this->request->get['limit'];
//        }
//
//        $this->data['breadcrumbs'][] = array(
//            'text'      => $this->language->get('heading_title'),
//            'href'      => $this->url->link('product/search', $url),
//            'separator' => $this->language->get('text_separator')
//        );
//
//        if (isset($this->request->get['search'])) {
//            $this->data['heading_title'] = $this->language->get('heading_title') .  ' - ' . $this->request->get['search'];
//        } else {
//            $this->data['heading_title'] = $this->language->get('heading_title');
//        }
//
//        $this->data['text_empty'] = $this->language->get('text_empty');
//        $this->data['text_critea'] = $this->language->get('text_critea');
//        $this->data['text_search'] = $this->language->get('text_search');
//        $this->data['text_keyword'] = $this->language->get('text_keyword');
//        $this->data['text_category'] = $this->language->get('text_category');
//        $this->data['text_sub_category'] = $this->language->get('text_sub_category');
//        $this->data['text_quantity'] = $this->language->get('text_quantity');
//        $this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
//        $this->data['text_model'] = $this->language->get('text_model');
//        $this->data['text_price'] = $this->language->get('text_price');
//        $this->data['text_tax'] = $this->language->get('text_tax');
//        $this->data['text_points'] = $this->language->get('text_points');
//        $this->data['text_compare'] = sprintf($this->language->get('text_compare'), (isset($this->session->data['compare']) ? count($this->session->data['compare']) : 0));
//        $this->data['text_display'] = $this->language->get('text_display');
//        $this->data['text_list'] = $this->language->get('text_list');
//        $this->data['text_grid'] = $this->language->get('text_grid');
//        $this->data['text_sort'] = $this->language->get('text_sort');
//        $this->data['text_limit'] = $this->language->get('text_limit');
//
//        $this->data['entry_search'] = $this->language->get('entry_search');
//        $this->data['entry_description'] = $this->language->get('entry_description');
//
//        $this->data['button_search'] = $this->language->get('button_search');
//        $this->data['button_cart'] = $this->language->get('button_cart');
//        $this->data['button_wishlist'] = $this->language->get('button_wishlist');
//        $this->data['button_compare'] = $this->language->get('button_compare');
//
//        $this->data['compare'] = $this->url->link('product/compare');
//
//        $this->load->model('catalog/category');
//
//        // 3 Level Category Search
//        $this->data['categories'] = array();
//
//        $categories_1 = $this->model_catalog_category->getCategories(0);
//
//        foreach ($categories_1 as $category_1) {
//            $level_2_data = array();
//
//            $categories_2 = $this->model_catalog_category->getCategories($category_1['category_id']);
//
//            foreach ($categories_2 as $category_2) {
//                $level_3_data = array();
//
//                $categories_3 = $this->model_catalog_category->getCategories($category_2['category_id']);
//
//                foreach ($categories_3 as $category_3) {
//                    $level_3_data[] = array(
//                        'category_id' => $category_3['category_id'],
//                        'name'        => $category_3['name'],
//                    );
//                }
//
//                $level_2_data[] = array(
//                    'category_id' => $category_2['category_id'],
//                    'name'        => $category_2['name'],
//                    'children'    => $level_3_data
//                );
//            }
//
//            $this->data['categories'][] = array(
//                'category_id' => $category_1['category_id'],
//                'name'        => $category_1['name'],
//                'children'    => $level_2_data
//            );
//        }
//        $this->data['products'] = array();
//
//        if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
//            $data = array(
//                'filter_name' => $search,
//                'filter_tag' => $tag,
//                'filter_description' => $description,
//                'filter_category_id' => $filter_category_id,
//                'filter_sub_category' => $sub_category,
//                'sort' => $sort,
//                'order' => $order,
//                'start' => ($page - 1) * $limit,
//                'limit' => $limit
//            );
//            $this->load->model('catalog/search');
//
//            $results_seerch_product = $this->model_catalog_search->getSearchProducts($data);
//
//
//            //Вызов метода getFoundProducts должен проводится сразу же после getProducts
//            //только тогда он выдает правильное значения количества товаров
//            $product_total = $this->model_catalog_product->getFoundProducts();
//
//            foreach ($results_seerch_product as $result) {
//                if ($result != null) {
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
////					$this->config->get('config_image_product_width'), $this->config->get('config_image_product_height'));
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['product_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('product/product', 'product_id=' . $result['product_id'])
//                    );
//                }
//            }
//
//            /*news */
//            $results_seerch_articles = $this->model_catalog_search->getSearchArticles($data);
//            foreach ($results_seerch_articles as $result) {
//                if ($result != null) {
//
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['articles_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'])
//                    );
//                }}
//
//            $results_seerch_Diseasesandsymptoms = $this->model_catalog_search->getSearchDiseasesandsymptoms($data);
//            foreach ($results_seerch_Diseasesandsymptoms as $result) {
//                if ($result != null) {
//
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['diseasesandsymptoms_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('information/diseasesandsymptoms', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
//                    );
//                }}
//
//            $results_seerch_medicalcases = $this->model_catalog_search->getSearchMedicalcases($data);
//            foreach ($results_seerch_medicalcases as $result) {
//                if ($result != null) {
//
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['medicalcases_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'])
//                    );
//                }}
//
//            $results_seerch_terminology = $this->model_catalog_search->getSearchTerminology($data);
//            foreach ($results_seerch_terminology as $result) {
//                if ($result != null) {
//
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['terminology_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'])
//                    );
//                }
//            }
//            $results_seerch_medicinenews = $this->model_catalog_search->getSearchMedicinenews($data);
//            foreach ($results_seerch_medicinenews as $result)
//                if ($result != null) {
//
//                    if ($result['image']) {
//                        $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                    } else {
//                        $image = false;
//                    }
//                    $this->data['products'][] = array(
//                        'product_id' => $result['medicinenews_id'],
//                        'thumb' => $image,
//                        'name' => $result['name'],
//                        'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                        'href' => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'])
//                    );
//                }
//        }
//
//
//        $results_seerch_science = $this->model_catalog_search->getSearchScience($data);
//        foreach ($results_seerch_science as $result) {
//            if ($result != null) {
//
//                if ($result['image']) {
//                    $image = $this->model_tool_image->resize($result['image'], 360, 265);
//                } else {
//                    $image = false;
//                }
//                $this->data['products'][] = array(
//                    'product_id' => $result['science_id'],
//                    'thumb' => $image,
//                    'name' => $result['name'],
//                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                    'href' => $this->url->link('information/science', 'science_id=' . $result['science_id'])
//                );
//            }
//        }
//        $results_seerch_general = $this->model_catalog_search->getSearchGeneral($data);
//
//        foreach ($results_seerch_general as $result) {
//            if($result!=null) {
//                if ($result['image']) {
//                    $image = $this->model_tool_image->resize($result['image'], 360,265);
//                } else {
//                    $image = false;
//                }
//                $this->data['products'][] = array(
//                    'product_id'  => $result['articles_id'],
//                    'thumb'       => $image,
//                    'name'        => $result['name'],
//                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
//                    'href'        => $this->url->link('information/general', 'general_id=' . $result['articles_id'] )
//                );
//            }
//        }
//
//        $url = '';
//
//        if (isset($this->request->get['search'])) {
//            $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['tag'])) {
//            $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['description'])) {
//            $url .= '&description=' . $this->request->get['description'];
//        }
//
//        if (isset($this->request->get['filter_category_id'])) {
//            $url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
//        }
//
//        if (isset($this->request->get['sub_category'])) {
//            $url .= '&sub_category=' . $this->request->get['sub_category'];
//        }
//
//        if (isset($this->request->get['limit'])) {
//            $url .= '&limit=' . $this->request->get['limit'];
//        }
//
//        $this->data['sorts'] = array();
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_default'),
//            'value' => 'p.sort_order-ASC',
//            'href'  => $this->url->link('product/search', 'sort=p.sort_order&order=ASC' . $url)
//        );
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_name_asc'),
//            'value' => 'pd.name-ASC',
//            'href'  => $this->url->link('product/search', 'sort=pd.name&order=ASC' . $url)
//        );
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_name_desc'),
//            'value' => 'pd.name-DESC',
//            'href'  => $this->url->link('product/search', 'sort=pd.name&order=DESC' . $url)
//        );
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_price_asc'),
//            'value' => 'p.price-ASC',
//            'href'  => $this->url->link('product/search', 'sort=p.price&order=ASC' . $url)
//        );
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_price_desc'),
//            'value' => 'p.price-DESC',
//            'href'  => $this->url->link('product/search', 'sort=p.price&order=DESC' . $url)
//        );
//
//        if ($this->config->get('config_review_status')) {
//            $this->data['sorts'][] = array(
//                'text'  => $this->language->get('text_rating_desc'),
//                'value' => 'rating-DESC',
//                'href'  => $this->url->link('product/search', 'sort=rating&order=DESC' . $url)
//            );
//
//            $this->data['sorts'][] = array(
//                'text'  => $this->language->get('text_rating_asc'),
//                'value' => 'rating-ASC',
//                'href'  => $this->url->link('product/search', 'sort=rating&order=ASC' . $url)
//            );
//        }
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_model_asc'),
//            'value' => 'p.model-ASC',
//            'href'  => $this->url->link('product/search', 'sort=p.model&order=ASC' . $url)
//        );
//
//        $this->data['sorts'][] = array(
//            'text'  => $this->language->get('text_model_desc'),
//            'value' => 'p.model-DESC',
//            'href'  => $this->url->link('product/search', 'sort=p.model&order=DESC' . $url)
//        );
//
//        $url = '';
//
//        if (isset($this->request->get['search'])) {
//            $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['tag'])) {
//            $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['description'])) {
//            $url .= '&description=' . $this->request->get['description'];
//        }
//
//        if (isset($this->request->get['filter_category_id'])) {
//            $url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
//        }
//
//        if (isset($this->request->get['sub_category'])) {
//            $url .= '&sub_category=' . $this->request->get['sub_category'];
//        }
//
//        if (isset($this->request->get['sort'])) {
//            $url .= '&sort=' . $this->request->get['sort'];
//        }
//
//        if (isset($this->request->get['order'])) {
//            $url .= '&order=' . $this->request->get['order'];
//        }
//
//        $this->data['limits'] = array();
//
////			$limits = array_unique(array($this->config->get('config_catalog_limit'), 25, 50, 75, 100));
//
//        sort($limits);
//
//        foreach($limits as $value){
//            $this->data['limits'][] = array(
//                'text'  => $value,
//                'value' => $value,
//                'href'  => $this->url->link('product/search', $url . '&limit=' . $value)
//            );
//        }
//
//        $url = '';
//
//        if (isset($this->request->get['search'])) {
//            $url .= '&search=' . urlencode(html_entity_decode($this->request->get['search'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['tag'])) {
//            $url .= '&tag=' . urlencode(html_entity_decode($this->request->get['tag'], ENT_QUOTES, 'UTF-8'));
//        }
//
//        if (isset($this->request->get['description'])) {
//            $url .= '&description=' . $this->request->get['description'];
//        }
//
//        if (isset($this->request->get['filter_category_id'])) {
//            $url .= '&filter_category_id=' . $this->request->get['filter_category_id'];
//        }
//
//        if (isset($this->request->get['sub_category'])) {
//            $url .= '&sub_category=' . $this->request->get['sub_category'];
//        }
//
//        if (isset($this->request->get['sort'])) {
//            $url .= '&sort=' . $this->request->get['sort'];
//        }
//
//        if (isset($this->request->get['order'])) {
//            $url .= '&order=' . $this->request->get['order'];
//        }
//
//        if (isset($this->request->get['limit'])) {
//            $url .= '&limit=' . $this->request->get['limit'];
//        }
//        $count=count($this->data['products']);
//
//        /*I created a new file with pagination. I changed the styles in it to the ones we need. And added it to the inclusion of startup.php*/
//        /*создал новый файл с пагинацией поменял в нем стили на те что нам надо. И добавил ее во включение startup.php*/
//        $pagination = new Paginationz();
//        $pagination->total = $count;
//        $pagination->page = $page;
//        $pagination->limit = $limit;
//        $pagination->text = $this->language->get('text_pagination');
//        $pagination->url = $this->url->link('product/search', '&page={page}'.$url);
//
//        $this->data['sort'] = $sort;
//        $this->data['order'] = $order;
//        $this->data['limit'] = $limit;
//
//        $this->data['continue'] = $this->url->link('common/home');
//        $this->data['pagination'] = $pagination->render();
//
//
//        $this->data['search'] = $search;
//        $this->data['description'] = $description;
//        $this->data['filter_category_id'] = $filter_category_id;
//        $this->data['sub_category'] = $sub_category;
//
//        $this->data['sort'] = $sort;
//        $this->data['order'] = $order;
//        $this->data['limit'] = $limit;
//
//        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/search.tpl')) {
//            $this->template = $this->config->get('config_template') . '/template/product/search.tpl';
//        } else {
//            $this->template = 'default/template/product/search.tpl';
//        }
//
//        $this->children = array(
//            'common/column_left',
//            'common/column_right',
//            'common/content_top',
//            'common/content_bottom',
//            'information/minileftcolumn',
//            'information/lastaddarticles',
//            'information/search',
//
//            'common/footer',
//            'common/header'
//        );
//        if ($this->data['products']==null){
//
//            $json['error'] = $this->language->get('error_search');
//
//        } else {
//            $json = $this->data['products'];
//
//        }
////        $json = $this->data['products'];
//
//        		$this->response->setOutput($this->render());
//
////        $this->response->setOutput(json_encode($json));
//    }
//}
//?>
