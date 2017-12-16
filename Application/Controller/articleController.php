<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 27/08/2017
 * Time: 10:33
 */
require_once(BASE_PATH . 'Application/Controller/defaultController.php');

class articleController extends DefaultController {

	public function indexAction($article) {

		$prev = '';
		$next = '';
		$comments = '';

	  	if($article['article_type_id'] == 3) {
	  		require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
			$articlesManager = new ArticlesModel();
			$url = $article['url'];

		  	$prev = $articlesManager->getPrevT($url)->fetch(PDO::FETCH_ASSOC);
		    $next = $articlesManager->getNextT($url)->fetch(PDO::FETCH_ASSOC);

		    $htmlComments = $this->getComments(0, $url);
	  	}

	    require_once(BASE_PATH . 'Application/View/basics/head.php');
	    require_once(BASE_PATH . 'Application/View/basics/nav.php');
	    require_once(BASE_PATH . 'Application/View/article.php');
	}

	public function getComments($parentId, $url) {

		require_once(BASE_PATH . 'Application/Model/CommentsModel.php');
		$commentsManager = new CommentsModel();

		$comments = $commentsManager->getComments($parentId, $url)->fetchAll(PDO::FETCH_ASSOC);
		$htmlComments = '';

		if(is_array($comments)) {
			if($parentId != 0) {
				$htmlComments .= '<div class="answer">';
			}
			foreach ($comments as $comment) {

				$htmlComments .= '<div class="media"><h4 class="media-heading">' . $comment['author'] . '</h4>
						<p>' . $comment['content'] . '<br>' .
						//'<a class="nswrlnk" href="" target="_self">répondre</a>' .
						'</p></div>';

				$this->getComments($comment['id'], $url);
			}
			if($parentId != 0) {
				$htmlComments .= '</div>';
			}
		}

		return $htmlComments;
	}
}
