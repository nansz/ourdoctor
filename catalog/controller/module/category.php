<?php  
class ControllerModuleCategory extends Controller {
	protected function index($setting) {
		$this->language->load('module/category');
		
    	$this->data['heading_title'] = $this->language->get('heading_title');
		
		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}
		
		if (isset($parts[0])) {
			$this->data['category_id'] = $parts[0];
		} else {
			$this->data['category_id'] = 0;
		}
		
		if (isset($parts[1])) {
			$this->data['child_id'] = $parts[1];
		} else {
			$this->data['child_id'] = 0;
		}
							
		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);
		
		//Показывать или нет количество товаров
		//$show_product_count = $this->config->get('config_product_count');
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
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/category.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/category.tpl';
		} else {
			$this->template = 'default/template/module/category.tpl';
		}
		
		$this->render();
  	}

}
?>