<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 22/07/2017
 * Time: 07:17
 */

class AdminAjax {

    /**
     * Save an article
     *
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

//        $errors = $articleValidator->validateArticle();
        $errors = [];

        if(empty($errors)) {
            $articlesManager->insertArticle($data);

            die(json_encode([
                'stat'  	=> 'ok',
                'msg'	    => 'Article successfully saved'
            ]));

        } else {

            $msg = '';
            foreach ($errors as $error) {
                $msg .= '<li>' . $error . '</li>';
            }

            die(json_encode([
                'stat'  	=> 'ko',
                'msg'	    => 'The following errors occurred : <ul>' . $msg . '</ul>'
            ]));
        }
    }

    /**
     * Update an article
     *
     * @param array $data
     */
    public function updateArticle($data) {

    }

    /**
     * Create url from title
     *
     * @param array $data
     */
    public function createUrl($data) {

        if($data[0] != '') {
            require_once(BASE_PATH . 'library/strings.php');

            $title = Strings::unaccent(trim($data[0]));
            $title = Strings::sanitizeString($title);
            $title = Strings::rmPunctuation($title);
            $title = str_replace(' ', '-', $title);
            $title = strtolower($title);

            do {
                $title = str_replace('--', '', $title);
            } while(preg_match('#--#', $title));

            die(json_encode([
                'stat'  	=> 'ok',
                'msg'	    => $title
            ]));
        }

        die(json_encode([
            'stat'  	=> 'ko',
            'msg'	    => 'Empty title'
        ]));
    }
}