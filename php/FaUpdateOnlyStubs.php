<?php

namespace {
	$GLOBALS['__fa_prefs'] = [];

	if (!function_exists('get_company_prefs')) {
		function get_company_prefs(): array {
			return $GLOBALS['__fa_prefs'];
		}
	}

	if (!function_exists('update_company_prefs')) {
		function update_company_prefs(array $prefs): void {
			foreach ($prefs as $k => $v) {
				$GLOBALS['__fa_prefs'][(string)$k] = $v;
			}
		}
	}
}
