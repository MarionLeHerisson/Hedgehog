<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 22/07/2017
 * Time: 06:07
 */

class articlesController {

    public function indexAction()
    {
        // ajax
//        if(isset($_POST['action']) && !empty($_POST['action'])) {
//            $this->Ajax($_POST);
//        }

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/articles.php');
        require_once(BASE_PATH . 'Application/View/basics/footer.php');
    }

}