<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:06
 */

class AdminController {

    public function indexAction() {

        if(isset($_POST['action']) && !empty($_POST['action'])) {
            $this->Ajax($_POST);
        } else if(isset($_FILES) && !empty($_FILES)) {
            $post['action'] = 'uploadImg';
            $post['param'] = $_FILES[0];
            $this->ajax($post);
        }

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');

        // If user is connected and is an admin
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {

            $types      = $this->getTypes();
            $themes     = $this->getThemes();
            $author_id  = $_SESSION['id'];
            $article_id = 0;
            $main_media = '';

            require_once(BASE_PATH . 'Application/View/admin/admin.php');
        }
        else {
            require_once(BASE_PATH . 'Application/View/admin/connection.php');
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

    /**
     * Get article types as HTML options tags
     * @return String
     */
    public function getTypes() {
        require_once(BASE_PATH . 'Application/Model/ArticleTypeModel.php');
        $articleTypesManager = new ArticleTypeModel();

        $allTypes = $articleTypesManager->getAllTypes()->fetchAll(PDO::FETCH_ASSOC);
        $options = '';

        foreach ($allTypes as $type) {
            $options .= '<option value="' . $type['id'] . '">' . $type['label'] . '</otpion>';
        }

        return $options;
    }

    /**
     * Get article themes as HTML option tag
     * @return string
     */
    public function getThemes() {
        require_once(BASE_PATH . 'Application/Model/ThemesModel.php');
        $themesManager = new ThemesModel();

        $allThemes = $themesManager->getAllThemes()->fetchAll(PDO::FETCH_ASSOC);
        $options = '';

        foreach ($allThemes as $theme) {
            $options .= '<option value="' . $theme['id'] . '">' . $theme['label'] . '</otpion>';
        }

        return $options;
    }
}
