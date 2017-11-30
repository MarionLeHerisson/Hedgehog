<?php

class Utils {

	public static function getConfig($key = false, $default = false) {

		$json = file_get_contents('../config.json');
		$array = json_decode($json, true);

		if (array_key_exists($key, $array)) {
			return $array[$key];
		}

		return $default;
	}
}
