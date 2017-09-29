<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 04/09/2017
 * Time: 15:35
 */

class footerController {
    /**
     * Return footer links
     * @return string
     */
    static public function getFooter() {
        require_once(BASE_PATH . 'Application/Model/ArticlesModel.php');
        $articlesManager = new ArticlesModel();

        $articles =  $articlesManager->getAllArticles(5)->fetchAll(PDO::FETCH_ASSOC);
        $footer = '';

        foreach($articles as $key => $article) {
            if($key != 0) {
                $footer .= ' &bull; ';
            }
            $footer .= '<a href="' . $article['url'] . '">' . $article['title'] . '</a>';
        }

        return $footer;
    }
}
