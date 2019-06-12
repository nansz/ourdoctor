<?php
$dir = $_SERVER['DOCUMENT_ROOT'];
$httpserver = $_SERVER['SERVER_NAME'];

// HTTP
define('HTTP_SERVER', 'http://mdcz.peretz.top/edit/');
define('HTTP_CATALOG', 'http://mdcz.peretz.top/');

// HTTPS
define('HTTPS_SERVER', 'http://mdcz.peretz.top/edit/');
define('HTTPS_CATALOG', 'http://mdcz.peretz.top/');

// DIR
define('DIR_APPLICATION', $dir.'/edit/');   
define('DIR_SYSTEM', $dir.'/system/');
define('DIR_DATABASE', $dir.'/system/database/');
define('DIR_LANGUAGE', $dir.'/edit/language/');
define('DIR_TEMPLATE', $dir.'/edit/view/template/');
define('DIR_CONFIG', $dir.'/system/config/');
define('DIR_IMAGE', $dir.'/image/');
define('DIR_CACHE', $dir.'/system/cache/');
define('DIR_DOWNLOAD', $dir.'/download/');
define('DIR_LOGS', $dir.'/system/logs/');
define('DIR_CATALOG', $dir.'/catalog/');

// DB

define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'primoc02.mysql.tools');
define('DB_USERNAME', 'primoc02_mdcz');
define('DB_PASSWORD', '8kj*cG_0H3');
define('DB_DATABASE', 'primoc02_mdcz');
define('DB_PREFIX', 'oc_');
?>