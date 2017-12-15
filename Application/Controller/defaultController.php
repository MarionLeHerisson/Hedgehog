<?php

/**
* default controller
*/
class DefaultController {

	function __construct() {
		if(isset($_POST['action']) && !empty($_POST['action'])) {
            $this->Ajax($_POST);
        } else if(isset($_FILES) && !empty($_FILES)) {
            $post['action'] = 'uploadImg';
            $post['param'] = $_FILES[0];
            $this->ajax($post);
        }
	}

	/**
     * handle ajax methods
     *
     * @param array $post
     */
    private function ajax($post) {
        $action = $post['action'];
        $param = [];

        if(isset($post['param'])) {
            $param = $post['param'];
        }

        require_once(BASE_PATH . 'Application/Model/Ajax/admin.php');
        $ajaxApi = new AdminAjax();

        $ajaxApi->$action($param);
    }
}
