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
            echo '<pre>';
            die(print_r($_POST));
            $this->Ajax($_POST);
        }

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');

        // If user is connected and is an admin
        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {

            $types = $this->getTypes();
            $author_id = $_SESSION['id'];
            $article_id = 0;

            require_once(BASE_PATH . 'Application/View/admin/admin.php');
        }
        else {
            require_once(BASE_PATH . 'Application/View/admin/connection.php');
        }

        require_once(BASE_PATH . 'Application/View/basics/footer.php');
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

        switch($action) {
            case 'createUrl' :
                $ajaxApi->createUrl($param);
                break;
        }
    }

    /**
     * Get article types as HTML options tags
     * @return String
     */
    public function getTypes() {
        require_once(BASE_PATH . 'Application/Model/ArticleTypeModel.php');
        $articleTypesManager = new ArticleTypeModel();

        $allTypes = $articleTypesManager->getAllTypes()->fetchAll();
        $options = '';

        foreach ($allTypes as $type) {
            $options .= '<option value="' . $type['id'] . '">' . $type['label'] . '</otpion>';
        }

        return $options;
    }

    /**
     * Save an article
     * @param array $data
     */
    public function editArticle($data) {

        $articleExists = false;
        if($data['article_id'] != 0) {
            $articleExists = true;
        }

        if($articleExists) {
            $this->updateArticle($data);
        } else {
            $this->createArticle($data);
        }
    }

    /**
     * Create an article
     *
     * @param array $data
     */
    public function createArticle($data) {
        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        require_once(BASE_PATH . 'Application/Model/Service/Validator/ArticleValidator.php');
        $articleValidator = new ArticleValidator();

        if($articleValidator->validateArticle()) {
            $articlesManager->insertArticle($data);
        }
    }

    /**
     * Update an article
     *
     * @param array $data
     */
    public function updateArticle($data) {

    }

}