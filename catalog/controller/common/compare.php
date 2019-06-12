<?php   
class ControllerCommonCompare extends Controller {
	public function index() {
		echo count($this->session->data['compare']);
	}
}