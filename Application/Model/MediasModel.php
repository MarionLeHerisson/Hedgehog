<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 15/07/2017
 * Time: 19:24
 */
require_once(BASE_PATH . 'Application/Model/DefaultModel.php');

class MediasModel extends DefaultModel {
    protected $_name = 'medias';

    /**
     * Insert a new article
     *
     * @param string $media
     * @param string $article_id
     * @return PDOStatement
     */
    public function insertMainMedia($media, $article_id) {
        $db = $this->connectDb();
        $query = $db->prepare("INSERT INTO " . $this->_name .
            "(src, article_id, is_main) " .
            "VALUES (?, ?, 1);");

        $query->execute(
            [
                $media,
                $article_id
            ]
        );
        
        return $query;
    }
}