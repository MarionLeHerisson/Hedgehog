<?php

class errorController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/basics/error.php');
    }
}