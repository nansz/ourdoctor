<?php

class ControllerInformationSale extends Controller {

	public function index() {
	
    	$this->language->load('information/sale');
	
		$this->load->model('catalog/sale');
	
		$this->data['breadcrumbs'] = array();
        $this->load->model('tool/image');

        $this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['sale_id'])) {
			$sale_id = $this->request->get['sale_id'];
		} else {
			$sale_id = 0;
		}
	
		$sale_info = $this->model_catalog_sale->getSaleStory($sale_id);
	
		if ($sale_info) {
			
			if($this->session->data['language']=='ua' && $sale_info['ukr']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /ua/sale/"); 
				exit(); 
			}
			
			if($this->session->data['language']=='ru' && $sale_info['rus']=='0') {
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /sale/"); 
				exit(); 
			}
			
			//$this->document->addStyle('catalog/view/theme/default/stylesheet/sale.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sale'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/sale', 'sale_id=' . $this->request->get['sale_id']),
				'text'      => $sale_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			if($sale_info['meta_title']) {
				$this->document->setTitle($sale_info['meta_title']);
			}
			else {
				$this->document->setTitle($sale_info['title']);
			}
			$this->document->setDescription($sale_info['meta_description']);
			$this->document->setKeywords($sale_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/sale', 'sale_id=' . $this->request->get['sale_id']), 'canonical');
		
     		$this->data['sale_info'] = $sale_info;
		
     		$this->data['heading_title'] = $sale_info['title'];
     		$this->data['date_added'] = $sale_info['date_added'];
     		
			$this->data['description'] = html_entity_decode($sale_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($sale_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $sale_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('sale_salepage_addthis');
		
			$this->data['min_height'] = $this->config->get('sale_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($sale_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($sale_info['image'], $this->config->get('sale_thumb_width'), $this->config->get('sale_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($sale_info['image'], $this->config->get('sale_popup_width'), $this->config->get('sale_popup_height'));
		
     		$this->data['button_sale'] = $this->language->get('button_sale');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['sale'] = $this->url->link('information/sale');
			$this->data['continue'] = $this->url->link('common/home');
			
			if(isset($_SERVER['HTTP_REFERER'])) {
				$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			}
			else {
				$this->data['referred'] = "";
			}
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_sale->updateViewed($this->request->get['sale_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sale.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/sale.tpl';
			} else {
				$this->template = 'default/template/information/sale.tpl';
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
	  			$sale_data = $this->model_catalog_sale->getSaleRus($data);
				$sale_data_big = $this->model_catalog_sale->getSaleRus($data_big);
				$sale_total = $this->model_catalog_sale->getTotalSaleRus();
			} elseif ($this->session->data['language']=='ua') {
	  			$sale_data = $this->model_catalog_sale->getSaleUkr($data);
				$sale_data_big = $this->model_catalog_sale->getSaleUkr($data_big);
				$sale_total = $this->model_catalog_sale->getTotalSaleUkr();
			} elseif ($this->session->data['language']=='en') {
	  			$sale_data = $this->model_catalog_sale->getSaleEng($data);
				$sale_data_big = $this->model_catalog_sale->getSaleEng($data_big);
				$sale_total = $this->model_catalog_sale->getTotalSaleEng();
			}

			
			if($sale_data_big) {
				foreach ($sale_data_big as $result1) {
					$this->data['sale_data_big'][] = array(
						'id'  				=> $result1['sale_id'],
						'title'        		=> $result1['title'],
						'href'         		=> $this->url->link('information/sale', 'sale_id=' . $result1['sale_id'])
					);
				}
			}
			
	  		if ($sale_data) {
			
				$this->document->setTitle(translatereturn("Все акции медицинского центра МДЦ LUX | МДЦ LUX", "Всі акції медичного центру МДЦ LUX | МДЦ LUX", "All actions of MDC's medical center LUX | MDC LUX"));
				$this->document->setDescription(translatereturn("Все акции медицинского оздоровительного центра МДЦ LUX. Скидки на комплекс услуг мед центра. Запись через сайт или по телефонам ➾", "Всі акції медичного оздоровчого центру МДЦ LUX. Знижки на комплекс послуг медичного центру. Запис через сайт або за телефонами ➾", "All shares of the medical wellness center of MDC LUX. Discounts for the complex of services of the medical center. Recording through the site or by phone ➾"));
			
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/sale'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('sale_headline_chars');
				
				
				
				foreach ($sale_data as $result) {

						if($result['image']) {
							$image = "/image/".$result['image'];
						}
						else {
							$image = "/image/no_image.jpg";
						}
						
						$this->data['sale_data'][] = array(
							'id'  				=> $result['sale_id'],
							'title'        		=> $result['title'],
                            'image'         => $this->model_tool_image->resize($result['image'], 225, 225),
                            'description' =>  utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
							'href'         		=> $this->url->link('information/sale', 'sale_id=' . $result['sale_id']),
							'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
						);
				}
			
				$pagination = new Paginationz();
				$pagination->total = $sale_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/sale', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/sale.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/sale.tpl';
				} else {
					$this->template = 'default/template/information/sale.tpl';
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
	        		'href'      => $this->url->link('information/sale'),
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
