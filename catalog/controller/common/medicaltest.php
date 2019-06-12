<?php

class ControllerCommonmedicaltest extends Controller
{

    public function index()
    {

        $this->language->load('information/announcement');

        $this->load->model('catalog/announcement');

        $this->data['breadcrumbs'] = array();

        $this->data['breadcrumbs'][] = array(
            'href' => $this->url->link('common/home'),
            'text' => $this->language->get('text_home'),
            'separator' => false
        );


        $this->load->model('tool/image');
        $this->data['text_red'] = $this->language->get('text_red');




                $this->document->setTitle(translatereturn("Заболевания и симптомы | МДЦ-LUX", "НЗахворювання і симптоми | МДЦ-LUX", ""));
                $this->document->setDescription(translatereturn("Перечень и подробное описание заболеваний, симптомов и методов лечения основных заболеваний от ведущих специалистов медицинского оздоровительного центра МДЦ LUX", "Перелік і докладний опис захворювань, симптомів та методів лікування основних захворювань від провідних фахівців медичного оздоровчого центру МДЦ LUX", ""));


                $this->data['breadcrumbs'][] = array(
                    'href' => $this->url->link('information/announcement'),
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




                $this->data['button_continue'] = $this->language->get('button_continue');

                $this->data['continue'] = $this->url->link('common/home');

                if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/medicaltest.tpl')) {
                    $this->template = $this->config->get('config_template') . '/template/common/medicaltest.tpl';
                } else {
                    $this->template = 'default/template/common/medicaltest.tpl';
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

?>
