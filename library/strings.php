<?php

class Strings {

    /**
     * remove quotes and useless spaces in string
     *
     * @param string $string
     * @return string
     * @author Marion
     */
    public static function sanitizeString($string) {
        $string = str_replace('\'', '', $string);
        $string = str_replace('"', '', $string);
        return $string;
    }

    /**
     * Return french date from a SQL date
     *
     * @param string $date
     * @return bool|string
     * @author Marion
     */
    public static function frenchDate($date) {

        $days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
        $months = ['', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'];

        $timestamp = strtotime($date);

        $strDay = $days[date('w', $timestamp)];
        $intDay = date('j', $timestamp);
        $month  = $months[date('n', $timestamp)];
        $year   = date('Y', $timestamp);

        return $strDay . ' ' . $intDay . ' ' . $month . ' ' .  $year;
    }

    /**
     * Return short date from a SQL date
     *
     * @param string $date
     * @return bool|string
     * @author Marion
     */
    public static function shortDate($date) {

        $timestamp = strtotime($date);

        $day   = date('d', $timestamp);
        $month = date('m', $timestamp);
        //$year  = date('Y', $timestamp);

        return $day . '/' . $month /*. '/' . $year*/;
    }

    /**
     * Remove accents (handle different notations)
     *
     * @param string $str
     * @param string $charset
     * @return mixed|string
     * @author http://www.weirdog.com/blog/php/supprimer-les-accents-des-caracteres-accentues.html
     */
    public static function unaccent($str, $charset = 'utf-8')
    {
        $str = htmlentities($str, ENT_NOQUOTES, $charset);
        $str = preg_replace('#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str);
        $str = preg_replace('#&([A-za-z]{2})(?:lig);#', '\1', $str); // pour les ligatures e.g. '&oelig;'
        $str = preg_replace('#&[^;]+;#', '', $str); // supprime les autres caractères
        return $str;
    }

    /**
     * Remove punctuation
     *
     * @param string $str
     * @return string
     */
    public static function rmPunctuation($str) {
        return preg_replace('#[,\./\\!\?;:%$£&\#()\*]#', '', $str);
    }
}
