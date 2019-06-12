



<?php

class ControllerInformationlastaddarticles extends Controller
{

    protected function index() {
        $this->load->model('design/layout');
        $this->load->model('catalog/category');
        $this->load->model('catalog/product');
        $this->load->model('catalog/information');

        if (isset($this->request->get['route'])) {
            $route = (string)$this->request->get['route'];
        } else {
            $route = 'common/home';
        }

        $layout_id = 0;

        if ($route == 'product/category' && isset($this->request->get['path'])) {
            $path = explode('_', (string)$this->request->get['path']);

            $layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
        }

        if ($route == 'product/product' && isset($this->request->get['product_id'])) {
            $layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
        }

        if ($route == 'information/information' && isset($this->request->get['information_id'])) {
            $layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
        }

        if (!$layout_id) {
            $layout_id = $this->model_design_layout->getLayout($route);
        }

        if (!$layout_id) {
            $layout_id = $this->config->get('config_layout_id');
        }

        $module_data = array();

        $this->load->model('setting/extension');

        $extensions = $this->model_setting_extension->getExtensions('module');

        foreach ($extensions as $extension) {
            $modules = $this->config->get($extension['code'] . '_module');

            if ($modules) {
                foreach ($modules as $module) {
                    if ($module['layout_id'] == $layout_id && $module['position'] == 'column_left' && $module['status']) {
                        $module_data[] = array(
                            'code'       => $extension['code'],
                            'setting'    => $module,
                            'sort_order' => $module['sort_order']
                        );
                    }
                }
            }
        }


        $this->data['products'] = array();
//        $this->load->model('catalog/category');
        $this->load->model('catalog/lastaddarticles');

        /*news */
        if($this->config->get('config_language_id') ==1){

            $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesru();
            foreach ($results_lastaddarticles_articles as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                );
            }

            $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsru();
            foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['diseasesandsymptoms_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
                );
            }

            $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesru();
            foreach ($results_lastaddarticles_medicalcases as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicalcases_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
                );
            }

            $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyru();
            foreach ($results_lastaddarticles_terminology as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['terminology_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
                );
            }

            $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsru();
            foreach ($results_lastaddarticles_medicinenews as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicinenews_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
                );
            }


            $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceru();
            foreach ($results_lastaddarticles_science as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['science_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
                );
            }

            $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralru();
            foreach ($results_lastaddarticles_general as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['general_id'],
                    'thumb'       => $image,

                    'date_added'        => $result['date_added'],
                    'name'        => $result['title'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
                );
            }
        } elseif($this->config->get('config_language_id') ==3){
            $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesen();
            foreach ($results_lastaddarticles_articles as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                );
            }

            $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsen();
            foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['diseasesandsymptoms_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
                );
            }

            $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesen();
            foreach ($results_lastaddarticles_medicalcases as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicalcases_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
                );
            }

            $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyen();
            foreach ($results_lastaddarticles_terminology as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['terminology_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
                );
            }

            $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsen();
            foreach ($results_lastaddarticles_medicinenews as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicinenews_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
                );
            }


            $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceen();
            foreach ($results_lastaddarticles_science as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['science_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
                );
            }

            $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralen();
            foreach ($results_lastaddarticles_general as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['general_id'],
                    'thumb'       => $image,

                    'date_added'        => $result['date_added'],
                    'name'        => $result['title'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
                );
            }
        }

        elseif($this->config->get('config_language_id') ==2){
            $results_lastaddarticles_articles = $this->model_catalog_lastaddarticles->getlastaddarticlesharticlesua();
            foreach ($results_lastaddarticles_articles as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['articles_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'articles_id=' . $result['articles_id'] )
                );
            }

            $results_lastaddarticles_Diseasesandsymptoms = $this->model_catalog_lastaddarticles->getlastaddarticlesdiseasesandsymptomsua();
            foreach ($results_lastaddarticles_Diseasesandsymptoms as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['diseasesandsymptoms_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/articles', 'diseasesandsymptoms_id=' . $result['diseasesandsymptoms_id'])
                );
            }

            $results_lastaddarticles_medicalcases = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicalcasesua();
            foreach ($results_lastaddarticles_medicalcases as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicalcases_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicalcases', 'medicalcases_id=' . $result['medicalcases_id'] )
                );
            }

            $results_lastaddarticles_terminology = $this->model_catalog_lastaddarticles->getlastaddarticlesterminologyua();
            foreach ($results_lastaddarticles_terminology as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['terminology_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/terminology', 'terminology_id=' . $result['terminology_id'] )
                );
            }

            $results_lastaddarticles_medicinenews = $this->model_catalog_lastaddarticles->getlastaddarticlesmedicinenewsua();
            foreach ($results_lastaddarticles_medicinenews as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['medicinenews_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/medicinenews', 'medicinenews_id=' . $result['medicinenews_id'] )
                );
            }


            $results_lastaddarticles_science = $this->model_catalog_lastaddarticles->getlastaddarticlesscienceua();
            foreach ($results_lastaddarticles_science as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['science_id'],
                    'thumb'       => $image,
                    'name'        => $result['title'],
                    'date_added'        => $result['date_added'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/science', 'science_id=' . $result['science_id'] )
                );
            }

            $results_lastaddarticles_general = $this->model_catalog_lastaddarticles->getlastaddarticlesgeneralua();
            foreach ($results_lastaddarticles_general as $result) {
                if ($result['image']) {
                    $image = $this->model_tool_image->resize($result['image'], 360,265);
                } else {
                    $image = false;
                }
                $this->data['products'][] = array(
                    'product_id'  => $result['general_id'],
                    'thumb'       => $image,

                    'date_added'        => $result['date_added'],
                    'name'        => $result['title'],
                    'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, 57) . '..',
                    'href'        => $this->url->link('information/general', 'general_id=' . $result['general_id'] )
                );
            }
        }


        $this->data['products']=$this->customMultiSort( $this->data['products'],'date_added');



        $sort_order = array();


        foreach ($module_data as $key => $value) {
            $sort_order[$key] = $value['sort_order'];
        }

        array_multisort($sort_order, SORT_ASC, $module_data);

        $this->data['modules'] = array();

        foreach ($module_data as $module) {
            $module = $this->getChild('module/' . $module['code'], $module['setting']);

            if ($module) {
                $this->data['modules'][] = $module;
            }
        }

        if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/information/lastaddarticles.tpl')) {
            $this->template = $this->config->get('config_template') . '/template/information/lastaddarticles.tpl';
        } else {
            $this->template = 'default/template/information/lastaddarticles.tpl';
        }

        $this->render();
    }

    /**
     * Сортируем многомерный массив по значению вложенного массива
     * @param $array array многомерный массив который сортируем
     * @param $field string название поля вложенного массива по которому необходимо отсортировать
     * @return array отсортированный многомерный массив
     */
    public function customMultiSort($array,$field) {
        $sortArr = array();


        // Получение списка столбцов
        foreach ($array as $key => $row) {
            $volume[$key]  = $row['date_added'];
//            $edition[$key] = $row['edition'];
        }

        $volume  = array_column($array, 'date_added');
//        $edition = array_column($data, 'edition');
//        foreach($array as $key=>$value){
//            $sortArr[$key] = $value[$field];
//
//        }
//        array_multisort($sortArr, SORT_DESC, SORT_NUMERIC ,
//            $array, SORT_NUMERIC, SORT_DESC);
//        array_multisort($sortArr, SORT_DESC, $array);
        array_multisort($volume, SORT_DESC,   $array);
//        rsort($array);
        return $array;
    }
}

?>
