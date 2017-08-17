<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 16/08/2017
 * Time: 19:49
 */
class ArticleService {

    /**
     * Return HTML articles list ordered by date and thematic
     * @param array $allArticles
     * @return string
     */
    public function formatArticleList($allArticles) {
        echo '<pre>';
        die(print_r($allArticles));

        $html = '';

        foreach($allArticles as $article) {

        }

        return $html;
    }
}