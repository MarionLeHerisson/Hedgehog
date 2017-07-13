<?php
session_start();

require_once("../const.php");
require_once("../library/strings.php");

// Handle connection
if(isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = Strings::sanitizeString($_POST['login']);
    $pwd = md5($_POST['pwd']);

    require_once(BASE_PATH . 'Application/Model/usersModel.php');
    $usersManager = new UsersModel();

    $user = $usersManager->getUser($login, $pwd)->fetch(PDO::FETCH_ASSOC);
    if(!empty($user)) {
        $_SESSION['user_type'] = $user['user_type_id'];
        $_SESSION['login'] = $login;
    }
}

// get current page name
if(array_key_exists('REDIRECT_URL', $_SERVER)) {
    $exploded = explode('/', $_SERVER['REDIRECT_URL']);
    $len = sizeof($exploded) - 1;
    define('THISPAGE', $exploded[$len]);
}
else {
    define('THISPAGE', 'blog');
}

// include current page controller (if it exists)
if(file_exists(BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . THISPAGE . 'Controller.php')) {

    require_once(
        BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . THISPAGE . 'Controller.php');

    // Create instance and show index for this page
    $controllerName = THISPAGE . 'Controller';
    $controller = new $controllerName;
    $controller->indexAction();
}
// something we don't know
else {

    require_once(BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'errorController.php');
    $errorController = new errorController;
    $errorController->indexAction();
}

?>