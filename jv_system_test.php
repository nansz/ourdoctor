<?php

$version = "1.01";

if (isset($_GET['phpinfo'])) {
	phpinfo(); 
	exit;
}

/*
ini_set('display_errors', 1);
error_reporting(E_ALL);
*/

?>
<html>

  <head>

    <style>
    body, td
    {
      font-size:70%;
      font-family:verdana, helvetica, arial;
    }

    div.main
    {
      width:80%;
      text-align:left;
      top:20px;
      position:relative;
      border:2px solid #F0F0F0;
      padding:20px;
    }
    </style>

    <meta charset='utf-8'> 
    
    <title>
      JV System Test <?php echo $version; ?>
    </title>
    
  </head>

  <body>
    <div align="center">
      <div class="main">

        <center>
          <h2>JV System Test <?php echo $version; ?></h2>
        </center>

        <?php

        echo intro();
        echo "<br /><br />\n";
        ?>
        
        <h3><?php echo "Please configure your PHP settings to match requirements listed below"; ?></h3>
        <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 20px; width: 60%">
          <table width="100%">
            <tr>
              <th width="35%" align="left">
                <b>PHP Settings</b>
              </th>
              <th width="25%" align="left">
                <b>Current Settings</b>
              </th>
              <th width="25%" align="left">
                <b>Required Settings</b>
              </th>
              <th width="15%" align="center">
                <b>Status</b>
              </th>
            </tr>
            
            <tr>
              <?php 

                if ( (PHP_VERSION_ID >= 50300) && (PHP_VERSION_ID < 50400) )  {
                  $phpversion_str = '<font color="green">' . phpversion() . '</font>';
                  $status_phpversion_str = '<b><font color="green">Good</font></b>';
                } else {
                  $phpversion_str = '<font color="red">' . phpversion() . '</font>';
                  $status_phpversion_str = '<b><font color="red">Bad</font></b>';
                }
                
              ?>
              
              <td>
                PHP Version
              </td>
              
              <td>
                <?php echo $phpversion_str; ?>
              </td>
              
              <td>
                >= 5.3.x.x
              </td>
              <td align="center">
                <?php echo $status_phpversion_str; ?>
              </td>
            </tr>
          </table>
        </div>
        
        <h3><?php echo "Please make sure the extensions listed below are installed"; ?></h3>
        <div style="background: #F7F7F7; border: 1px solid #DDDDDD; padding: 10px; margin-bottom: 40px; width: 60%">
          <table width="100%">
            <tr>
              <th width="35%" align="left">
                <b>Extension</b>
              </th>
              <th width="25%" align="left">
                <b>Current Settings</b>
              </th>
              <th width="25%" align="left">
                <b>Required Settings</b>
              </th>
              <th width="15%" align="center">
                <b>Status</b>
              </th>
            </tr>
            
            <tr>
              <?php 
                
                $ioncube_loader_version = ioncube_loader_version_array();
                
                if ($ioncube_loader_version && ($ioncube_loader_version['major'] >= 4 && $ioncube_loader_version['minor'] >= 0)  ) {
                  $ioncube_version_str = '<font color="green">Installed, ver. ' . $ioncube_loader_version['version'] . '</font>';
                  $status_ioncube_str = '<b><font color="green">Good</font></b>';
                } else {
                  $ioncube_version_str = '<font color="red">Not Installed</font>';
                  $status_ioncube_str = '<b><font color="red">Bad</font></b>';
                }
                
              ?>
            
              <td>
                ionCube Loader
              </td>

              <td>
                <?php echo $ioncube_version_str; ?>
              </td>
              
              <td>
               >= 4.0.x
              </td>
              
              <td align="center">
                <?php echo $status_ioncube_str; ?>
              </td>
            </tr>
          </table>
        </div>
       
        
        <?php
        echo server_software();
        echo "<br /><br />\n";
        
        echo additional_info();
        echo "<br />\n";
        ?>
        
      </div>
    </div>
  </body>
</html>

<?php

function ic_system_info()
{
  $thread_safe = false;
  $debug_build = false;
  $cgi_cli = false;
  $php_ini_path = '';

  ob_start();
  phpinfo(INFO_GENERAL);
  $php_info = ob_get_contents();
  ob_end_clean();

  foreach (split("\n",$php_info) as $line) {
    if (eregi('command',$line)) {
      continue;
    }

    if (preg_match('/thread safety.*(enabled|yes)/Ui',$line)) {
      $thread_safe = true;
    }

    if (preg_match('/debug.*(enabled|yes)/Ui',$line)) {
      $debug_build = true;
    }

    if (eregi("configuration file.*(</B></td><TD ALIGN=\"left\">| => |v\">)([^ <]*)(.*</td.*)?",$line,$match)) {
      $php_ini_path = $match[2];

      //
      // If we can't access the php.ini file then we probably lost on the match
      //
      if (!@file_exists($php_ini_path)) {
        $php_ini_path = '';
      }
    }

    $cgi_cli = ((strpos(php_sapi_name(),'cgi') !== false) ||
		(strpos(php_sapi_name(),'cli') !== false));
  }

  return array(
    'THREAD_SAFE' => $thread_safe,
	  'DEBUG_BUILD' => $debug_build,
	  'PHP_INI'     => $php_ini_path,
	  'CGI_CLI'     => $cgi_cli
  );
}


function intro() {
	return "This script will check if JV Modules will work on your site.\n"
	.      "The results are displayed in <b><font color=\"green\">green</font></b> or <b><font color=\"red\">red</font></b> color.<br />\n"
	.      "If some of the results are <b><font color=\"red\">red</font></b> please follow the instructions and run this script again.\n<br /><br />"
  
  .      "Этот скрипт проверит, будут ли JV-модули работать на Вашем сайте.\n"
  .      "Результаты проверки отображаются на экране <b><font color=\"green\">зеленым</font></b> или <b><font color=\"red\">красным</font></b> цветом.<br />\n"
  .      "Если некоторые необходимые значения отображаются <b><font color=\"red\">красным цветом</font></b>, пожалуйста, <br />"
  .      "выполните необходимые действия для устранения сами или обратитесь в техподдержку хостинг-провайдера, а затем запустите скрипт снова.\n";
}

function server_software() {
	if (isset($_SERVER['SERVER_SOFTWARE'])) {
		$status = $_SERVER['SERVER_SOFTWARE'];
	} else if (($sf = getenv('SERVER_SOFTWARE'))) {
		$status = $sf;
	} else {
		$status = 'n/a';
	}

	$body = "<b>Server Software</b><br />\n"
	.       "<b>Status:</b> $status<br />\n";

	return $body;
}

function additional_info() {

	$php_version = phpversion() . " (" . php_sapi_name() . ")";
	$php_flavour = substr($php_version,0,3);
	$os_name = substr(php_uname(),0,strpos(php_uname(),' '));
	$os_code = strtolower(substr($os_name,0,3));
	$safe_mode = ini_get('safe_mode') ? 'Enabled' : 'Disabled';
	$enable_dl = ini_get('enable_dl') ? 'Enabled' : 'Disabled';
	$sys_info = ic_system_info();
	$cgi = $sys_info['CGI_CLI'] ? 'Yes' : 'No';
	$thread_safe = $sys_info['THREAD_SAFE'] ? 'Yes' : 'No';
	$server_name = $_SERVER['SERVER_NAME'];
	$server_ip = $_SERVER['SERVER_ADDR'];
	$resolved_ip = @gethostbyname($server_name);
	$path = getcwd();

	$body = "<b>Additional Information</b><br />\n"
	.       "<table cellpadding=1 cellspacing=1 border=0>\n"
	.       "<tr><td>PHP Version:</td><td>$php_version</td></tr>\n"
	.       "<tr><td>Operating System:</td><td>$os_name</td></tr>\n"
	.       "<tr><td>safe_mode:</td><td>$safe_mode</td></tr>\n"
	.       "<tr><td>enable_dl:</td><td>$enable_dl</td></tr>\n"
	.       "<tr><td>PHP as CGI:</td><td>$cgi</td></tr>\n"
	.       "<tr><td>Thread safety:</td><td>$thread_safe</td></tr>\n"
	.       "<tr><td>Server name:</td><td>$server_name</td></tr>\n"
	.       "<tr><td>Server IP:</td><td>$server_ip</td></tr>\n"
	.       "<tr><td>Resolved IP:</td><td>$resolved_ip</td></tr>\n"
	.       "<tr><td>Absolute path:</td><td>$path</td></tr>\n"
	.       "<tr><td>PHP info:</td><td><a href=\"".$_SERVER['PHP_SELF']."?phpinfo=1\" target=\"_blank\">Click here</a></td></tr>\n"
	.       "</table>\n";

	return $body;
}

function ioncube_loader_version_array () {
	if (extension_loaded("ionCube Loader")) {
  
    if ( function_exists('ioncube_loader_iversion') ) {
      // Mmmrr
      $ioncube_loader_iversion = ioncube_loader_iversion();
      $ioncube_loader_version_major = (int)substr($ioncube_loader_iversion,0,1);
      $ioncube_loader_version_minor = (int)substr($ioncube_loader_iversion,1,2);
      $ioncube_loader_version_revision = (int)substr($ioncube_loader_iversion,3,2);
      $ioncube_loader_version = "$ioncube_loader_version_major.$ioncube_loader_version_minor.$ioncube_loader_version_revision";
    }
    
    if ( function_exists('ioncube_loader_version') ) {
      $ioncube_loader_version = ioncube_loader_version();
      $ioncube_loader_version_major = (int)substr($ioncube_loader_version,0,1);
      $ioncube_loader_version_minor = (int)substr($ioncube_loader_version,2,1);
    }
    
    return array(
      'version'=>$ioncube_loader_version, 
      'major'=>$ioncube_loader_version_major, 
      'minor'=>$ioncube_loader_version_minor
    );
    
  } else {
    return false;
  } 
	
}

?>