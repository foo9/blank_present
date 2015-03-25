<?php

if (!function_exists('_blank')) {
	function _blank($arg, $gettype = null) {
		$type = isset($gettype) ? $gettype($arg) : gettype($arg);
		if ($type === 'boolean') {
			return !$arg;
		} else if ($type === 'integer') {
			return ($arg === 0);
		} else if ($type === 'double') {
			return ((int) $arg) == 0;
		} else if ($type === 'string') {
			if (mb_strlen($arg) === 0 || ctype_space($arg)) {
				return true;
			} else {
				$s = strtolower($arg);
				if ($s === 'null' || $s === 'false') {
					return true;
				} else {
					if ($s === 'true') {
						return false;
					} else {
						if (is_numeric($arg)) {
							return ((int) $arg) == 0;
						} else {
							return false;
						}
					}
				}
			}
		} else if ($type === 'array') {
			if (count($arg) === 0) {
				return true;
			} else {
				$a = array_filter($arg, function ($v) {
					return $v !== null;
				});
				return (count($a) === 0);
			}
		} else if ($type === 'object') {
			$is_closure = is_object($arg) && ($arg instanceof Closure);
			if ($is_closure) {
				return $arg();
			} else {
				return (count($arg) > 0);
			}
		} else if ($type === 'resource') {
			return false;
		} else if ($type === 'NULL') {
			return true;
		} else { // 'unknown type'
			throw new \Exception('Unkown type argument');
		}
	}
}

if (!function_exists('_present')) {
	function _present($arg) {
		return !_blank($arg);
	}
}
