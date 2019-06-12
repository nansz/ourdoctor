<?php
class ModelCatalogSearchSuggestion extends Model{public function getProducts($a5a4678b3c2d1099ce723e87c6585cd65=array()){$this->load->model('catalog/product');$a3bce14751cea0334cf66be58cbef451c=$this->config->get('search_suggestion_options');if(!$a3bce14751cea0334cf66be58cbef451c){$a3bce14751cea0334cf66be58cbef451c=array();}$a106bdc757a8681fa7a0569c9b2524dba=isset($a3bce14751cea0334cf66be58cbef451c['search_logic'])?$a3bce14751cea0334cf66be58cbef451c['search_logic']:'and';if($this->customer->isLogged()){$ae9b62183c4505b59ca7f5fca7bc8b6ef=$this->customer->getCustomerGroupId();}else{$ae9b62183c4505b59ca7f5fca7bc8b6ef=$this->config->get('config_customer_group_id');}$adf5534e4eb56e990a60c6fc0bcd9105f=array();if(isset($a3bce14751cea0334cf66be58cbef451c['search_cache'])){$a83d7e9185ca4dbd071c5b5cb5041ef1d=md5(http_build_query($a5a4678b3c2d1099ce723e87c6585cd65+$a3bce14751cea0334cf66be58cbef451c));$adf5534e4eb56e990a60c6fc0bcd9105f=$this->cache->get('product.'.(int)$this->config->get('config_language_id').'.'.(int)$this->config->get('config_store_id').'.'.(int)$ae9b62183c4505b59ca7f5fca7bc8b6ef.'.'.$a83d7e9185ca4dbd071c5b5cb5041ef1d);}if(!$adf5534e4eb56e990a60c6fc0bcd9105f){$a939419ee4fdc86ee11a030498c5c8042="SELECT p.product_id, (SELECT AVG(rating) AS total FROM ".DB_PREFIX."review r1 WHERE r1.product_id = p.product_id AND r1.status = '1' GROUP BY r1.product_id) AS rating FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id = pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id = p2s.product_id)";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id'])){$a939419ee4fdc86ee11a030498c5c8042.=" LEFT JOIN ".DB_PREFIX."product_to_category p2c ON (p.product_id = p2c.product_id)";}$a939419ee4fdc86ee11a030498c5c8042.=" WHERE pd.language_id = '".(int)$this->config->get('config_language_id')."' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '".(int)$this->config->get('config_store_id')."'";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$a939419ee4fdc86ee11a030498c5c8042.=" AND (";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_description'])){$af6ac711c90728b9167eb41b25c0ec72e[]="(LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%' OR LCASE(pd.description) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%')";}else{$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" ".$a106bdc757a8681fa7a0569c9b2524dba." ",$af6ac711c90728b9167eb41b25c0ec72e)."";}}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(pd.tag) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}if((!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag']))&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(p.model) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}if((!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model']))&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(p.sku) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}$a939419ee4fdc86ee11a030498c5c8042.=")";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id'])){if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sub_category'])){$a5c6a4fe617ce9ba2253898737c90bbaa=array();$a5c6a4fe617ce9ba2253898737c90bbaa[]="p2c.category_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']."'";$this->load->model('catalog/category');$ad2e013bdb95bb92a5742d73ac6447aa6=$this->model_catalog_category->getCategoriesByParentId($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']);foreach($ad2e013bdb95bb92a5742d73ac6447aa6 as $afe8658579dbfc414072981a42f8f6ca5){$a5c6a4fe617ce9ba2253898737c90bbaa[]="p2c.category_id = '".(int)$afe8658579dbfc414072981a42f8f6ca5."'";}$a939419ee4fdc86ee11a030498c5c8042.=" AND (".implode(' OR ',$a5c6a4fe617ce9ba2253898737c90bbaa).")";}else{$a939419ee4fdc86ee11a030498c5c8042.=" AND p2c.category_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']."'";}}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_manufacturer_id'])){$a939419ee4fdc86ee11a030498c5c8042.=" AND p.manufacturer_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_manufacturer_id']."'";}$a939419ee4fdc86ee11a030498c5c8042.=" GROUP BY p.product_id";$a596716b352ef5990617b841c06f79dcc=array('pd.name','p.model','p.quantity','p.price','rating','p.sort_order','p.date_added');if(isset($a5a4678b3c2d1099ce723e87c6585cd65['sort'])&&in_array($a5a4678b3c2d1099ce723e87c6585cd65['sort'],$a596716b352ef5990617b841c06f79dcc)){if($a5a4678b3c2d1099ce723e87c6585cd65['sort']=='pd.name'||$a5a4678b3c2d1099ce723e87c6585cd65['sort']=='p.model'){$a939419ee4fdc86ee11a030498c5c8042.=" ORDER BY LCASE(".$a5a4678b3c2d1099ce723e87c6585cd65['sort'].")";}else{$a939419ee4fdc86ee11a030498c5c8042.=" ORDER BY ".$a5a4678b3c2d1099ce723e87c6585cd65['sort'];}}else{$a939419ee4fdc86ee11a030498c5c8042.=" ORDER BY p.sort_order";}if(isset($a5a4678b3c2d1099ce723e87c6585cd65['order'])&&($a5a4678b3c2d1099ce723e87c6585cd65['order']=='DESC')){$a939419ee4fdc86ee11a030498c5c8042.=" DESC, LCASE(pd.name) DESC";}else{$a939419ee4fdc86ee11a030498c5c8042.=" ASC, LCASE(pd.name) ASC";}if(isset($a5a4678b3c2d1099ce723e87c6585cd65['start'])||isset($a5a4678b3c2d1099ce723e87c6585cd65['limit'])){if($a5a4678b3c2d1099ce723e87c6585cd65['start']<0){$a5a4678b3c2d1099ce723e87c6585cd65['start']=0;}if($a5a4678b3c2d1099ce723e87c6585cd65['limit']<1){$a5a4678b3c2d1099ce723e87c6585cd65['limit']=20;}$a939419ee4fdc86ee11a030498c5c8042.=" LIMIT ".(int)$a5a4678b3c2d1099ce723e87c6585cd65['start'].",".(int)$a5a4678b3c2d1099ce723e87c6585cd65['limit'];}$adf5534e4eb56e990a60c6fc0bcd9105f=array();$a78d00cf7c3cff2ac21ac70efeea5d8f9=$this->db->query($a939419ee4fdc86ee11a030498c5c8042);foreach($a78d00cf7c3cff2ac21ac70efeea5d8f9->rows as $ab00b5b57b1a6e760e5cd8e383db5e154){$adf5534e4eb56e990a60c6fc0bcd9105f[$ab00b5b57b1a6e760e5cd8e383db5e154['product_id']]=$this->model_catalog_product->getProduct($ab00b5b57b1a6e760e5cd8e383db5e154['product_id']);}if(isset($a3bce14751cea0334cf66be58cbef451c['search_cache'])){$this->cache->set('product.'.(int)$this->config->get('config_language_id').'.'.(int)$this->config->get('config_store_id').'.'.(int)$ae9b62183c4505b59ca7f5fca7bc8b6ef.'.'.$a83d7e9185ca4dbd071c5b5cb5041ef1d,$adf5534e4eb56e990a60c6fc0bcd9105f);}}return $adf5534e4eb56e990a60c6fc0bcd9105f;}public function getTotalProducts($a5a4678b3c2d1099ce723e87c6585cd65=array()){$a3bce14751cea0334cf66be58cbef451c=$this->config->get('search_suggestion_options');if(!$a3bce14751cea0334cf66be58cbef451c){$a3bce14751cea0334cf66be58cbef451c=array();}$a106bdc757a8681fa7a0569c9b2524dba=isset($a3bce14751cea0334cf66be58cbef451c['search_logic'])?$a3bce14751cea0334cf66be58cbef451c['search_logic']:'and';$a939419ee4fdc86ee11a030498c5c8042="SELECT COUNT(DISTINCT p.product_id) AS total FROM ".DB_PREFIX."product p LEFT JOIN ".DB_PREFIX."product_description pd ON (p.product_id = pd.product_id) LEFT JOIN ".DB_PREFIX."product_to_store p2s ON (p.product_id = p2s.product_id)";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id'])){$a939419ee4fdc86ee11a030498c5c8042.=" LEFT JOIN ".DB_PREFIX."product_to_category p2c ON (p.product_id = p2c.product_id)";}$a939419ee4fdc86ee11a030498c5c8042.=" WHERE pd.language_id = '".(int)$this->config->get('config_language_id')."' AND p.status = '1' AND p.date_available <= NOW() AND p2s.store_id = '".(int)$this->config->get('config_store_id')."'";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$a939419ee4fdc86ee11a030498c5c8042.=" AND (";if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_description'])){$af6ac711c90728b9167eb41b25c0ec72e[]="(LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%' OR LCASE(pd.description) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%')";}else{$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(pd.name) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" ".$a106bdc757a8681fa7a0569c9b2524dba." ",$af6ac711c90728b9167eb41b25c0ec72e)."";}}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(pd.tag) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}if((!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag']))&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_model'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(p.model) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}if((!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_name'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_tag'])||!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_model']))&&!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$a939419ee4fdc86ee11a030498c5c8042.=" OR ";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])){$af6ac711c90728b9167eb41b25c0ec72e=array();$aba85454be2cb2971c1768629d95787b0=explode(' ',trim(preg_replace('/\s\s+/',' ',$a5a4678b3c2d1099ce723e87c6585cd65['filter_sku'])));foreach($aba85454be2cb2971c1768629d95787b0 as $a5af71bf3435163d49b14538886b9e25f){$af6ac711c90728b9167eb41b25c0ec72e[]="LCASE(p.sku) LIKE '%".$this->db->escape(utf8_strtolower($a5af71bf3435163d49b14538886b9e25f))."%'";}if($af6ac711c90728b9167eb41b25c0ec72e){$a939419ee4fdc86ee11a030498c5c8042.=" ".implode(" OR ",$af6ac711c90728b9167eb41b25c0ec72e)." ";}}$a939419ee4fdc86ee11a030498c5c8042.=")";}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id'])){if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_sub_category'])){$a5c6a4fe617ce9ba2253898737c90bbaa=array();$a5c6a4fe617ce9ba2253898737c90bbaa[]="p2c.category_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']."'";$this->load->model('catalog/category');$ad2e013bdb95bb92a5742d73ac6447aa6=$this->model_catalog_category->getCategoriesByParentId($a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']);foreach($ad2e013bdb95bb92a5742d73ac6447aa6 as $afe8658579dbfc414072981a42f8f6ca5){$a5c6a4fe617ce9ba2253898737c90bbaa[]="p2c.category_id = '".(int)$afe8658579dbfc414072981a42f8f6ca5."'";}$a939419ee4fdc86ee11a030498c5c8042.=" AND (".implode(' OR ',$a5c6a4fe617ce9ba2253898737c90bbaa).")";}else{$a939419ee4fdc86ee11a030498c5c8042.=" AND p2c.category_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_category_id']."'";}}if(!empty($a5a4678b3c2d1099ce723e87c6585cd65['filter_manufacturer_id'])){$a939419ee4fdc86ee11a030498c5c8042.=" AND p.manufacturer_id = '".(int)$a5a4678b3c2d1099ce723e87c6585cd65['filter_manufacturer_id']."'";}$a78d00cf7c3cff2ac21ac70efeea5d8f9=$this->db->query($a939419ee4fdc86ee11a030498c5c8042);return $a78d00cf7c3cff2ac21ac70efeea5d8f9->row['total'];}}
//author sv2109 (sv2109@gmail.com) license for 1 product copy granted for IgorKIV (kari@1c-astor.ru)
