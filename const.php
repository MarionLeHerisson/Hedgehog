<?php

/* W I N D O W S   L O C A L   C O N F */
if($_SERVER['HTTP_HOST'] == 'localhost') {
    define('BASE_URL', 'http://localhost' . DIRECTORY_SEPARATOR . 'hedgehog' . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR);
    define('BASE_PATH', 'C:' . DIRECTORY_SEPARATOR . 'wamp64' . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR .
        'hedgehog' . DIRECTORY_SEPARATOR);
    define('HOSTNAME', 'localhost');
    define('DBNAME', 'hedgehog');
    define('DBLOGIN', 'root');
    define('DBPWD', 'root');
    ini_set("display_errors", 1);
    define('DEBUG', 1);
}

/* P R O D U C T I O N   E N V */
else {
    require_once('prod_const.php');
}