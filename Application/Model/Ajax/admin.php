<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 22/07/2017
 * Time: 07:17
 */

class AdminAjax {

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