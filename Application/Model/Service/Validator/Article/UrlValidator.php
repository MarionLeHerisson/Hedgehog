<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 22:49
 */

class UrlValidator extends DefaultValidator {
    protected  $conf = [
        'fieldName' => 'url',
        'min' => 5,
        'max' => 50
    ];
}