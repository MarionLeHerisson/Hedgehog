<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 22/07/2017
 * Time: 06:07
 */

class articlesController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        require_once(BASE_PATH . 'Application/Model/Service/ArticleService.php');
        $articleService = new ArticleService();

        $allArticles  = $articlesManager->getAllArticles(1, 1)->fetchAll(PDO::FETCH_ASSOC);
        $formattedList = $articleService->formatArticleList($allArticles);

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/articles.php');
    }

}
