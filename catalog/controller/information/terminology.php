<?php

class ControllerInformationterminology extends Controller
{

    public function index()
    {

        $this->language->load('information/terminology');

        $this->load->model('catalog/terminology');

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href' => $this->url->link('common/home'),
            'text' => $this->language->get('text_home'),
            'separator' => false
        );


        if (isset($this->request->get['terminology_id'])) {
            $terminology_id = $this->request->get['terminology_id'];
        } else {
            $terminology_id = 0;
        }
        $this->load->model('tool/image');

        if (isset($this->request->get['path'])) {
            $url = '';

            if (isset($this->request->get['sort'])) {
                $url .= '&sort=' . $this->request->get['sort'];
            }

            if (isset($this->request->get['order'])) {
                $url .= '&order=' . $this->request->get['order'];
            }

            if (isset($this->request->get['limit'])) {
                $url .= '&limit=' . $this->request->get['limit'];
            }

            $path = '';

            $parts = explode('_', (string)$this->request->get['path']);

            $category_id = (int)array_pop($parts);

            foreach ($parts as $path_id) {
                if (!$path) {
                    $path = (int)$path_id;
                } else {
                    $path .= '_' . (int)$path_id;
                }



            }
        }
        $articles_info = $this->model_catalog_terminology->getArticlesStory($terminology_id);


        if ($articles_info) {
            $this->data['text_red'] = $this->language->get('text_red');
            if ($this->session->data['language'] == 'ua' && $articles_info['ukr'] == '0') {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /ua/terminology/");
                exit();
            }

            if ($this->session->data['language'] == 'en' && $articles_info['eng'] == '0') {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /en/terminology/");
                exit();
            }

            if ($this->session->data['language'] == 'ru' && $articles_info['rus'] == '0') {
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: /terminology/");
                exit();
            }

            $this->document->addStyle('catalog/view/theme/default/stylesheet/articles.css');
            $this->document->addStyle('catalog/view/javascript/jquery/colorbox/colorbox.css');

            $this->document->addScript('catalog/view/javascript/jquery/colorbox/jquery.colorbox-min.js');

            $this->data['breadcrumbs'][] = array(
                'href' => $this->url->link('information/terminology'),
                'text' => $this->language->get('heading_title'),
                'separator' => $this->language->get('text_separator')
            );

            $this->data['breadcrumbs'][] = array(
                'href' => $this->url->link('information/terminology', 'terminology_id=' . $this->request->get['terminology_id']),
                'text' => $articles_info['title'],
                'separator' => $this->language->get('text_separator')
            );


            if ($articles_info['meta_title']) {
                $this->document->setTitle($articles_info['meta_title']);
            } else {
                $this->document->setTitle($articles_info['title']);
            }
            $this->data['images'] = array();

            $this->data['article_related'] = array();
            $this->data['article_related_id'] = array();
            $results = $this->model_catalog_terminology->getProductImages($this->request->get['terminology_id']);
            foreach ($results as $result) {
                $this->data['images'][] = array(
                    'popup' => $this->model_tool_image->resize($result['image'], 500, 500),
                    'thumb' => $this->model_tool_image->resize($result['image'], 500, 500),
                );
            }

            $this->load->model('catalog/terminology');
            $staf_results = $this->model_catalog_terminology->getStaffStory($articles_info['author_id']);
             $this->data['staf_description']  = $staf_results['position'];
             $this->data['staf_name']  = $staf_results['title'];
             $this->data['staf_image'] =   $this->model_tool_image->resize($staf_results['image'], 138,138);
            $this->data['author_href'] = $staf_results['page_url'];
//            $this->url->link('information/staff', 'staff_id=' . $articles_info['author_id']);
            $results = $this->model_catalog_terminology->getArticlesRelated($this->request->get['terminology_id']);
//
                  $i=0;
            foreach ($results as $result) {
                	if($i<2){
                foreach ($result as $resultz) {
                    if ($resultz['image']) {
                        $image = $this->model_tool_image->resize($resultz['image'], 360,265);
                    } else {
                        $image = false;
                    }

                    $staf_results = $this->model_catalog_terminology->getStaffStory($articles_info['author_id']);
                    $staf_description = $staf_results['position'];
                    $staf_title = $staf_results['title'];
                    $this->data['article_related'][] = array(
                        'terminology_id' => $resultz['terminology_id'],
                        'thumb' => $image,
                        'name' => $resultz['title'],
                        'author' => $staf_results['title'],
//                        'author_href' => $this->url->link('information/staff', 'author_id=' . $resultz['author_id']),
                        'description' =>  utf8_substr(strip_tags(html_entity_decode($resultz['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                        'staf_description' => $staf_description,
                        'staf_title' => $staf_title,
                        'href' => $this->url->link('information/terminology', 'terminology_id=' . $resultz['terminology_id'])
                    );
                }
                        $i++;
                    }
            }

            $this->document->setDescription($articles_info['meta_description']);
            $this->document->setKeywords($articles_info['meta_keyword']);
            $this->document->addLink($this->url->link('information/terminology', 'terminology_id=' . $this->request->get['terminology_id']), 'canonical');

            $this->data['articles_info'] = $articles_info;

            $this->data['heading_title'] = $articles_info['title'];
            $this->data['date_added'] = $articles_info['date_added'];

            $this->data['description'] = html_entity_decode($articles_info['description']);
            $this->data['description2'] = html_entity_decode($articles_info['description2']);
            $this->data['description3'] = html_entity_decode($articles_info['description3']);
            $this->data['hrefwebsite'] = html_entity_decode($articles_info['hrefwebsite']);


            $this->data['meta_keyword'] = html_entity_decode($articles_info['meta_keyword']);

            $this->data['viewed'] = sprintf($this->language->get('text_viewed'), $articles_info['viewed']);

            $this->data['addthis'] = $this->config->get('articles_articlespage_addthis');

            $this->data['min_height'] = $this->config->get('articles_thumb_height');

            $this->load->model('tool/image');

            if ($articles_info['image']) {
                $this->data['image'] = TRUE;
            } else {
                $this->data['image'] = FALSE;
            }

            $this->data['thumb'] = $this->model_tool_image->resize($articles_info['image'], 755,755);
//            $this->config->get('articles_thumb_width'), $this->config->get('articles_thumb_height'));
            $this->data['popup'] = $this->model_tool_image->resize($articles_info['image'],755,755);
//            $this->config->get('articles_popup_width'), $this->config->get('articles_popup_height'));

            $this->data['button_articles'] = $this->language->get('button_articles');
            $this->data['button_continue'] = $this->language->get('button_continue');

            $this->data['articles'] = $this->url->link('information/terminology');
            $this->data['continue'] = $this->url->link('common/home');

            if (isset($_SERVER['HTTP_REFERER'])) {
                $this->data['referred'] = $_SERVER['HTTP_REFERER'];
            } else {
                $this->data['referred'] = "";
            }
            $this->data['refreshed'] = 'http://' . $_SERVER['HTTP_HOST'] . '' . $_SERVER['REQUEST_URI'];

            if ($this->data['referred'] != $this->data['refreshed']) {
                $this->model_catalog_terminology->updateViewed($this->request->get['terminology_id']);
            }

            if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/terminology.tpl')) {
                $this->template = $this->config->get('config_template') . '/template/information/terminology.tpl';
            } else {
                $this->template = 'default/template/information/terminology.tpl';
            }

            $this->children = array(
                'common/column_left',
                'common/column_right',
                'common/content_top',
                'common/content_bottom',
                'information/minileftcolumn',
                'information/lastaddarticles',
                'information/search',

                'common/footer',
                'common/header'

            );

            $this->response->setOutput($this->render());

        } else {


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
                //$limit = $this->config->get('config_catalog_limit');
                //$limit = 5;
            }
            $limit = 10;
            $data = array(
                'start' => ($page - 1) * $limit,
                'limit' => $limit
            );


            if ($this->session->data['language'] == 'ru') {
                $articles_data = $this->model_catalog_terminology->getArticlesRus($data);
                $articles_total = $this->model_catalog_terminology->getTotalArticlesRus();
            } elseif ($this->session->data['language'] == 'ua') {
                $articles_data = $this->model_catalog_terminology->getArticlesUkr($data);
                $articles_total = $this->model_catalog_terminology->getTotalArticlesUkr();
            } elseif ($this->session->data['language'] == 'en') {
                $articles_data = $this->model_catalog_terminology->getArticlesEng($data);
                $articles_total = $this->model_catalog_terminology->getTotalArticlesEng();
            }


            if ($articles_data) {

                $this->document->setTitle(translatereturn("Словарь медицинских терминов | МДЦ-LUX", "Словник медичних термінів | МДЦ-LUX", ""));
                $this->document->setDescription(translatereturn("Медицинская терминология - словарь медицинских терминов", "Медична термінологія - словник медичних термінів", ""));


                $this->data['breadcrumbs'][] = array(
                    'href' => $this->url->link('information/terminology'),
                    'text' => $this->language->get('heading_title'),
                    'separator' => $this->language->get('text_separator')
                );

                $this->data['heading_title'] = $this->language->get('heading_title');

                $this->document->addStyle('catalog/view/javascript/jquery/panels/main.css');
                $this->document->addScript('catalog/view/javascript/jquery/panels/utils.js');

                $this->data['text_more'] = $this->language->get('text_more');
                $this->data['text_posted'] = $this->language->get('text_posted');

                $chars = $this->config->get('articles_headline_chars');

                $i = 1;
                foreach ($articles_data as $result) {
                    $this->data['articles_data'][] = array(
                        'id' => $result['terminology_id'],
                        'title' => $result['title'],
                        'author' => $result['author'],
                        'image' => $this->model_tool_image->resize($result['image'], 350, 256),
                        'description' =>  utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 300) . '..',
                        'href' => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id']),
                        'posted' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
                    );

                    $i++;
                }

                /*I created a new file with pagination. I changed the styles in it to the ones we need. And added it to the inclusion of startup.php*/
                /*создал новый файл с пагинацией поменял в нем стили на те что нам надо. И добавил ее во включение startup.php*/
                $pagination = new Paginationz();
                $pagination->total = $articles_total;
                $pagination->page = $page;
                $pagination->limit = $limit;
                $pagination->text = $this->language->get('text_pagination');
                $pagination->url = $this->url->link('information/terminology', '&page={page}');

                $this->data['sort'] = $sort;
                $this->data['order'] = $order;
                $this->data['limit'] = $limit;

                $this->data['continue'] = $this->url->link('common/home');
                    $this->data['pagination'] = $pagination->render();

                $this->data['button_continue'] = $this->language->get('button_continue');

                $this->data['continue'] = $this->url->link('common/home');

                if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/terminology.tpl')) {
                    $this->template = $this->config->get('config_template') . '/template/information/terminology.tpl';
                } else {
                    $this->template = 'default/template/information/terminology.tpl';
                }

                $this->children = array(
                    'common/column_left',
                    'common/column_right',
                    'common/content_top',
                    'common/content_bottom',
                    'information/minileftcolumn',
                    'information/lastaddarticles',
                    'information/search',

                    'common/footer',
                    'common/header'

                );

                $this->response->setOutput($this->render());

            } else {

                $this->document->setTitle($this->language->get('text_error'));

                $this->document->breadcrumbs[] = array(
                    'href' => $this->url->link('information/terminology'),
                    'text' => $this->language->get('text_error'),
                    'separator' => $this->language->get('text_separator')
                );

                $this->data['heading_title'] = $this->language->get('text_error');

                $this->data['text_error'] = $this->language->get('text_error');

                $this->data['button_continue'] = $this->language->get('button_continue');

                $this->data['continue'] = $this->url->link('common/home');

                if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/error/pagenotfound.tpl')) {
                    $this->template = $this->config->get('config_template') . '/template/error/pagenotfound.tpl';
                } else {
                    $this->template = 'default/template/error/pagenotfound.tpl';
                }

                $this->children = array(
                    'common/column_left',
                    'common/column_right',
                    'common/content_top',
                    'common/content_bottom',
                    'information/minileftcolumn',
                    'information/lastaddarticles',
                    'information/search',

                    'common/footer',
                    'common/header'

                );

                $this->response->setOutput($this->render());
            }
        }
    }
}

?>
