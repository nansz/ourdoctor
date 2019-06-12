<?php  
class ControllerCommonFooter extends Controller {

    public $smtp_username = 'mdc@peretz.com.ua'; //Смените на адрес своего почтового ящика.
    public $smtp_port = '25'; // Порт работы.
    public $smtp_host =  'mail.adm.tools';  //сервер для отправки почты
    public $smtp_password = 'CvE04S47zRsb';   //Измените пароль
    public $smtp_debug = true;  //Если Вы хотите видеть сообщения ошибок, укажите true вместо false
    public $smtp_charset = 'utf-8';	//кодировка сообщений. (windows-1251 или utf-8, итд)
    public $smtp_from = 'Сообщение на сайте mdclux'; //Ваше имя - или имя Вашего сайта. Будет показывать при прочтении в поле "От кого"

    public $result_captcha;

    protected function index() {
		$this->language->load('common/footer');
		
		$this->data['text_information'] = $this->language->get('text_information');
		$this->data['text_service'] = $this->language->get('text_service');
		$this->data['text_extra'] = $this->language->get('text_extra');
		$this->data['text_contact'] = $this->language->get('text_contact');
		$this->data['text_return'] = $this->language->get('text_return');
    	$this->data['text_sitemap'] = $this->language->get('text_sitemap');
		$this->data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$this->data['text_voucher'] = $this->language->get('text_voucher');
		$this->data['text_affiliate'] = $this->language->get('text_affiliate');
		$this->data['text_special'] = $this->language->get('text_special');
		$this->data['text_account'] = $this->language->get('text_account');
		$this->data['text_order'] = $this->language->get('text_order');
		$this->data['text_wishlist'] = $this->language->get('text_wishlist');
		$this->data['text_newsletter'] = $this->language->get('text_newsletter');
		
		$this->load->model('catalog/information');
		
		$this->data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$this->data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
    	}

        $new=new cache;
//        $new->get(1);
//
//
////
////        $new->cache_content();
////
////        var_dump($new->cache_content());
        if($this->session->data['captchaz']==null ){
            $this->data['captchaz'] =0;
            $new->set('test','true');

        }else{
            $this->data['captchaz'] =$this->session->data['captchaz'];
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
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id'])
				);
			}
		}


        $this->data['contact'] = $this->url->link('information/contact');
		$this->data['return'] = $this->url->link('account/return/insert', '', 'SSL');
    	$this->data['sitemap'] = $this->url->link('information/sitemap');
		$this->data['manufacturer'] = $this->url->link('product/manufacturer');
		$this->data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$this->data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$this->data['special'] = $this->url->link('product/special');
		$this->data['account'] = $this->url->link('account/account', '', 'SSL');
		$this->data['order'] = $this->url->link('account/order', '', 'SSL');
		$this->data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$this->data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');		

		$this->data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));
		
		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');
	
			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];	
			} else {
				$ip = ''; 
			}
			
			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];	
			} else {
				$url = '';
			}
			
			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];	
			} else {
				$referer = '';
			}
						
			$this->model_tool_online->whosonline($ip, $this->customer->getId(), $url, $referer);
		}	

		$this->language->load('common/header');
		
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
		$this->data['text_podrobnee'] = $this->language->get('text_podrobnee');
		$this->data['text_spec'] = $this->language->get('text_spec');
		$this->data['text_tom'] = $this->language->get('text_tom');
		$this->data['text_ort'] = $this->language->get('text_ort');
		$this->data['text_last'] = $this->language->get('text_last');
		$this->data['text_first'] = $this->language->get('text_first');

        $this->data['random_value1']=rand(1,7);
        $this->data['random_value2']=rand(1,7);

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/footer.tpl';
		} else {
			$this->template = 'default/template/common/footer.tpl';
		}
		
		$this->render();
	}
	
	public function send_sq() {
		
		$data = array();
		$data = $_POST;
		
		$this->load->model('catalog/sq');
		
		if ($data['phone']!='' && $data['name']!='') {
			$this->model_catalog_sq->addSq($data);
			
			$to=$this->config->get('config_email');

			$headers = "Content-type: text/plain; charset=UTF-8\r\n";
			$headers .= "From: mdcmailreg@mdclux.com.ua\r\n";


            $this->smtpmail('','mdcmailreg@mdclux.com.ua', "Новый заказ в один клик - ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\nТовар: ".$data['product']."\n", $headers);

//            mail($to, "Новый заказ в один клик - ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\nТовар: ".$data['product']."\n", $headers);
			
			echo "Успешно отправлено!";
		}
		else {
			echo "Заполните все поля!";
		}
	}
	
	public function captcha() {
		$this->load->library('captcha');
		
		$captcha = new Captcha();
		
		$this->session->data['captcha'] = $captcha->getCode();
		
		$captcha->showImage();
	}
	
	public function sendcall() {
		$data = array();
		$data = $_POST;

        $result_captcha  =$data['value1']+$data['value2'] ;
        if($data['captcha'] == $result_captcha ) {
//		if($data['captcha'] == $this->session->data['captcha']) {
			if ($data['phone']!='' && $data['name']!='') {
				$to=$this->config->get('config_email').",mdcmailreg@gmail.com";

				$headers = "Content-type: text/plain; charset=UTF-8\r\n";
				$headers .= "From: mdcmailreg@mdclux.com.ua\r\n";

                $this->smtpmail('','mdcmailreg@mdclux.com.ua', "Заказан обратный звонок на ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\n\n", $headers);


//                mail($to, "Заказан обратный звонок на ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\n\n", $headers);
				
				echo "Успешно отправлено!";
			}
			else {
				echo "Заполните все поля!";
			}
		}
		else {
			echo "Введите проверочный код";
		}
	}

	public function sendresume() {
		$data = array();
		$data = $_POST;
		$file = false;
		//$mailTo=$this->config->get('config_email').",mdcmailreg@gmail.com";
		$mailTo = "info@babystores.com.ua";
		$from = $data['email'];

		//$headers = "Content-type: text/plain; charset=UTF-8\r\n";
		//$headers .= "From: " . $data['email'] . "\r\n";
		$subject = "Отклик на вакансию c сайта http://www.mdclux.com.ua";
		$message = "Имя: ".$data['name']."\nТелефон: ".$data['telephone']."\n\n";

  // Если поле выбора вложения не пустое - закачиваем его на сервер 

  if (!empty($_FILES['mail_file']['tmp_name']))   {

    // Закачиваем файл 

    $path = $_FILES['mail_file']['name']; 

    if (copy($_FILES['mail_file']['tmp_name'], $path)) { $file = $path; }

  }


    // отправка письма c вложением
    $separator = "---"; // разделитель в письме
    // Заголовки для письма
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From: $from\nReply-To: $from\n"; // задаем от кого письмо
    $headers .= "Content-Type: multipart/mixed; boundary=\"$separator\""; // в заголовке указываем разделитель
    // если письмо с вложением
    if($file){
        $bodyMail = "--$separator\n"; // начало тела письма, выводим разделитель
        $bodyMail .= "Content-Type:text/html; charset=\"utf-8\"\n"; // кодировка письма
        $bodyMail .= "Content-Transfer-Encoding: 7bit\n\n"; // задаем конвертацию письма
        $bodyMail .= $message."\n"; // добавляем текст письма
        $bodyMail .= "--$separator\n";

        $fileRead = fopen($file, "r"); // открываем файл
        $contentFile = fread($fileRead, filesize($file)); // считываем его до конца
        fclose($fileRead); // закрываем файл
        $bodyMail .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode(basename($file))."?=\n"; 
        $bodyMail .= "Content-Transfer-Encoding: base64\n"; // кодировка файла
        $bodyMail .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file))."?=\n\n";
        $bodyMail .= chunk_split(base64_encode($contentFile))."\n"; // кодируем и прикрепляем файл
        $bodyMail .= "--".$separator ."--\n";
    // письмо без вложения
    }else{
        $bodyMail = $message;
    }
    $result = mail($mailTo, $subject, $bodyMail, $headers); // отправка письма
    header('Location: /thankyou/');

}

	
	public function contacts() {
		$data = array();
		$data = $_POST;

		if(isset($_POST['g-recaptcha-response']) && $_POST['g-recaptcha-response']) {
			$secret = '6Le2slgUAAAAAH1s4eyGDTofKSOVoCrqgB9wBDs_';
			$ip = $_SERVER['REMOTE_ADDR'];
			$response = $_POST['g-recaptcha-response'];
			$rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$ip");
			$arr = json_decode($rsp, TRUE);
			if($arr['success']){

			if ($data['feedback-name']!='' && $data['feedback-email']!='' && $data['feedback-text']!='') {
				$to=$this->config->get('config_email');

				$headers = "Content-type: text/plain; charset=UTF-8\r\n";
				$headers .= "From: mdcmailreg@mdclux.com.ua\r\n";

                $this->smtpmail('','mdcmailreg@mdclux.com.ua', "Новое сообщение на ".$this->config->get('config_name')."", "Имя: ".$data['feedback-name']."\nEmail: ".$data['feedback-email']."\nСообщение: ".$data['feedback-text']."\n", $headers);

//                mail($to, "Новое сообщение на ".$this->config->get('config_name')."", "Имя: ".$data['feedback-name']."\nEmail: ".$data['feedback-email']."\nСообщение: ".$data['feedback-text']."\n", $headers);
				
				echo "Успешно отправлено!";
			}
			else {
				echo "Заполните все поля!";
			}
		
		} 
		else {
			echo "Введите проверочный код";
		}
	} else {
			echo "Введите проверочный код";
	}
}

    public function smtpmail($to='', $mail_to, $subject, $message, $headers='') {
        //global $config;
        $SEND =	"Date: ".date("D, d M Y H:i:s") . " UT\r\n";
        $SEND .= 'Subject: =?'.$this->smtp_charset.'?B?'.base64_encode($subject)."=?=\r\n";
        if ($headers) $SEND .= $headers."\r\n\r\n";
        else
        {
            $SEND .= "Reply-To: ".$this->smtp_username."\r\n";
            $SEND .= "To: \"=?".$this->smtp_charset."?B?".base64_encode($to)."=?=\" <$mail_to>\r\n";
            $SEND .= "MIME-Version: 1.0\r\n";
            $SEND .= "Content-Type: text/html; charset=\"".$this->smtp_charset."\"\r\n";
            $SEND .= "Content-Transfer-Encoding: 8bit\r\n";
            $SEND .= "From: \"=?".$this->smtp_charset."?B?".base64_encode($this->smtp_from)."=?=\" <".$this->smtp_username.">\r\n";
            $SEND .= "X-Priority: 3\r\n\r\n";
        }
        $SEND .=  $message."\r\n";
        if( !$socket = fsockopen($this->smtp_host, $this->smtp_port, $errno, $errstr, 30) ) {
            if ($this->smtp_debug) echo $errno."<br>".$errstr;
            return false;
        }

        if (!$this->server_parse($socket, "220", __LINE__)) return false;

        fputs($socket, "HELO " . $this->smtp_host . "\r\n");
        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не могу отправить HELO!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "AUTH LOGIN\r\n");
        if (!$this->server_parse($socket, "334", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не могу найти ответ на запрос авторизаци.</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, base64_encode($this->smtp_username) . "\r\n");
        if (!$this->server_parse($socket, "334", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Логин авторизации не был принят сервером!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, base64_encode($this->smtp_password) . "\r\n");
        if (!$this->server_parse($socket, "235", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Пароль не был принят сервером как верный! Ошибка авторизации!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "MAIL FROM: <".$this->smtp_username.">\r\n");
        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не могу отправить комманду MAIL FROM: </p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "RCPT TO: <" . $mail_to . ">\r\n");

        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не могу отправить комманду RCPT TO: </p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "DATA\r\n");

        if (!$this->server_parse($socket, "354", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не могу отправить комманду DATA</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, $SEND."\r\n.\r\n");

        if (!$this->server_parse($socket, "250", __LINE__)) {
            if ($this->smtp_debug) echo '<p>Не смог отправить тело письма. Письмо не было отправленно!</p>';
            fclose($socket);
            return false;
        }
        fputs($socket, "QUIT\r\n");
        fclose($socket);
        return TRUE;
    }

    function server_parse($socket, $response, $line = __LINE__) {
        //global $config;
        $server_response=NULL;
        while (@substr($server_response, 3, 1) != ' ') {
            if (!($server_response = fgets($socket, 256))) {
                if ($this->smtp_debug) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
                return false;
            }
        }
        if (!(substr($server_response, 0, 3) == $response)) {
            if ($this->smtp_debug) echo "<p>Проблемы с отправкой почты!</p>$response<br>$line<br>";
            return false;
        }
        return true;
    }


    public function appointment() {


		$data = $_POST;
                if ( ($data['phone']!='' && $data['name']!='' &&  $data['accept']==1 &&  $data['date']!='' ) or ($data['email']!='' && $data['name']!='' &&  $data['accept']==1  &&  $data['date']!=''   ) ) {
//mdcmailreg@mdclux.com.ua
                    $this->smtpmail('','nnaannsszz@gamil.com', "Новая запись на прием на ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\nEmail: ".$data['email']."\nДата: ".$data['date']."\nУслуга: ".$data['services']);
				echo "Успешно отправлено!";

            }
			else {
				echo "Заполните все поля!";
			}
//		}

	}

    public function appointments() {


        $data = $_POST;
                if ( ($data['phone']!='' && $data['name']!='' &&  $data['accept']==1 &&  $data['date']!='' ) or ($data['email']!='' && $data['name']!='' &&  $data['accept']==1  &&  $data['date']!=''   ) ) {

                    $this->smtpmail('','nnaannsszz@gamil.com', "Новая запись на прием на ".$this->config->get('config_name')."", "Имя: ".$data['name']."\nТелефон: ".$data['phone']."\nEmail: ".$data['email']."\nДата: ".$data['date']);
                echo "Успешно отправлено!";
                }
            else {
                echo "Заполните все поля!";
            }

    }

	public function popuptext() {
		$data = $_POST['vars'];
		if($data=='dostavka') {
			echo html_entity_decode($this->config->get('config_dostavka'), ENT_QUOTES, 'UTF-8');
		}
		else if($data=='garantia') {
			echo html_entity_decode($this->config->get('config_garantija'), ENT_QUOTES, 'UTF-8');
		}
		else if($data=='oplata') {
			echo html_entity_decode($this->config->get('config_oplata'), ENT_QUOTES, 'UTF-8');
		}
	}

	public function checktest() {

	}

   public function   captchaz(){
     $this->session->data['captchaz']=1;
    }
}
?>