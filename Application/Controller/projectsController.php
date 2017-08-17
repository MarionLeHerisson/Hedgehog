<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:00
 */

class ProjectsController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $allArticles = $articlesManager->getAllArticles(2);

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/projects.php');
        require_once(BASE_PATH . 'Application/View/basics/footer.php');
    }
}