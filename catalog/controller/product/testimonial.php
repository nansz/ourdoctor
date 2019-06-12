<?php 
class ControllerProducttestimonial extends Controller {
	
	private $error = array(); 

	protected function str_split_unicode($str, $l = 0) {
	    if ($l > 0) {
	        $ret = array();
	        $len = mb_strlen($str, "UTF-8");
	        for ($i = 0; $i < $len; $i += $l) {
	            $ret[] = mb_substr($str, $i, $l, "UTF-8");
	        }
	        return $ret;
	    }
	    return preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
	}
	
	public function index() {  
	
    	$this->language->load('product/testimonial');
		$this->language->load('product/isitestimonial');
		$this->load->model('catalog/testimonial');

		$this->data['breadcrumbs'] = array();

   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', '', 'SSL'),
      		'separator' => false
   		);
		
		if ($this->request->server['REQUEST_METHOD'] == 'POST' && $this->validate()) {
			
			$this->data['data']=array();
			$this->data['data']['name'] = strip_tags(html_entity_decode($this->request->post['name']));
			$this->data['data']['city'] = strip_tags(html_entity_decode($this->request->post['city']));
			$this->data['data']['rating'] = $this->request->post['rating'];				
			$this->data['data']['email'] = strip_tags(html_entity_decode($this->request->post['email']));
			//$this->data['data']['title'] = strip_tags(html_entity_decode($this->request->post['title'])); 

			/////////////////////////////////////////////////////////////////////////////////////////////
			
			
			$extensions = array('jpeg', 'jpg', 'png', 'gif');
			$max_size = 10000000;
			$path = 'files/';
			$response = '';
				if ($_FILES['file']['size'] > $max_size) {
					$response = 'Файл слишком большой';
				}
				else
				{
					$ext = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
					
				if (in_array($ext, $extensions))
				{
							$path = $path . uniqid() . '.' . $ext;
							$filetobd = $path;
			 
				  if (move_uploaded_file($_FILES['file']['tmp_name'], $path))
				  {
					$response = "";
					//if (mail($to, "Загружено новое ТЗ на SantanStudio", "Имя: ".$data['name']."\nEmail: ".$data['email']."\n\nФайл: http://the7.santanstudio.top/$filetobd", $headers)) {
						echo "Файл: http://mdc-lux.santanstudio.top/".$filetobd;
					//}
					//else echo "Ошибка отправки!";
				  }
				}
				else
				{
				  $response = 'Допустимы только файлы форматов jpeg, jpg, png, gif!';
				}
			  }
			  echo $response;
			
			if($filetobd) {
				$this->data['data']['title'] = $filetobd; 
			}
			
			/////////////////////////////////////////////////////////////////////////////////////////////
			
			$this->data['data']['description'] = strip_tags(html_entity_decode($this->request->post['description']));

			//var_dump($this->request->post['description']);
			
			$descriptions = explode(" ", $this->data['data']['description']);
			$size = count($descriptions);
			for($i=0; $i<$size; $i++)
			{ 
				$w_arr = $this->str_split_unicode($descriptions[$i],14);
				$descriptions[$i] = implode(" ",$w_arr);

			}
			$this->data['data']['description'] = implode(" ",$descriptions);
			
			if($response=="Допустимы только файлы форматов jpeg, jpg, png, gif!") {
				$this->redirect($this->url->link('product/testimonial', 'response='.$response, 'SSL'));
				//echo $response;
			}
			else {
			
			if ($this->config->get('testimonial_admin_approved')=='')
				$this->model_catalog_testimonial->addTestimonial($this->data['data'], 1);
			else
				$this->model_catalog_testimonial->addTestimonial($this->data['data'], 0);

			$this->session->data['success'] = $this->language->get('text_add');
			
			
			// send email
			if ($this->config->get('testimonial_send_to_admin')!='')
			{
				$store_name = $this->config->get('config_name');
	
				$subject = "Пользователь ".$this->data['data']['name']." оставил отзыв о ".$store_name."";
	
				$message  = '<html>Текст отзыва:<br>';
				
								
				$message .= $this->data['data']['description']. "<br>";
	
	
				$message .= "</html>";
	
				$email = $this->data['data']['email'];
				if ($email == "") $email = "empty";


				$sender = $this->data['data']['name'];
				if ($sender == "") $sender = "empty";
				

				$mail = new Mail();
				$mail->protocol = $this->config->get('config_mail_protocol');
				$mail->parameter = $this->config->get('config_mail_parameter');
				$mail->hostname = $this->config->get('config_smtp_host');
				$mail->username = $this->config->get('config_smtp_username');
				$mail->password = $this->config->get('config_smtp_password');
				$mail->port = $this->config->get('config_smtp_port');
				$mail->timeout = $this->config->get('config_smtp_timeout');
				$mail->setFrom($email);
				$mail->setTo($this->config->get('config_email'));
				$mail->setSender($sender);
				$mail->setSubject($subject);
				$mail->setHtml(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
				$mail->send();
			}
			

			$this->redirect($this->url->link('product/isitestimonial/success', '', 'SSL'));
			}
			
		}
		$this->data['entry_title'] = $this->language->get('entry_title');
	
	    	$this->data['entry_name'] = $this->language->get('entry_name');
	    	$this->data['entry_city'] = $this->language->get('entry_city');
	    	$this->data['entry_email'] = $this->language->get('entry_email');
	    	$this->data['entry_enquiry'] = $this->language->get('entry_enquiry');
		$this->data['entry_captcha'] = $this->language->get('entry_captcha');
		$this->data['entry_rating'] = $this->language->get('entry_rating');
		$this->data['entry_good'] = $this->language->get('entry_good');
		$this->data['entry_bad'] = $this->language->get('entry_bad');
		$this->data['text_note'] = $this->language->get('text_note');
		$this->data['text_conditions'] = $this->language->get('text_conditions');
		

		if (isset($this->error['name'])) {
    		$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = '';
		}
		if (isset($this->error['title'])) {
    		$this->data['error_title'] = $this->error['title'];
		} else {
			$this->data['error_title'] = '';
		}
		
		if (isset($this->error['email'])) {
			$this->data['error_email'] = $this->error['email'];
		} else {
			$this->data['error_email'] = '';
		}		
			
		if (isset($this->error['enquiry'])) {
			$this->data['error_enquiry'] = $this->error['enquiry'];
		} else {
			$this->data['error_enquiry'] = '';
		}		
		
 		if (isset($this->error['captcha'])) {
			$this->data['error_captcha'] = $this->error['captcha'];
		} else {
			$this->data['error_captcha'] = '';
		}	

    		$this->data['button_continue'] = $this->language->get('button_continue');
    
    		$this->data['action'] = $this->url->link('product/testimonial', '', 'SSL');

		if (isset($this->request->post['name'])) {
			$this->data['name'] = $this->request->post['name'];
		} else {
			$this->data['name'] = '';
		}
		if (isset($this->request->post['city'])) {
			$this->data['city'] = $this->request->post['city'];
		} else {
			$this->data['city'] = '';
		}

		if (isset($this->request->post['email'])) {
			$this->data['email'] = $this->request->post['email'];
		} else {
			$this->data['email'] = '';
		}
		if (isset($this->request->post['title'])) {
			$this->data['title'] = $this->request->post['title'];
		} else {
			$this->data['title'] = '';
		}
		if (isset($this->request->post['rating'])) {
			$this->data['rating'] = $this->request->post['rating'];
		} else {
			if ($this->config->get('testimonial_default_rating')=='')
				$this->data['rating'] = '3';
			else
				$this->data['rating'] = $this->config->get('testimonial_default_rating');

		}
		$this->data['button_send'] = $this->language->get('button_send');
		$this->data['show_all'] = $this->language->get('show_all');
		$this->data['showall_url'] = $this->url->link('product/testimonial', '', 'SSL');
		if (isset($this->request->post['description'])) {
			$this->data['description'] = $this->request->post['description'];
		} else {
			$this->data['description'] = '';
		}
		
		if (isset($this->request->post['captcha'])) {
			$this->data['captcha'] = $this->request->post['captcha'];
		} else {
			$this->data['captcha'] = '1';
		
		
		
		$testimonial_total = $this->model_catalog_testimonial->getTotalTestimonials();
			
		//if ($testimonial_total) {

	  		//$this->document->SetTitle ($this->language->get('heading_title'));
			if($this->session->data['language']=='ru') {
				$this->document->setTitle('Отзывы пациентов нашего центра | Медцентр - отзывы | МДЦ LUX');
				$this->document->setDescription('МДЦ LUX - медицинский  оздоровительный центр. Отзывы пациентов оздоровительного центра МДЦ LUX ✓ Отзывы медицинский центр в Харькове ➾ Медцентр отзывы можно оставлять здесь ➾');
			}
			else {
				$this->document->setTitle('Відгуки пацієнтів нашого центру | Медичний центр - відгуки | МДЦ LUX');
				$this->document->setDescription('МДЦ LUX - медичний оздоровчий центр. Відгуки пацієнтів оздоровчого центру МДЦ LUX ✓ Відгуки медичний центр в Харкові ➾ Медичний центр відгуки можна залишати тут ➾');
			}
			

	   		$this->data['breadcrumbs'][] = array(
	       		'text'      => $this->language->get('heading_title'),
				'href'      => $this->url->link('product/testimonial', '', 'SSL'),
	      		'separator' => $this->language->get('text_separator')
	   		);

						
      		$this->data['heading_title'] = $this->language->get('heading_title');
      		$this->data['text_auteur'] = $this->language->get('text_auteur');
      		$this->data['text_city'] = $this->language->get('text_city');
      		$this->data['button_continue'] = $this->language->get('button_continue');
      		$this->data['showall'] = $this->language->get('text_showall');
      		$this->data['write'] = $this->language->get('text_write');
      		$this->data['text_average'] = $this->language->get('text_average');
      		$this->data['text_stars'] = $this->language->get('text_stars');
      		$this->data['text_no_rating'] = $this->language->get('text_no_rating');
			
			$this->data['continue'] = $this->url->link('common/home', '', 'SSL');

			$this->page_limit = $this->config->get('testimonial_all_page_limit');
			
			if (isset($this->request->get['page'])) {
				$page = $this->request->get['page'];
			} else { 
				$page = 1;
			}	

			$this->data['testimonials'] = array();
			
			if ( isset($this->request->get['testimonial_id']) ){
				$results = $this->model_catalog_testimonial->getTestimonial($this->request->get['testimonial_id']);
			}
			else{
				$results = $this->model_catalog_testimonial->getTestimonials(($page - 1) * $this->page_limit, $this->page_limit);
			}
			
			$this->load->model('tool/image'); 
			
			foreach ($results as $result) {
				if($this->session->data['language']=='ru' && $result['rus']=='1') {
					$this->data['testimonials'][] = array(
						'name'		=> $result['name'],
						'id'		=> $result['testimonial_id'],
						'title'    		=> $result['title'],
						'rating'		=> $result['rating'],
						'description'	=> $result['description'],
						'description2'	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')),0,250)."...",
						'city'		=> $result['city'],
						'date_added'	=> $result['date_added'] //$result['date_added']
					);
				}
				else if($this->session->data['language']=='ua' && $result['ukr']=='1') { 
					$this->data['testimonials'][] = array(
						'name'		=> $result['name'],
						'id'		=> $result['testimonial_id'],
						'title'    		=> $result['title'],
						'rating'		=> $result['rating'],
						'description'	=> $result['description'],
						'description2'	=> utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')),0,250)."...",
						'city'		=> $result['city'],
						'date_added'	=> $result['date_added'] //$result['date_added']
					);
				}
			}
			
			//var_dump($this->data['testimonials']);
			
			$url = '';
	
			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}
			
				$this->data['write_url'] = $this->url->link('product/isitestimonial', '', 'SSL'); 	
			
			if ( isset($this->request->get['testimonial_id']) ){
				$this->data['showall_url'] = $this->url->link('product/testimonial', '', 'SSL'); 	
			}
			else{
				$pagination = new Pagination();
				$pagination->total = $testimonial_total;
				$pagination->page = $page;
				$pagination->limit = $this->page_limit; 
				$pagination->text = $this->language->get('text_pagination');
				$pagination->url = $this->url->link('product/testimonial', '&page={page}', 'SSL');
				$this->data['pagination'] = $pagination->render();				

			}


			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/product/testimonial.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/product/testimonial.tpl';
			} else {
				$this->template = 'default/template/product/testimonial.tpl';
			}
			
			$this->children = array(
				'common/column_left',
				'common/column_right',
				'common/content_top',
				'common/content_bottom',
				'common/footer',
				'common/header'
			);		
			
	  		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
/*
    	} else {

				
	  		$this->document->SetTitle ( $this->language->get('text_error'));
			
      		$this->data['heading_title'] = $this->language->get('text_error');

      		$this->data['text_error'] = $this->language->get('text_error');

      		$this->data['button_continue'] = $this->language->get('button_continue');

	    		$this->data['continue'] = $this->url->link('common/home', '', 'SSL');

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
		
	  		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
    	}
*/
  	}
	
	
	}
	
	
	
	public function success() {
		$this->language->load('product/isitestimonial');

		//$this->document->SetTitle($this->language->get('isi_testimonial')); 

	     	$this->data['breadcrumbs'] = array();

      	$this->data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', '', 'SSL'),
        		'separator' => false
      	);

      	$this->data['breadcrumbs'][] = array(
        		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('product/isitestimonial', '', 'SSL'),
        		'separator' => $this->language->get('text_separator')
      	);			
		
	    	$this->data['heading_title'] = $this->language->get('heading_title');
	
	    	$this->data['text_message'] = $this->language->get('text_message');
	
	    	$this->data['button_continue'] = $this->language->get('button_continue');
	
    		$this->data['continue'] = $this->url->link('common/home', '', 'SSL');
		
		
		
		

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/success.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/success.tpl';
		} else {
			$this->template = 'default/template/common/success.tpl';
		}


		$this->children = array(
			'common/column_left',
			'common/column_right',
			'common/content_top',
			'common/content_bottom',
			'common/footer',
			'common/header'		
		);
		
 		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression')); 
	}

	public function captcha() {
		$this->load->library('captcha');
		
		$captcha = new Captcha();
		
		$this->session->data['captcha'] = '1';
		
		$captcha->showImage();
	}
	
  	private function validate() {

	    	if ((strlen(utf8_decode($this->request->post['description'])) < 1) || (strlen(utf8_decode($this->request->post['description'])) > 99999)) {
	      		$this->error['enquiry'] = $this->language->get('error_enquiry');
	    	}
	
		
		if (!$this->error) {
	  		return TRUE;
		} else {
	  		return FALSE;
		}  	  
  	}
}
?>