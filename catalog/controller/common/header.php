<?php   
class ControllerCommonHeader extends Controller {
	protected function index() {
		
		define('FILTERPAGE', 'false', true);
		
		$this->data['title'] = $this->document->getTitle();
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}
		
		$this->load->model('catalog/product');
		$product_total = $this->model_catalog_product->getTotalProductSpecials();
		$this->data['count_specials'] = $product_total;
		
		$this->data['base'] = $server;
		$this->data['description'] = $this->document->getDescription();
		$this->data['keywords'] = $this->document->getKeywords();
		$this->data['links'] = $this->document->getLinks();	 
		$this->data['styles'] = $this->document->getStyles();
		$this->data['scripts'] = $this->document->getScripts();
		$this->data['lang'] = $this->language->get('code');
		$this->data['direction'] = $this->language->get('direction');
		$this->data['google_analytics'] = html_entity_decode($this->config->get('config_google_analytics'), ENT_QUOTES, 'UTF-8');
		$this->data['name'] = $this->config->get('config_name');
		
		if ($this->config->get('config_icon') && file_exists(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->data['icon'] = $server . 'image/' . $this->config->get('config_icon');
		} else {
			$this->data['icon'] = '';
		}
		
		if ($this->config->get('config_logo') && file_exists(DIR_IMAGE . $this->config->get('config_logo'))) {
			$this->data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$this->data['logo'] = '';

		}
        if ( !$this->customer->isLogged() ) {
            $this->data['login'] = true;
        } else {
            $this->data['login'] = false;
        }

                    $this->data['logout'] = $this->url->link('account/logout', '', 'SSL');


		$this->language->load('common/header');
		$this->data['og_url'] = (isset($this->request->server['HTTPS']) ? HTTPS_SERVER : HTTP_SERVER) . substr($this->request->server['REQUEST_URI'], 1, (strlen($this->request->server['REQUEST_URI'])-1));
		$this->data['og_image'] = $this->document->getOgImage();
		
		$this->data['text_home'] = $this->language->get('text_home');
		$this->data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		$this->data['text_shopping_cart'] = $this->language->get('text_shopping_cart');
    	$this->data['text_search'] = $this->language->get('text_search');
		$this->data['text_welcome'] = sprintf($this->language->get('text_welcome'), $this->url->link('account/login', '', 'SSL'), $this->url->link('account/register', '', 'SSL'));
		$this->data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', 'SSL'), $this->customer->getFirstName(), $this->customer->getLastName(), $this->url->link('account/logout', '', 'SSL'));
		$this->data['text_account'] = $this->language->get('text_account');
		$this->data['text_checkout'] = $this->language->get('text_checkout');



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

        $this->data['text_publications'] = $this->language->get('text_publications');
        $this->data['text_publicationsz'] = $this->language->get('text_publicationsz');
        $this->data['text_science'] = $this->language->get('text_science');
        $this->data['text_general'] = $this->language->get('text_general');
        $this->data['text_diseasesandsymptoms'] = $this->language->get('text_diseasesandsymptoms');
        $this->data['text_medicalcases'] = $this->language->get('text_medicalcases');
        $this->data['text_announcement'] = $this->language->get('text_announcement');
        $this->data['text_medicinenews'] = $this->language->get('text_medicinenews');
        $this->data['text_terminology'] = $this->language->get('text_terminology');
        $this->data['text_news'] = $this->language->get('text_news');
        $this->data['text_newz'] = $this->language->get('text_newz');
        $this->data['text_clasufication'] = $this->language->get('text_clasufication');

		
		
		
		
		if (isset($this->session->data['compare'])) {
			$this->data['count_compare'] = count($this->session->data['compare']);
		}
		else {
			$this->data['count_compare'] = 0;
		}
		
		$this->data['text_page'] = $this->language->get('text_page');
				
		$this->data['home'] = $this->url->link('common/home');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['logged'] = $this->customer->isLogged();
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');
		$this->data['medicaltest_href'] = $this->url->link('information/tests', '', 'SSL');
		$this->data['shopping_cart'] = $this->url->link('checkout/cart');
		$this->data['checkout'] = $this->url->link('checkout/checkout', '', 'SSL');
		
		// Daniel's robot detector
		$status = true;
		
		if (isset($this->request->server['HTTP_USER_AGENT'])) {
			$robots = explode("\n", trim($this->config->get('config_robots')));

			foreach ($robots as $robot) {
				if ($robot && strpos($this->request->server['HTTP_USER_AGENT'], trim($robot)) !== false) {
					$status = false;

					break;
				}
			}
		}
		
		// A dirty hack to try to set a cookie for the multi-store feature
		$this->load->model('setting/store');
		
		$this->data['stores'] = array();
		
		if ($this->config->get('config_shared') && $status) {
			$this->data['stores'][] = $server . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			
			$stores = $this->model_setting_store->getStores();
					
			foreach ($stores as $store) {
				$this->data['stores'][] = $store['url'] . 'catalog/view/javascript/crossdomain.php?session_id=' . $this->session->getId();
			}
		}
				
		// Search		
		if (isset($this->request->get['search'])) {
			$this->data['search'] = $this->request->get['search'];
		} else {
			$this->data['search'] = '';
		}
		
		// Menu
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		$this->load->model('catalog/category');
		
		$this->load->model('catalog/product');
		
		$this->data['categories'] = array();
					
		$categories = $this->model_catalog_category->getCategories(0);
		
		if(isset($this->request->get['path'])) {
			$this->data['catid'] = $this->request->get['path'];
		}
		else {
			$this->data['catid'] = '';
		}
		
		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();
				
				$children = $this->model_catalog_category->getCategories($category['category_id']);
				
				foreach ($children as $child) {
					//Будем вычислять кол-во товаров в категориях только если это кол-во надо показывать
					if ($this->config->get('config_product_count')) {
						$data = array(
							'filter_category_id'  => $child['category_id'],
							'filter_sub_category' => true
						); 
						
						$product_total = $this->model_catalog_product->getTotalProducts($data);
					}
									
					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $product_total . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])	
					);						
				}
				
				// Level 1
				$this->data['categories'][] = array(
					'name'     => $category['name'],
					'category_id'     => $category['category_id'],
					'children' => $children_data,
					'active'   => in_array($category['category_id'], $parts),
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}
		
		$this->children = array(
			'module/language',
			'module/currency',
			'module/cart'
		);
				
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/header.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/header.tpl';
		} else {
			$this->template = 'default/template/common/header.tpl';
		}
		
    	$this->render();
	} 	
}
?>
