<?php

require_once('defaultModel.php');

class usersModel extends DefaultModel {

    protected $_name = 'users';

    /**
     * @param String $login
     * @param String $pwd
     * @return PDOStatement
     */
    public function getUser($login, $pwd) {
        $bdd = $this->connectDb();
        $query = $bdd->prepare("SELECT user_type_id FROM " . $this->_name . "
                                WHERE login = ? AND password = ?");

        $query->execute([$login, $pwd]);

        return $query;
    }

}