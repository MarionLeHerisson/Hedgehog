<?php
session_start();

if($_SERVER['HTTP_HOST'] == 'localhost') {
    define('BASE_PATH', 'C:' . DIRECTORY_SEPARATOR . 'wamp64' . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR .
        'hedgehog' . DIRECTORY_SEPARATOR);
} else {
    define('BASE_PATH', '/home/marion/');
}

require_once(BASE_PATH . "const.php");
require_once(BASE_PATH . "library/strings.php");

// Handle connection
if(isset($_POST['login']) && isset($_POST['pwd'])) {
    $login = Strings::sanitizeString($_POST['login']);
    $pwd = md5($_POST['pwd']);

    require_once(BASE_PATH . 'Application/Model/UsersModel.php');
    $usersManager = new UsersModel();

    $user = $usersManager->getUser($login, $pwd)->fetch(PDO::FETCH_ASSOC);
    if(!empty($user)) {
        $_SESSION['user_type'] = $user['user_type_id'];
        $_SESSION['id']        = $user['id'];
        $_SESSION['login']     = $login;
    }
}

require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
$ArticlesModel = new ArticlesModel();

// get current page name
if(array_key_exists('REDIRECT_URL', $_SERVER)) {
    $exploded = explode('/', $_SERVER['REDIRECT_URL']);
    $len = sizeof($exploded) - 1;
    $page = $exploded[$len];

    if($page == '') {
        $article = $ArticlesModel->getLastArticle(3)->fetch(PDO::FETCH_ASSOC);
        define('THISPAGE', $article['url']);
    } else {
        define('THISPAGE', $page);
    }
}
else {
    $article = $ArticlesModel->getLastArticle(3)->fetch(PDO::FETCH_ASSOC);
    define('THISPAGE', $article['url']);
}

require_once(BASE_PATH . 'Application/Model/UrlsModel.php');
$UrlsModel = new UrlsModel();

$article = $UrlsModel->getArticleFromUrl(THISPAGE)->fetch(PDO::FETCH_ASSOC);

// include current page controller (if it exists)
if(file_exists(BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . THISPAGE . 'Controller.php')) {
    require_once(
        BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . THISPAGE . 'Controller.php');

    // Create instance and show index for this page
    $controllerName = THISPAGE . 'Controller';
    $controller = new $controllerName;
    $controller->indexAction();
}
// the page is an article
else if(is_array($article) && !empty($article) && $article['status_id'] == 1) {
    require_once(BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'articleController.php');
    $articleController = new articleController();
    $articleController->indexAction($article);
}
// something we don't know
else {
    require_once(BASE_PATH . 'Application' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR . 'errorController.php');
    $errorController = new errorController;
    $errorController->indexAction();
}

require_once(BASE_PATH . 'Application/Controller/footerController.php');
$footer = footerController::getFooter();

require_once(BASE_PATH . 'Application/View/basics/footer.php');
?>
