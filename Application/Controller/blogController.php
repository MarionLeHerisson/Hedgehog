<?php

class blogController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        if(isset($_GET['post']) && $_GET['post'] != '') {
            $article = $articlesManager->getArticleFromUrl($_GET['post'])->fetch(PDO::FETCH_ASSOC);
        } else {
            $article = $articlesManager->getLastArticle(3)->fetch(PDO::FETCH_ASSOC);
        }

        $prev = $articlesManager->getPrevT($article['url'])->fetch(PDO::FETCH_ASSOC);
        $next = $articlesManager->getNextT($article['url'])->fetch(PDO::FETCH_ASSOC);

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/blog.php');
    }
}
