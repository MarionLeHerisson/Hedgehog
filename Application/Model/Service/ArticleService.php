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
                '<span class="pull-right">' . date('l j F Y', strtotime($article['created_at'])) . '</span></li>';
        }

        return $html;
    }

    /**
     * Return HTML articles list ordered by date and thematic
     * @param array $allArticles
     * @return string
     */
    public function formatProjectsTimeline($projects) {

        $formattedList = '<ul class="timeline">';

        foreach ($projects as $pos => $project) {
            $formattedList .= '<li';
            $formattedList .= $pos % 2 == 1 ? ' class="timeline-inverted"' : '';
            $formattedList .= '><div class="timeline-badge">';
            // ad period start & period end in database & article edition
            // $formattedList .= $project['year_start'];
            $formattedList .= '</div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">';
            $formattedList .= $project['title'];
            $formattedList .= '</h4><p><small class="text-muted"><i class="glyphicon glyphicon-time"></i>';
            // $formattedList .= $project['day_start'] . ' ' . $project['month_start'] . ' ' . $project['year_start'];
            // $formattedList .= ' - ' . $project['day_end'] . ' ' . $project['month_end'] . ' ' . $project['year_end'];
            $formattedList .= '</small></p></div><div class="timeline-body"><p>';
            $formattedList .= $project['intro'];
            // Cut intro te have only a limited amount of characters.
            $formattedList .= '</p></div></div></li>';
        }

        $formattedList .= '</ul>';

        return $formattedList;
    }
}
