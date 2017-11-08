<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 27/08/2017
 * Time: 10:33
 */

class articleController {

	public function indexAction($article) {

		$prev = '';
		$next = '';
		$comments = '';

	  	if($article['article_type_id'] == 3) {
	  		require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
			$articlesManager = new ArticlesModel();

		  	$prev = $articlesManager->getPrevT($article['url'])->fetch(PDO::FETCH_ASSOC);
		    $next = $articlesManager->getNextT($article['url'])->fetch(PDO::FETCH_ASSOC);
	  	}

	    require_once(BASE_PATH . 'Application/View/basics/head.php');
	    require_once(BASE_PATH . 'Application/View/basics/nav.php');
	    require_once(BASE_PATH . 'Application/View/article.php');
	}
}
