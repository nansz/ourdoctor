<?php 
class ControllerCommonQuickorders extends Controller {

  	public function index() {

		$this->document->setTitle("Заказы в один клик");

		$this->load->model('catalog/quickorders');
		
		$results = $this->model_catalog_quickorders->getOrders();
		
		$this->data['orders'] = array();
    	foreach ($results as $result) {
			$url = '&product_id=' . $result['product_id'];
			$this->data['orders'][] = array(
				'id'      => $result['id'],
				'date_add'      => $result['date_add'],
				'name'      => $result['name'],
				'phone'      => $result['phone'],
				'product'      => $result['product'],
				'product_id'      => $result['product_id'],
				'href'	=> $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . $url, 'SSL')
			);
		}
		
		$this->template = 'catalog/quickorders.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		$this->response->setOutput($this->render());
		
	}
}
?>