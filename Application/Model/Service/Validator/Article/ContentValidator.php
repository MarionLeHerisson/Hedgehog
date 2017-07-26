<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 22:49
 */

class ContentValidator extends DefaultValidator {
    protected  $conf = [
        'fieldName' => 'content',
        'min' => 100,
        'max' => 1000000000000
    ];
}