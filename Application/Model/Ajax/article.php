<?php

class ArticleAjax {

	public function addComment($data) {

		require_once(BASE_PATH . 'Application/Model/CommentsModel.php');
		$commentsManager = new CommentsModel();

		$comment['content'] = $data[1];
		$comment['author'] = $data[0];

die(print_r($_SERVER));

		$comment['url_id']
		$comment['parent_id'] = 0; //  will change with answers

		$commentsManager->insertComment($comment);

		die(json_encode([
                'stat'  	=> 'ko',
                'msg'	    => 'Url already exists !'
            ]));
	}
}

?>
