<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 27/08/2017
 * Time: 10:33
 */

class articleController {

    public function indexAction($article) {
$article = $article[0];
        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/blog.php');
    }
}
