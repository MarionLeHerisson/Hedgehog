<?php

require_once('DefaultModel.php');

class UsersModel extends DefaultModel {

    protected $_name = 'users';

    /**
     * @param String $login
     * @param String $pwd
     * @return PDOStatement
     */
    public function getUser($login, $pwd) {
        $db = $this->connectDb();
        $query = $db->prepare("SELECT id, user_type_id FROM " . $this->_name . "
                                WHERE login = ? AND password = ?");

        $query->execute([$login, $pwd]);

        return $query;
    }

}