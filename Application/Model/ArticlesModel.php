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

    public function insertArticle($data) {
        $db = $this->connectDb();
        $query = $db->prepare("INSERT INTO " . $this->_name .
            "(article_type_id, author_id, title, intro, content, url, status_id)" .
            "VALUES ?, ?, ?, ?, ?, ?, ?;");

        $query->execute(
            [
                $data['type'],
                $data['author_id'],
                $data['title'],
                $data['editor-intro'],
                $data['editor-content'],
                $data['url'],
                $data['online']
            ]
        );

        return $query;
    }
}