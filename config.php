<?php
//$dir ='/home/primoc02/peretz.top/mdc';
$dir = $_SERVER['DOCUMENT_ROOT'];

$httpserver = 'mdc.peretz.top';
//    $_SERVER['SERVER_NAME'];

// HTTP
define('HTTP_SERVER', 'http://mdcz.peretz.top/');

// HTTPS
define('HTTPS_SERVER', 'http://mdcz.peretz.top/');

// DIR
define('DIR_APPLICATION', $dir.'/catalog/');
define('DIR_SYSTEM', $dir.'/system/');
define('DIR_DATABASE', $dir.'/system/database/');
define('DIR_LANGUAGE', $dir.'/catalog/language/');
define('DIR_TEMPLATE', $dir.'/catalog/view/theme/');
define('DIR_CONFIG', $dir.'/system/config/');
define('DIR_IMAGE', $dir.'/image/');
define('DIR_IMAGENEW', $dir.'/');
define('DIR_CACHE', $dir.'/system/cache/');
define('DIR_DOWNLOAD', $dir.'/download/');
define('DIR_LOGS', $dir.'/system/logs/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'primoc02.mysql.tools');
define('DB_USERNAME', 'primoc02_mdcz');
define('DB_PASSWORD', '8kj*cG_0H3');
define('DB_DATABASE', 'primoc02_mdcz');
define('DB_PREFIX', 'oc_');


//define('DB_DRIVER', 'mysqli');
//define('DB_HOSTNAME', 'localhost');
//define('DB_USERNAME', 'primoc02_mdclux');
//define('DB_PASSWORD', '');
//define('DB_DATABASE', 'primoc02_mdclux');
//define('DB_PREFIX', 'oc_');
