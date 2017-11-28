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

        require_once(BASE_PATH . 'Application/Model/ThemesModel.php');
        $themesManager = new ThemesModel();

        $allThemes = $themesManager->getAllThemes()->fetchAll(PDO::FETCH_ASSOC);

        $html  = '';
        $currentTheme = '';

        foreach($allArticles as $article) {

            if($article['theme_id'] - 1 >= 0) {
                $articleTheme = $allThemes[$article['theme_id'] - 1]['label'];
            } else {
                $articleTheme = 'Misc';
            }

            if($currentTheme != $articleTheme) {
                if($currentTheme != '') {
                    $html .= '</ul>';
                }
                $currentTheme = $articleTheme;
                $html .= '<h3>' . ucfirst($currentTheme) . '</h3>';
                $html .= '<ul>';
            }
            $html .= '<li><a href="' . $article['url'] . '" target="_self">' . $article['title'] . '</a>' .
                '<span class="pull-right">' . $article['created_at'] . '</span></li>';
        }

        return $html;
    }
}
