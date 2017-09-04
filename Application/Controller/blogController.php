<?php

class blogController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $allArticles = $articlesManager->getAllArticles(3);

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/blog.php');
    }
}