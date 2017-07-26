<?php
/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 22:49
 */

class TitleValidator extends DefaultValidator {
    protected  $conf = [
        'fieldName' => 'title',
        'min' => 10,
        'max' => 50
    ];
}