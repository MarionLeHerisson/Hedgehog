<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 22:52
 */
require_once('defaultModel.php');

class ArticleTypeModel extends DefaultModel {

    protected $_name = 'article_type';

    public function getAllTypes() {
        $bdd = $this->connectDb();
        $query = $bdd->prepare("SELECT id, label FROM " . $this->_name . " WHERE is_deleted = 0;");

        $query->execute();

        return $query;
    }
}