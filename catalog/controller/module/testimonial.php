<?php  
class ControllerModuletestimonial extends Controller {

	protected function index($setting) {
		$this->language->load('module/testimonial');

		$this->data['testimonial_title'] = html_entity_decode($setting['testimonial_title'][$this->config->get('config_language_id')], ENT_QUOTES, 'UTF-8');

      	$this->data['heading_title'] = $this->language->get('heading_title');
      	$this->data['text_more'] = $this->language->get('text_more');
      	$this->data['text_more2'] = $this->language->get('text_more2');
		$this->data['isi_testimonial'] = $this->language->get('isi_testimonial');
		$this->data['show_all'] = $this->language->get('show_all');
		$this->data['showall_url'] = $this->url->link('product/testimonial', '', 'SSL'); 
		$this->data['more'] = $this->url->link('product/testimonial', 'testimonial_id=' , 'SSL'); 
		$this->data['isitesti'] = $this->url->link('product/isitestimonial', '', 'SSL');

		$this->load->model('catalog/testimonial');
		
		$this->data['testimonials'] = array();
		

			if($this->session->data['language']=='ru') {
				$this->data['total'] = $this->model_catalog_testimonial->getTotalTestimonialsRus();
				$results = $this->model_catalog_testimonial->getTestimonialsRus(0, $setting['testimonial_limit'], (isset($setting['testimonial_random']))?true:false);
			} elseif ($this->session->data['language']=='ua') {
				$this->data['total'] = $this->model_catalog_testimonial->getTotalTestimonialsUkr();
				$results = $this->model_catalog_testimonial->getTestimonialsUkr(0, $setting['testimonial_limit'], (isset($setting['testimonial_random']))?true:false);
			} elseif ($this->session->data['language']=='en') {
				$this->data['total'] = $this->model_catalog_testimonial->getTotalTestimonialsEng();
				$results = $this->model_catalog_testimonial->getTestimonialsEng(0, $setting['testimonial_limit'], (isset($setting['testimonial_random']))?true:false);
			}


		$this->load->model('tool/image'); 

		foreach ($results as $result) {
			
			
			$result['description'] = '«'.trim($result['description']).'»';
			$result['description'] = str_replace('«<p>', '«', $result['description']);
			$result['description'] = str_replace('</p>»', '»', $result['description']);


			if (!isset($setting['testimonial_character_limit']))
				$setting['testimonial_character_limit'] = 0;

			if ($setting['testimonial_character_limit']>0)
			{
				$lim = $setting['testimonial_character_limit'];

				if (mb_strlen($result['description'],'UTF-8')>$lim) 
					$result['description'] = mb_substr($result['description'], 0, $lim-3, 'UTF-8'). ' ' .'<a href="'.$this->data['more']. $result['testimonial_id'] .'" title="'.$this->data['text_more2'].'">'. $this->data['text_more'] . '</a>';

			}


			if (mb_strlen($result['title'],'UTF-8')>200)
					$result['title'] = mb_substr($result['title'], 0, 17, 'UTF-8').'...';

			if (mb_strlen($result['name'],'UTF-8')>100)
					$result['name'] = mb_substr($result['name'], 0, 7, 'UTF-8').'...';

			if (mb_strlen($result['city'],'UTF-8')>10)
					$result['city'] = mb_substr($result['city'], 0, 7, 'UTF-8').'...';
			//var_dump($this->model_tool_image->resizenew($result['title'], 80, 80));
			$this->data['testimonials'][] = array(
				'id'			=> $result['testimonial_id'],											  
				'title'		=> $this->model_tool_image->resizenew($result['title'], 80, 80),
				'description'	=> strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')),
				'description2'	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 250).'...',
				'rating'		=> $result['rating'],
				'name'		=> $result['name'],
				'date_added'	=> $result['date_added'],
				'city'		=> $result['city']

			);
		}

		

		$this->id = 'testimonial';
		
		$this->language->load('common/header');
		$this->data['text_chitat'] = $this->language->get('text_chitat');
		$this->data['text_otz'] = $this->language->get('text_otz');
		$this->data['text_nam'] = $this->language->get('text_nam');

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/testimonial.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/module/testimonial.tpl';
		} else {
			$this->template = 'default/template/module/testimonial.tpl';
		}
		
		$this->render();
	}
}
?>