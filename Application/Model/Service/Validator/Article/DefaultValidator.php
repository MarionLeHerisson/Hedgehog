<?php

/**
 * Created by PhpStorm.
 * User: Marion
 * Date: 23/07/2017
 * Time: 19:29
 */
class DefaultValidator {

    private $conf = [];
    private $error = false;

    public $field = '';
    public $errors = [];

    /**
     * Verify content length
     */
    public function contentLength() {
        if(strlen($this->field) < $this->conf['min']) {
            $errors[] = 'The ' . $this->conf['fieldName'] . ' must be at least ' . $this->conf['min'] . ' characters long.';
            $this->error = true;
        }

        if(strlen($this->field) > $this->conf['max']) {
            $errors[] = 'The ' . $this->conf['fieldName'] . ' must be at most ' . $this->conf['max'] . ' characters long.';
            $this->error = true;
        }

        return !$this->error;
    }
}