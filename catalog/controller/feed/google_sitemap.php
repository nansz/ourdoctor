<?php
class ControllerFeedGoogleSitemap extends Controller {
   public function index() {
	  if ($this->config->get('google_sitemap_status')) {
		 $output  = '<?xml version="1.0" encoding="UTF-8"?>';
		 $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		 
		 $this->load->model('catalog/product');
		 
		 $products = $this->model_catalog_product->getProducts();
		 
		 foreach ($products as $product) {
			if($product['description']) {
				$output .= '<url>';
				$output .= '<loc>' . $this->url->link('product/product', 'product_id=' . $product['product_id']) . '</loc>';
				$output .= '<changefreq>weekly</changefreq>';
				$output .= '<priority>1.0</priority>';
				$output .= '</url>';  
			}
		 }
		 
		 $this->load->model('catalog/category');
		 
		 $output .= $this->getCategories(0);
		 
		 
		 
		 $this->load->model('catalog/information');
		 
		 $informations = $this->model_catalog_information->getInformations();
		 
		 foreach ($informations as $information) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/information', 'information_id=' . $information['information_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sale') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 
		 $this->load->model('catalog/sale');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $sales = $this->model_catalog_sale->getSale($data);
		 foreach ($sales as $sale) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sale', 'sale_id=' . $sale['sale_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/articles') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 
		 $this->load->model('catalog/articles');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $articles = $this->model_catalog_articles->getArticles($data);
		 foreach ($articles as $article) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/articles', 'articles_id=' . $article['articles_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		  $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/general') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/general');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $general = $this->model_catalog_general->getGeneral($data);
		 foreach ($general as $gen) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/general', 'general_id=' . $gen['general_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		  $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/science') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/science');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $science = $this->model_catalog_science->getScience($data);
		 foreach ($science as $sci) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/science', 'science_id=' . $sci['science_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/staff') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/promotions') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
			
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('product/testimonial') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
			
		$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/contact') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';

			
		$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/information/pricetomography') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';
			
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/information/priceorthopedics') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';
			
			
		//////////////////
		
		$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sdorthopedics') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/sdorthopedics');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $sdorthopedics = $this->model_catalog_sdorthopedics->getSdorthopedics($data);
		 foreach ($sdorthopedics as $sdo) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sdorthopedics', 'sdorthopedics_id=' . $sdo['sdorthopedics_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sdtomography') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/sdtomography');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $sdtomography = $this->model_catalog_sdtomography->getSdtomography($data);
		 foreach ($sdtomography as $sdt) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sdtomography', 'sdtomography_id=' . $sdt['sdtomography_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 ///////////////////////
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sterminyorthopedics') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/sterminyorthopedics');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $sterminyorthopedics = $this->model_catalog_sterminyorthopedics->getSterminyorthopedics($data);
		 foreach ($sterminyorthopedics as $sto) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sterminyorthopedics', 'sterminyorthopedics_id=' . $sto['sterminyorthopedics_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 
		 $output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sterminytomography') . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>'; 
		 
		 $this->load->model('catalog/sterminytomography');
		 $data = array(
			'start' => 0,
			'limit' => '1000'
		 );
		 $sterminytomography = $this->model_catalog_sterminytomography->getSterminytomography($data);
		 foreach ($sterminytomography as $stt) {
			$output .= '<url>';
			$output .= '<loc>' . $this->url->link('information/sterminytomography', 'sterminytomography_id=' . $stt['sterminytomography_id']) . '</loc>';
			$output .= '<changefreq>weekly</changefreq>';
			$output .= '<priority>0.5</priority>';
			$output .= '</url>';   
		 }
		 
		 
		 //////////////////
		 
		 $output .= '</urlset>';
		 
		 $this->response->addHeader('Content-Type: application/xml');
		 $this->response->setOutput($output);
	  }
   }
   
   protected function getCategories($parent_id, $current_path = '') {
	  $output = '';
	  
	  $results = $this->model_catalog_category->getCategories($parent_id);
	  
	  foreach ($results as $result) {
		 if (!$current_path) {
			$new_path = $result['category_id'];
		 } else {
			$new_path = $current_path . '_' . $result['category_id'];
		 }

		 $output .= '<url>';
		 $output .= '<loc>' . $this->url->link('product/category', 'path=' . $new_path) . '</loc>';
		 $output .= '<changefreq>weekly</changefreq>';
		 $output .= '<priority>0.7</priority>';
		 $output .= '</url>';         

		 
		 
		   $output .= $this->getCategories($result['category_id'], $new_path);
	  }

	  return $output;
   }      
}
?>