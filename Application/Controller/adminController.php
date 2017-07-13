<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 09/07/2017
 * Time: 19:06
 */

class AdminController {

    public function indexAction() {

        require_once(BASE_PATH . 'Application/View/basics/head.php');
        require_once(BASE_PATH . 'Application/View/basics/nav.php');

        if(isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {

            $types = $this->getTypes();

            require_once(BASE_PATH . 'Application/View/admin/admin.php');
        }
        else {
            require_once(BASE_PATH . 'Application/View/admin/connection.php');
        }

        require_once(BASE_PATH . 'Application/View/basics/footer.php');
    }

    /**
     * Get article types as HTML options tags
     * @return String
     */
    public function getTypes() {
        require_once(BASE_PATH . 'Application/Model/articleTypeModel.php');
        $articleTypesManager = new ArticleTypeModel();

        $allTypes = $articleTypesManager->getAllTypes()->fetchAll();
        $options = '';

        foreach ($allTypes as $type) {
            $options .= '<option value="' . $type['id'] . '">' . $type['label'] . '</otpion>';
        }

        return $options;
    }
}