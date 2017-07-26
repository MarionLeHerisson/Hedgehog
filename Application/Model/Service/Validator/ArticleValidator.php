<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 19:17
 */

require_once(BASE_PATH . 'Application/Model/Service/Validator/Article/ContentValidator.php');
require_once(BASE_PATH . 'Application/Model/Service/Validator/Article/IntroValidator.php');
require_once(BASE_PATH . 'Application/Model/Service/Validator/Article/TitleValidator.php');
require_once(BASE_PATH . 'Application/Model/Service/Validator/Article/UrlValidator.php');

class ArticleValidator {

    /**
     * Verify fields of an article
     *
     * @return boolean
     */
    public function validateArticle() {

        $contentValidator = new ContentValidator();
        $introValidator = new IntroValidator();
        $titleValidator = new TitleValidator();
        $urlValidator = new UrlValidator();

        $contentValidator->contentLength();
        $introValidator->contentLength();
        $titleValidator->contentLength();
        $urlValidator->contentLength();

        if(empty($this->errors)) {
            return true;
        }

        return false;
    }

}