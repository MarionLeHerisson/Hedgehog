<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 15/07/2017
 * Time: 19:24
 */
require_once(BASE_PATH . 'Application/Model/DefaultModel.php');

class ArticlesModel extends DefaultModel {
    protected $_name = 'articles';

    /**
     * Insert a new article
     *
     * @param array $data
     * @return PDOStatement
     */
    public function insertArticle($data) {
        $db = $this->connectDb();
        $query = $db->prepare("INSERT INTO " . $this->_name .
            "(article_type_id, author_id, title, intro, content, url, status_id) " .
            "VALUES (?, ?, ?, ?, ?, ?, ?);");

        $query->execute(
            [
                $data['article_type'],
                $data['author_id'],
                $data['title'],
                $data['editor_intro'],
                $data['editor_content'],
                $data['url'],
                $data['status']
            ]
        );

        $query2 = $db->prepare("SELECT LAST_INSERT_ID();");
        $query2->execute();
        
        return $query2;
    }

    /**
     * Return an article's id from its url
     * @param string $url
     * @return PDOStatement
     */
    public function getArticleFromUrl($url) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT url FROM " . $this->_name . " WHERE url = ?;");
        $query->execute([$url]);
        return $query;
    }
}