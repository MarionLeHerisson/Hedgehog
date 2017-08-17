<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 17/08/2017
 * Time: 18:20
 */
require_once('DefaultModel.php');

class ThemesModel extends DefaultModel {

    protected $_name = 'themes';

    public function getAllThemes() {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT id, label FROM " . $this->_name . " WHERE is_deleted = 0;");

        $query->execute();

        return $query;
    }
}