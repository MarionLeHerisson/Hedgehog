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
            "(article_type_id, theme_id, author_id, title, intro, content, url, status_id) " .
            "VALUES (?, ?, ?, ?, ?, ?, ?, ?);");

        $query->execute(
            [
                $data['article_type'],
                $data['theme'],
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
     * Update an existing article
     *
     * @param array $data
     * @return PDOStatement
     */
    public function updateArticle($data) {
        $db = $this->connectDb();
        $query = $db->prepare("UPDATE " . $this->_name . " " .
                                "SET article_type_id = ?, theme_id = ?, title = ?, intro = ?, content = ?, url = ?, status_id = ?, updated_at = NOW() " .
                                "WHERE id = ?;");
        $query->execute(
            [
                $data['article_type'],
                $data['theme'],
                $data['title'],
                $data['editor_intro'],
                $data['editor_content'],
                $data['url'],
                $data['status'],
                $data['article_id']
            ]
        );
        return $query;
    }

    /**
     * Return an article's data from its url
     * @param string $url
     * @return PDOStatement
     */
    public function getArticleFromUrl($url) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT article_type_id, author_id, title, intro, content, status_id " .
                                "FROM " . $this->_name . " WHERE url = ?;");
        $query->execute([$url]);
        return $query;
    }

    /**
     * Get all articles from type
     * @param int $type
     * @return PDOStatement
     */
    public function getAllArticles($type) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT id, article_type_id, theme_id, author_id, title, intro, url, created_at " .
                                "FROM " . $this->_name . " " .
                                "WHERE is_deleted = 0 AND article_type_id = ? AND status_id = 1 " .
                                "ORDER BY theme_id DESC;");
        $query->execute([$type]);
        return $query;
    }

    /**
     * Get articles from a keyword
     * @param string $keyword
     * @return PDOStatement
     */
    public function getArticlesFromKeyword($keyword) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT id, title " .
                                "FROM " . $this->_name . " " .
                                "WHERE title LIKE ?;");
        $query->execute(['%' . $keyword . '%']);
        return $query;
    }

    /**
     * Get article from its id
     * @param integer $id
     * @return PDOStatement
     */
    public function getArticle($id) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT a.id, article_type_id, theme_id, author_id, title, intro, content, url, status_id, created_at " .
                                ",m.id as main_media_id, m.is_main " .
                                "FROM " . $this->_name . " AS a " .
                                "LEFT JOIN medias AS m " .
                                "ON m.article_id = a.id " .
                                "WHERE a.id = ?;");
        $query->execute([$id]);
        return $query;
    }


}
