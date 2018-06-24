<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:00
 */

 require_once(BASE_PATH . 'Application/Controller/defaultController.php');

class ProjectsController extends DefaultController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        require_once(BASE_PATH . 'Application/Model/Service/ArticleService.php');
        $articleService = new ArticleService();

        $projects = $articlesManager->getAllArticles(2)->fetchAll(PDO::FETCH_ASSOC);
        $formattedList = $articleService->formatProjectsTimeline($projects);

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/projects.php');
    }
}
