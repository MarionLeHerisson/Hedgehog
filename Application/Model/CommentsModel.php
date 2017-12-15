<?php

require_once(BASE_PATH . 'Application/Model/DefaultModel.php');

class CommentsModel extends DefaultModel {

	protected $_name = 'comments';

	/**
	* Get one comment
	* @param String $url
	* @return PDOStatement
	**/
	public function getComments($id, $url) {
		$db = $this->connectDb();
		$query = $db->prepare("SELECT c.id, c.content, c.parent_id, c.created_at, c.author_id" .
								", u.id AS uid, u.url " .
								", usr.id AS usrid, usr.login " .
								"FROM " . $this->_name . " AS c " .
								"LEFT JOIN urls AS u " .
								"ON u.id = c.article_url_id " .
								"LEFT JOIN users AS usr " .
								"ON usr.id = c.author_id " .
								"WHERE c.is_deleted = 0 " .
								"AND c.parent_id = ? " .
								"AND u.url = ?" .
								"ORDER BY c.created_at;");

		$query->execute([$id, $url]);
		return $query;
	}


	/**
	* Get all comments for an article
	* @param String $url
	* @return PDOStatement
	**/
	public function getArticleComments($url) {
		$db = $this->connectDb();
		$query = $db->prepare("SELECT c.id, c.content, c.parent_id, c.created_at" .
								", u.id, u.url " .
								"FROM " . $this->_name . " AS c " .
								"LEFT JOIN urls AS u " .
								"ON u.id = c.article_url_id " .
								"WHERE c.is_deleted = 0 " .
								"AND u.url = ?;");
		$query->exeute([$url]);

		return $query;
	}

	public function insertComment($comment) {
		$db = $this->connectDb();
		$query = $db->prepare("INSERT INTO " . $this->_name . "(content, author, article_url_id, parent_id) " .
								"VALUES(?, ?, ?, ?);");
		$query->execute([$comment['content'], $comment['author_id'], $comment['url_id'], $comment['parent_id']]);

		return $query;
	}
}
