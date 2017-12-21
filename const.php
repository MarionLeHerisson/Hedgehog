<?php

require_once(BASE_PATH . "library/utils.php");

define('BASE_URL',  Utils::getConfig('base_url'));
define('HOSTNAME',  Utils::getConfig('hostname'));
define('DBNAME',    Utils::getConfig('dbname'));
define('DBLOGIN',   Utils::getConfig('dblogin'));
define('DBPWD',     Utils::getConfig('dbpwd'));

define('DEBUG',     Utils::getConfig('debug'));
ini_set("display_errors", Utils::getConfig('display_errors'));

ini_set("upload_max_filesize", Utils::getConfig('upload_max_filesize'));
ini_set("upload_tmp_dir", BASE_PATH . 'tmp'); 	// Gives it the same rights as your project

define('NB_LAST', Utils::getConfig('nb_last'), 10);
