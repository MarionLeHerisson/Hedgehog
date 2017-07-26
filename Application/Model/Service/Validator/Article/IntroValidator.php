<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 22:49
 */

class IntroValidator extends DefaultValidator {
    protected  $conf = [
        'fieldName' => 'introduction',
        'min' => 30,
        'max' => 100
    ];
}