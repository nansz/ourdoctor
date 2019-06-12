<?php 
class ControllerInformationInformation extends Controller {
	public function index() {
	    $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
    	$this->language->load('information/information');
		
		$this->load->model('catalog/information');

		$this->data['breadcrumbs'] = array();
		
      	$this->data['breadcrumbs'][] = array(
        	'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home'),
        	'separator' => false
      	);
		
		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}
		
		$information_info = $this->model_catalog_information->getInformation($information_id);
   		
		if ($information_info) {
			
			if($information_id==4) {
				$this->data['video'] = $information_info['video'];
				$this->data['videotitle'] = $information_info['videotitle'];
				$this->data['videoimage'] = $information_info['videoimage'];
				$this->data['smalltext'] = $information_info['smalltext'];
				$this->data['imageone'] = $information_info['imageone'];
				$this->data['imagetwo'] = $information_info['imagetwo'];
				$this->data['description2'] = html_entity_decode($information_info['description2'], ENT_QUOTES, 'UTF-8');
			}
			
			
			if ($information_info['seo_title']) {
				$this->document->setTitle($information_info['seo_title']);
			} else {
				$this->document->setTitle($information_info['title']);
			}
			$this->document->setDescription($information_info['meta_description']);
			$this->document->setKeywords($information_info['meta_keyword']);
			
      		$this->data['breadcrumbs'][] = array(
        		'text'      => $information_info['title'],
			'href'      => $this->url->link('information/information', 'information_id=' .  $information_id),      		
        		'separator' => $this->language->get('text_separator')
      		);		
						
			if ($information_info['seo_h1']) {
				$this->data['heading_title'] = $information_info['seo_h1'];
			} else {
				$this->data['heading_title'] = $information_info['title'];
			}
      		
      		$this->data['button_continue'] = $this->language->get('button_continue');
			
			$this->data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');
      		
			$this->data['continue'] = $this->url->link('common/home');

			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/information.tpl')) {

				if ($_SERVER['REQUEST_URI'] == "/about-clinic/" or $_SERVER['REQUEST_URI'] == "/ua/about-clinic/" or $_SERVER['REQUEST_URI'] == "/en/about-clinic/") {
					$this->template = $this->config->get('config_template') . '/template/information/about_clinic.tpl';
				} else {
					$this->template = $this->config->get('config_template') . '/template/information/information.tpl';
				}
			} else {
				$this->template = 'default/template/information/information.tpl';
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
      		$this->data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('text_error'),
				'href'      => $this->url->link('information/information', 'information_id=' . $information_id),
        		'separator' => $this->language->get('text_separator')
      		);
				
	  		$this->document->setTitle($this->language->get('text_error'));
			
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
	
	public function info() {
		$this->load->model('catalog/information');
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}      
		
		$information_info = $this->model_catalog_information->getInformation($information_id);

		if ($information_info) {
			$output  = '<html dir="ltr" lang="en">' . "\n";
			$output .= '<head>' . "\n";
			$output .= '  <title>' . $information_info['title'] . '</title>' . "\n";
			$output .= '  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">' . "\n";
			$output .= '  <meta name="robots" content="noindex">' . "\n";
			$output .= '</head>' . "\n";
			$output .= '<body>' . "\n";
			$output .= '  <h1>' . $information_info['title'] . '</h1>' . "\n";
			$output .= html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8') . "\n";
			$output .= '  </body>' . "\n";
			$output .= '</html>' . "\n";			

			$this->response->setOutput($output);
		}
	}
	

	
	public function thankyou() {
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		$this->document->setTitle("Спасибо за Вашу заявку");
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/thankyou.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/thankyou.tpl';
		} else {
			$this->template = 'default/template/information/thankyou.tpl';
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
	
	public function pricetomography() {
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		$this->document->setTitle(translatereturn("Прайс лист на КТ | Томография цены  | МДЦ LUX", "Прайс лист на КТ | Томографія ціни | МДЦ LUX", "Price list on CT | Tomography prices | MDC LUX"));
		$this->document->setDescription(translatereturn("Прайс лист на услуги КТ в Харькове. Цена на КТ.  Онлайн прайс на услуги медцентра МДЦ LUX. Весь прайс на услуги медицинского центра  ➾", "Прайс лист на послуги КТ в Харкові. Ціна на КТ. Онлайн прайс на послуги медцентру МДЦ LUX. Весь прайс на послуги медичного центру ➾ ", "Price list for CT services in Kharkov. Price for CT. Online price for the services of the medical center of MDC LUX. All prices for medical center services ➾"));
			
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['products'] = array();
			
		$data = array(
			'filter_category_id' => 110989,

			'start'              => 0,
			'limit'              => 1000
		);
				
		$results = $this->model_catalog_product->getProducts($data);
		
		foreach ($results as $result) {

			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}

							
			$this->data['products'][] = array(
				'product_id'  => $result['product_id'],
				'name'        => $result['name'],
				'description'        => $result['description'],
				'price'       => $price,
				'href'        => $this->url->link('product/product', 'path=110989&product_id=' . $result['product_id'])
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/pricetomography.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/pricetomography.tpl';
		} else {
			$this->template = 'default/template/information/pricetomography.tpl';
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
	
	public function priceorthopedics() {
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		$this->document->setTitle(translatereturn("Прайс лист на услуги ортопеда-травматолога | МДЦ LUX", "Прайс лист на послуги ортопеда-травматолога | МДЦ LUX", "Price list for orthopedic trauma services | MDC LUX"));
		$this->document->setDescription(translatereturn("Прайс лист на прием ортопеда Харьков. Онлайн прайс на услуги врача ортопеда-травматолога в медицинском центре МДЦ LUX. Весь прайс на услуги медицинского центра  ➾", "Прайсл лист на прийом ортопеда Харків. Онлайн прайс на послуги лікаря ортопеда-травматолога в медичному центрі МДЦ LUX. Весь прайс на послуги медичного центру ➾", "Price list for the reception of the orthopedist Kharkov. Online price for the services of an orthopedic traumatologist in the medical center of MDC LUX. All prices for medical center services ➾"));
			
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['products'] = array();
			
		$data = array(
			'filter_category_id' => 110988,
			//'filter_filter'      => $filter, 
			//'sort'               => $sort,
			//'order'              => $order,
			'start'              => 0,
			'limit'              => 1000
		);
				
		$results = $this->model_catalog_product->getProducts($data);
		
		foreach ($results as $result) {

			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}

							
			$this->data['products'][] = array(
				'product_id'  => $result['product_id'],
				'name'        => $result['name'],
				'description'        => $result['description'],
				'price'       => $price,
				'href'        => $this->url->link('product/product', 'path=110989&product_id=' . $result['product_id'])
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/priceorthopedics.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/priceorthopedics.tpl';
		} else {
			$this->template = 'default/template/information/priceorthopedics.tpl';
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
	
	public function pricenewdirection() {
        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);
		$this->document->setTitle("Прайс-лист - Новое направление");
		
		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['products'] = array();
			
		$data = array(
			'filter_category_id' => 110987,
				'start'              => 0,
			'limit'              => 1000
		);
				
		$results = $this->model_catalog_product->getProducts($data);
		
		foreach ($results as $result) {

			
			if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
				$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
			} else {
				$price = false;
			}

							
			$this->data['products'][] = array(
				'product_id'  => $result['product_id'],
				'name'        => $result['name'],
				'price'       => $price,
				'href'        => $this->url->link('product/product', 'path=110989&product_id=' . $result['product_id'])
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/pricenewdirection.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/information/pricenewdirection.tpl';
		} else {
			$this->template = 'default/template/information/pricenewdirection.tpl';
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
?>