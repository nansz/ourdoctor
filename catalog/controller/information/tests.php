<?php

class ControllerInformationTests extends Controller
{
    public function index()
    {
        /** Проверяем авторизованный пользователь или нет если нет перенаправляем его на страницу с авторизацией */
        if (!$this->customer->isLogged()) {
            $this->session->data['redirect'] = $this->url->link('account/account', '', 'SSL');

            $this->redirect($this->url->link('account/login', '', 'SSL'));
        }
        $this->language->load('information/test');
        $this->load->model('catalog/tests');
        $this->data['breadcrumbs'] = array();
        $this->data['breadcrumbs'][] = array(
            'href' => $this->url->link('common/home'),
            'text' => $this->language->get('text_home'),
            'separator' => false
        );
        /** проверяем есть в урле id теста*/
        if (isset($this->request->get['tests_id'])) {
            $test_id = $this->request->get['tests_id'];
        } else {
            $test_id = 0;
        }
           /** Запрос в бд по id теста */
        $articles_info = $this->model_catalog_tests->getArticlesStory($test_id);
        if ($articles_info) {
            $this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
            $this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');

            $this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');

            /** генерируем хлебные крошки */
            $this->data['breadcrumbs'][] = array(
                'href' => $this->url->link('information/test'),
                'text' => $this->language->get('heading_title'),
                'separator' => $this->language->get('text_separator')
            );
            /** генерируем хлебные крошки */
            $this->data['breadcrumbs'][] = array(
                'href' => $this->url->link('information/test', 'tests_id=' . $this->request->get['tests_id']),
                'text' => $articles_info['title'],
                'separator' => $this->language->get('text_separator')
            );


            /** Получаем данные тестов  */
            $results = $this->model_catalog_tests->gatTestTest($this->request->get['tests_id']);

            /** переобразуем данные теста в ассиативный массив */
            foreach ($results as $result) {
                $this->data['tests'][] = array(
                    'test_test_id' => $result['test_test_id'],
                    'tests_id' => $result['tests_id'],
                    'name' => $result['title'],
                    'value' => $result['value'],
                );
            }


            /** записуем текст в пересенные */
            $this->data['heading_title'] = $articles_info['title'];
            $this->data['articles_info'] = $articles_info['title'];


            $this->data['button_articles'] = $this->language->get('button_articles');
            $this->data['button_continue'] = $this->language->get('button_continue');


            $this->data['articles'] = $this->url->link('information/test');
            $this->data['continue'] = $this->url->link('common/home');

            /** указываем путь в какой файл загружать шани данные */
            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/test.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/information/test.tpl';
            } else {
                $this->template = 'default/template/information/test.tpl';
            }

            $this->children = array(
                'common/column_left',
                'common/column_right',
                'common/content_top',
                'common/content_bottom',
                'information/search',
                'common/footer',
                'common/header'

            );

            $this->response->setOutput($this->render());

        } else {
            /** проверить запрос на возможность фильтровать по странице лимиту, возрастанию или упадку */
            if (isset($this->request->get['page'])) {
                $page = $this->request->get['page'];
            } else {
                $page = 1;
            }
            if (isset($this->request->get['sort'])) {
                $sort = $this->request->get['sort'];
            } else {
                $sort = 'p.sort_order';
            }
            if (isset($this->request->get['order'])) {
                $order = $this->request->get['order'];
            } else {
                $order = 'ASC';
            }
            if (isset($this->request->get['limit'])) {
                $limit = $this->request->get['limit'];
            } else {
            }
            $limit = 10;
            $data = array(
                'start' => ($page - 1) * $limit,
                'limit' => $limit
            );
            /** Получить перечень всех тестов если мы не вместе */
            $articles_data = $this->model_catalog_tests->getArticles($data);
            if ($articles_data) {
                $this->data['breadcrumbs'][] = array(
                    'href' => $this->url->link('information/test'),
                    'text' => $this->language->get('heading_title'),
                    'separator' => $this->language->get('text_separator')
                );
                $this->data['heading_title'] = $this->language->get('heading_title');
                $this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
                $this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');
                /** обрабатываем данные всех тестов делаем поле id название и ссылку на него */
                foreach ($articles_data as $result) {
                    $this->data['articles_data'][] = array(
                        'id' => $result['test_id'],
                        'title' => $result['title'],
                        'href' => $this->url->link('information/tests', '&tests_id=' . $result['tests_id']),
                    );

                }
                $this->data['button_continue'] = $this->language->get('button_continue');
                $this->data['continue'] = $this->url->link('common/home');
                /** вывод на страницу */
                if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/test.tpl')) {
                    $this->template = $this->config->get('config_template') . '/template/information/test.tpl';
                } else {
                    $this->template = 'default/template/information/test.tpl';
                }
                $this->children = array(
                    'common/column_left',
                    'common/column_right',
                    'common/content_top',
                    'common/content_bottom',
                    'information/search',
                    'common/footer',
                    'common/header'

                );
                /** генерируем информациюю на страницу */
                $this->response->setOutput($this->render());
            } else {
                /** если ошибка при загрузки страницы отправляем на 404 */
                $this->document->setTitle($this->language->get('text_error'));
                $this->document->breadcrumbs[] = array(
                    'href' => $this->url->link('information/test'),
                    'text' => $this->language->get('text_error'),
                    'separator' => $this->language->get('text_separator')
                );
                $this->data['heading_title'] = $this->language->get('text_error');
                $this->data['text_error'] = $this->language->get('text_error');
                $this->data['button_continue'] = $this->language->get('button_continue');
                $this->data['continue'] = $this->url->link('common/home');
                $this->children = array(
                    'common/column_left',
                    'common/column_right',
                    'common/content_top',
                    'common/content_bottom',
                    'information/search',
                    'common/footer',
                    'common/header'

                );
                $this->response->setOutput($this->render());
            }
        }
    }

    public function checktest()
    {
       /** подключаем модель бд длятестов  */
        $this->load->model('catalog/tests');
        /** записываем данные в массив для дальнейшего использования */
        $data['value_1'] = $_POST['value_1'];
        $data['value_2'] = $_POST['value_2'];
        $data['value_3'] = $_POST['value_3'];
        $data['value_4'] = $_POST['value_4'];
        $data['value_5'] = $_POST['value_5'];
        $data['value_6'] = $_POST['value_6'];
        $data['value_7'] = $_POST['value_7'];
/** проверка на пустоту ответы */
        if ($_POST['value_1'] != 0 || $_POST['value_2'] != 0 || $_POST['value_3'] != 0 || $_POST['value_4'] != 0 || $_POST['value_5'] != 0 || $_POST['value_6'] != 0 || $_POST['value_7'] != 0)
           /** проверка если пользователь выбрал что нет его болезни */
            if ($data['value_7'] != 1) {
                /** находим максимальное значения для выявления болезни */
                $value = max($data);
                /** получаем ключ болезни*/
                $key = array_search($value, $data);
                /** делаем запрос по ключу в бд*/
                $articles_infoz = $this->model_catalog_tests->getDiseases($key);
                /** проверить пользователя на авторизованность */
                if ($this->customer->isLogged()) {
                    /** записуем в бд его болезнь*/
                    $this->model_catalog_tests->setCaseHistory($articles_infoz, $this->customer->getId());
                }
                /** обрабатываем его болезнь для вывода */
                foreach ($articles_infoz as $value) {
                    $json['title'] = "Ваша болезнь " . $value['title'] . "<br>";
                    $json['description'] = "Рекомендуемая лечение" . "<br>" . html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8');
                    if ($value['description2']) {
                        $json['description2'] = "Рекомендуемое лекарство " . "<br>" . html_entity_decode($value['description2'], ENT_QUOTES, 'UTF-8') . "<br>" . "<strong>" . "Внимание для получение более детального лечения  рекомендуем сходить к врачу " . "</strong>";
                    }
                    $messages_admin = PHP_EOL . PHP_EOL .
                        "Ваша болезнь " . $articles_infoz[0]['title'] . PHP_EOL;
                    if ($articles_infoz[0]['description2']) {
                        $messages_admin .= "Рекомендуемое средство для лечения : " . $articles_infoz[0]['description2'] . PHP_EOL;
                    }
                    $messages_admin .= "Способ лечения: " . $articles_infoz[0]['description'] . PHP_EOL;
                    /** отправляем сообщение на почту больному  */
                    $mail = new Mail();
                    $mail->protocol = $this->config->get('config_mail_protocol');
                    $mail->parameter = $this->config->get('config_mail_parameter');
                    $mail->hostname = $this->config->get('config_smtp_host');
                    $mail->username = $this->config->get('config_smtp_username');
                    $mail->password = $this->config->get('config_smtp_password');
                    $mail->port = $this->config->get('config_smtp_port');
                    $mail->timeout = $this->config->get('config_smtp_timeout');
                    $mail->setTo($this->customer->getEmail());
                    $mail->setFrom($this->config->get('config_email'));
                    $mail->setSender($this->config->get('config_email'));
                    $mail->setSubject("Письмо от личного врача ");
                    $mail->setText($messages_admin);
                    $mail->send();
                }
                /** получаем количество заболиваний */
                $total = $this->model_catalog_tests->getTotalCase_history();
                /** получаем количество данной болезни  */
                $count = $this->model_catalog_tests->getCountCase_history($articles_infoz[0]['diseases_id']);
                /** Считаем процент болеющих данной болезней */
                $json['prosent'] = "Процент людей заболевших найденной болезней равняется: " . ($total / 100) * $count . "%";
                $this->response->setOutput(json_encode($json));
            } else {
                /** выводим инфу если пользователь выбрал что нет его симптомы  и делаем все тоже самое что и выше */
                $value = max($data);
                $key = array_search($value, $data);
                $articles_infoz = $this->model_catalog_tests->getDiseases('value_7');
                if ($this->customer->isLogged()) {
                    $this->model_catalog_tests->setCaseHistory($articles_infoz, $this->customer->getId());
                }
                foreach ($articles_infoz as $value) {
                    $json['title'] = "Ваша болезнь " . $value['title'] . "<br>";
                    $json['description'] = "Рекомендуемая лечение" . "<br>" . html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8');
                    if ($value['description2']) {
                        $json['description2'] = "Рекомендуемое лекарство " . "<br>" . html_entity_decode($value['description2'], ENT_QUOTES, 'UTF-8') . "<br>" . "<strong>" . "Внимание для получение более детального лечения  рекомендуем сходить к врачу " . "</strong>";

                    }


                }
                $this->response->setOutput(json_encode($json));
            }


        else {
            /** выводим инфу если пользователь не выбрал симптомы и делаем все тоже самое что и выше */
            $value = max($data);
            $key = array_search($value, $data);
            $articles_infoz = $this->model_catalog_tests->getDiseases('value_7');
            if ($this->customer->isLogged()) {
                $this->model_catalog_tests->setCaseHistory($articles_infoz, $this->customer->getId());
            }
            foreach ($articles_infoz as $value) {

                $json['title'] = "Ваша болезнь " . $value['title'] . "<br>";
                $json['description'] = "Рекомендуемая лечение" . "<br>" . html_entity_decode($value['description'], ENT_QUOTES, 'UTF-8');

                if ($value['description2']) {
                    $json['description2'] = "Рекомендуемое лекарство " . "<br>" . html_entity_decode($value['description2'], ENT_QUOTES, 'UTF-8') . "<br>" . "<strong>" . "Внимание для получение более детального лечения  рекомендуем сходить к врачу " . "</strong>";

                }


            }

            $this->response->setOutput(json_encode($json));
        }
    }
}

?>
