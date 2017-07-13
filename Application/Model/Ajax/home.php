<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 08/07/2017
 * Time: 16:42
 */

class HomeAjax {

    public function action($param) {
        if(!empty($param)) {
            die(json_encode([
                'stat'  	=> 'ok',
                'msg'	    => 'Param is not empty !'
            ]));
        }

        die(json_encode([
            'stat'  	=> 'ko',
            'msg'	    => 'Param is empty...'
        ]));
    }

    public function otherAction($param) {

    }
}