<?php 
class ControllerProductCategories extends Controller {  
	public function index() { 
		
		
		$this->load->model('catalog/category');
		
		$this->load->model('tool/image'); 
		
		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => "Главная",
			'href'      => $this->url->link('common/home'),
       		'separator' => false
   		);	
		
		$this->data['breadcrumbs'][] = array(
       		'text'      => "Категории",
			'href'      => $this->url->link('product/categories'),
       		'separator' => false
   		);	
		
		$this->document->setTitle("Категории");
		
		$categories = $this->model_catalog_category->getCategories(0);
		$this->data['categories'] = array();
		
		foreach($categories as $cat) {
		
			$sub = $this->model_catalog_category->getCategories($cat['category_id']);
		
			$this->data['categories'][] = array(
				'name'  => $cat['name'],
				'thumb' => $this->model_tool_image->resize(($cat['image']=='' ? 'no_image.jpg' : $cat['image']), 100, 100),
				//'thumb'  => '/image/'.$cat['image'],
				'category_id'  => $cat['category_id'],
				'children' => $sub,
			);
			
		}
		
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/categories.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/categories.tpl';
			} else {
				$this->template = 'default/template/product/categories.tpl';
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