<?php

require_once(BASE_PATH . 'Application/Model/DefaultModel.php');

class UrlsModel extends DefaultModel {
    protected $_name = 'urls';

    /**
     * Return an article's data from its url
     * @param string $url
     * @return PDOStatement
     */
    public function getArticleFromUrl($url) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT u.id, u.url, a.article_type_id, a.author_id" .
                              ", a.title, a.intro, a.content, a.status_id, a.url_id, a.created_at " .
                              "FROM " . $this->_name . " AS u " .
                              "LEFT JOIN articles AS a " .
                              "ON u.id = a.url_id " .
                              "WHERE url = ?;");
/*        $query = $db->prepare("SELECT article_type_id, author_id, title, intro, content, status_id, url, created_at " .
                                "FROM " . $this->_name . " WHERE url = ?;"); */

        $query->execute([$url]);
        return $query;
    }

    public function insertUrl($url) {
        $db = $this->connectDb();
        $query = $db->prepare("INSERT INTO " . $this->_name . "(url) VALUE (?);");
        $query->execute([$url]);

        $query2 = $db->prepare("SELECT LAST_INSERT_ID();");
        $query2->execute();

        return $query2;
    }
}
