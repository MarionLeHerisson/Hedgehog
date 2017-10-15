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

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $articleExists = false;
        if($data['article_id'] != 0 && $articlesManager->getArticle($data['article_id'])) {
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

        require_once(BASE_PATH . 'Application/Model/MediasModel.php');
        $mediaManager = new MediasModel();

        $url = $articlesManager->getArticleFromUrl($data['url'])->fetchColumn();

        if($url) {
            die(json_encode([
                'stat'  	=> 'ko',
                'msg'	    => 'Url already exists !'
            ]));
        }

//        require_once(BASE_PATH . 'Application/Model/Service/Validator/ArticleValidator.php');
//        $articleValidator = new ArticleValidator();
//
//        $errors = $articleValidator->validateArticle();
        $errors = [];

        if(empty($errors)) {

            $article_id = $articlesManager->insertArticle($data)->fetchColumn();

            if(isset($data['main_media'])) {
                $mediaManager->insertMainMedia($data['main_media'], $article_id);
            }

            if(!$article_id) {
                die(json_encode([
                    'stat'      => 'ko',
                    'msg'       => 'An error occured'
                ]));
            }
            die(json_encode([
                'stat'  	=> 'ok',
                'msg'	    => 'New article successfully saved'
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

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        if($data['theme'] == '') {
            $data['theme'] = NULL;
        }

        $res = $articlesManager->updateArticle($data)->fetchColumn();

        die(json_encode([
                'stat'      => 'ok',
                'msg'       => 'Article editions successfully saved'
            ]));
    }

    /**
     * Create url from title
     *
     * @param array $data
     */
    public function createUrl($data) {

        if($data[0] != '') {
            require_once(BASE_PATH . 'library/strings.php');

            $title = Strings::unaccent($data[0]);
            $title = Strings::sanitizeString($title);
            $title = Strings::rmPunctuation($title);
            $title = str_replace(' ', '-', trim($title));
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

    /**
     * Upload an image
     *
     * @param array $fileData
     * @author https://www.w3schools.com/php/php_file_upload.asp
     */
    public function uploadImg($fileData) {

        require_once(BASE_PATH . 'library/images.php');

        $target_dir    = BASE_PATH . "www\Medias\uploads\\";
        $target_file   = $target_dir . basename($fileData["name"]);
        $status        = 'ok';
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $msg           = '<ul>';

            // Check if image file is a actual image or fake image
        $check = getimagesize($fileData["tmp_name"]);
        if($check == false) {
            $msg .= "<li>File is not an image.</li>";
            $status = 'ko';
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $msg .= "<li>Sorry, file already exists.</li>";
            $status = 'ko';
        }

        // Check file size
        if ($fileData["size"] > 500000) {
            $msg .= "<li>Sorry, your file is too large.</li>";
            $status = 'ko';
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $msg .= "<li>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</li>";
            $status = 'ko';
        }

        $msg .= '</ul>';

        // Check if $status is set to 'ko' by an error
        if ($status == 'ko') {
            $msg .= "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($fileData["tmp_name"], $target_file)) {
                Images::resizeImage($target_file, 950, 1000);

                die(json_encode([
                    'status' => $status,
                    'msg'    => "The file ". basename( $fileData["name"]). " has been uploaded.",
                    'img'    => $target_file
                ]));

            } else {
                $msg .= "Sorry, there was an error uploading your file.";
            }
        }

        die(json_encode([
            'status' => $status,
            'msg'    => $msg
        ]));
    }

    /**
     * Return array of type's articles
     *
     * @param integer $type
     */
    public function displayAllArticles($type) {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $articles = [];

        if($type && $type > 0 && $type < 4) {
            $articles = $articlesManager->getAllArticles($type)->fetchAll(PDO::FETCH_ASSOC);
        }

        die(json_encode([
            'status'   => 'ok',
            'articles' => $articles
        ]));
    }

    /**
     * Return list of articles containing the keyword
     *
     * @param string $keywords
     */
    public function findArticle($keyword) {

        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $articles = $articlesManager->getArticlesFromKeyword($keyword)->fetchAll(PDO::FETCH_ASSOC);

        die(json_encode(([
            'articles'  => $articles
        ])));
    }

    public function getArticle($id) {
        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $article = $articlesManager->getArticle($id)->fetch(PDO::FETCH_ASSOC);

        die(json_encode(($article)));

    }
}
