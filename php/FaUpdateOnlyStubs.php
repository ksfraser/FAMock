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

	if (!function_exists('set_company_pref')) {
		function set_company_pref(string $name, $value): void {
			// Check for test-specific global first (backwards compatibility)
			global $_test_company_prefs;
			if (isset($_test_company_prefs)) {
				$_test_company_prefs[$name] = $value;
				return;
			}
			$GLOBALS['__fa_prefs'][$name] = $value;
		}
	}
}
