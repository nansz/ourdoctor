<?php

class ControllerInformationPartners extends Controller {

	public function index() {
	
    	$this->language->load('information/partners');
	
		$this->load->model('catalog/partners');
		
		$this->load->model('catalog/product');
	
		$this->data['breadcrumbs'] = array();
	
		$this->data['breadcrumbs'][] = array(
			'href'      => $this->url->link('common/home'),
			'text'      => $this->language->get('text_home'),
			'separator' => false
		);
	
		if (isset($this->request->get['partners_id'])) {
			$partners_id = $this->request->get['partners_id'];
		} else {
			$partners_id = 0;
		}
	
		$partners_info = $this->model_catalog_partners->getPartnersStory($partners_id);
	
		if ($partners_info) {
	  	
			$this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
			$this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');
		
			$this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/partners'),
				'text'      => $this->language->get('heading_title'),
				'separator' => $this->language->get('text_separator')
			);
		
			$this->data['breadcrumbs'][] = array(
				'href'      => $this->url->link('information/partners', 'partners_id=' . $this->request->get['partners_id']),
				'text'      => $partners_info['title'],
				'separator' => $this->language->get('text_separator')
			);
			
			$this->document->setTitle($partners_info['title']);
			$this->document->setDescription($partners_info['meta_description']);
			$this->document->setKeywords($partners_info['meta_keyword']);
			$this->document->addLink($this->url->link('information/partners', 'partners_id=' . $this->request->get['partners_id']), 'canonical');
		
     		$this->data['partners_info'] = $partners_info;
		
     		$this->data['heading_title'] = $partners_info['title'];
     		$this->data['address'] = $partners_info['meta_description'];
     		$this->data['phone'] = $partners_info['date_added'];
     		$this->data['email'] = $partners_info['meta_keyword'];
     		$this->data['skype'] = $partners_info['skype'];
     		$this->data['map'] = html_entity_decode($partners_info['map']);
			
			$this->load->model('tool/image');
			$this->data['products'] = array();
			$products = $this->model_catalog_product->getProductsByPartner($partners_info['title']);
			
			foreach ($products as $pr) {	
				//var_dump($pr);
				$image = $this->model_tool_image->resize($pr['image'], 165, 98);
				$price = $this->currency->format($this->tax->calculate($pr['price'], $pr['tax_class_id'], $this->config->get('config_tax')));
				if ((float)$pr['special']) {
					$special = $this->currency->format($this->tax->calculate($pr['special'], $pr['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}
				
				$this->data['products'][] = array(
					'product_id' => $pr['product_id'],
					'thumb'   	 => $image,
					'name'    	 => $pr['name'],
					'price'   	 => $price,
					'special' 	 => $special,
					'href'    	 => $this->url->link('product/product', 'product_id=' . $pr['product_id'])
				);
			}
     		
			$this->data['description'] = html_entity_decode($partners_info['description']);
			
     		$this->data['meta_keyword'] = html_entity_decode($partners_info['meta_keyword']);
			
			$this->data['viewed'] = sprintf($this->language->get('text_viewed'), $partners_info['viewed']);
		
			$this->data['addthis'] = $this->config->get('partners_partnerspage_addthis');
		
			$this->data['min_height'] = $this->config->get('partners_thumb_height');
		
			$this->load->model('tool/image');
		
			if ($partners_info['image']) { $this->data['image'] = TRUE; } else { $this->data['image'] = FALSE; }
		
			$this->data['thumb'] = $this->model_tool_image->resize($partners_info['image'], $this->config->get('partners_thumb_width'), $this->config->get('partners_thumb_height'));
			$this->data['popup'] = $this->model_tool_image->resize($partners_info['image'], $this->config->get('partners_popup_width'), $this->config->get('partners_popup_height'));
		
     		$this->data['button_partners'] = $this->language->get('button_partners');
			$this->data['button_continue'] = $this->language->get('button_continue');
		
			$this->data['partners'] = $this->url->link('information/partners');
			$this->data['continue'] = $this->url->link('common/home');
			
			$this->data['referred'] = $_SERVER['HTTP_REFERER'];
			$this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];
			
			if ($this->data['referred'] != $this->data['refreshed']) {
				$this->model_catalog_partners->updateViewed($this->request->get['partners_id']);
			}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/partners.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/information/partners.tpl';
			} else {
				$this->template = 'default/template/information/partners.tpl';
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
			
			$data = array(
				'start'              => ($page - 1) * $limit,
				'limit'              => $limit
			);
			
	  		$partners_data = $this->model_catalog_partners->getPartners($data);
			$partners_total = $this->model_catalog_partners->getTotalPartners();
		
	  		if ($partners_data) {
			
				$this->document->setTitle($this->language->get('heading_title'));
			
				$this->data['breadcrumbs'][] = array(
					'href'      => $this->url->link('information/partners'),
					'text'      => $this->language->get('heading_title'),
					'separator' => $this->language->get('text_separator')
				);
			
				$this->data['heading_title'] = $this->language->get('heading_title');
			
				$this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
				$this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
			
				$this->data['text_more'] = $this->language->get('text_more');
				$this->data['text_posted'] = $this->language->get('text_posted');
				
				$chars = $this->config->get('partners_headline_chars');
			
				foreach ($partners_data as $result) {
					$this->data['partners_data'][] = array(
						'id'  				=> $result['partners_id'],
						'meta_description'  				=> $result['meta_description'],
						'phone'  				=> $result['date_added'],
						'title'        		=> html_entity_decode($result['title'], ENT_QUOTES, 'UTF-8'),
						'image'        		=> "/image/".$result['image'],
						'description'  	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $chars),
						'href'         		=> $this->url->link('information/partners', 'partners_id=' . $result['partners_id']),
						'posted'   		=> date($this->language->get('date_format_short'), strtotime($result['date_added']))
					);
				}
			
				$pagination = new Pagination();
				$pagination->total = $partners_total;
				$pagination->page = $page;
				$pagination->limit = $limit;
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('information/partners', '&page={page}');
			
				$this->data['pagination'] = $pagination->render();
			
				$this->data['button_continue'] = $this->language->get('button_continue');
			
				$this->data['continue'] = $this->url->link('common/home');
			
				if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/partners.tpl')) {
					$this->template = $this->config->get('config_template') . '/template/information/partners.tpl';
				} else {
					$this->template = 'default/template/information/partners.tpl';
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
	        		'href'      => $this->url->link('information/partners'),
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
