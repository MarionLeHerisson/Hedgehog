<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 22:49
 */

require_once(BASE_PATH . 'Application/Model/Service/Validator/Article/DefaultValidator.php');
class UrlValidator extends DefaultValidator {
    protected  $conf = [
        'fieldName' => 'url',
        'min' => 5,
        'max' => 50
    ];
}