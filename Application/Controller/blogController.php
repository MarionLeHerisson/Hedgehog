<?php

class blogController {

    public function indexAction() {

        // ajax
        if(isset($_POST['action']) && !empty($_POST['action'])) {
            $this->Ajax($_POST);
        }

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');
        require_once(BASE_PATH . 'Application/View/blog.php');
        require_once(BASE_PATH . 'Application/View/basics/footer.php');
    }

    private function Ajax($post) {
        $action = $post['action'];
        $param = [];

        if(isset($post['param'])) {
            $param = $post['param'];
        }

        require_once(BASE_PATH . 'Application/Model/Ajax/home.php');
        $ajaxApi = new HomeAjax();

        // To try
        $ajaxApi->$action($param);

//        switch($action) {
//            case 'someAction' :
//                $ajaxApi->action($param);
//                break;
//            case 'anotherAction' :
//                $ajaxApi->otherAction($param);
//                break;
//        }
    }
}