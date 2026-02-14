<?php

namespace {
	$GLOBALS['__fa_db_stubs_loaded'] = true;
	if (!defined('TB_PREF')) {
		define('TB_PREF', '0_');
	}

	$GLOBALS['__fa_table'] = [];
	$GLOBALS['__fa_result_set'] = [];
	$GLOBALS['__fa_result_pos'] = [];

	if (!function_exists('db_escape')) {
		function db_escape(string $value): string {
			return addslashes($value);
		}
	}

	if (!function_exists('db_query')) {
		function db_query(string $sql, $error = null) {
			$GLOBALS['__fa_last_sql'] = $sql;
			$GLOBALS['__fa_last_update_matched'] = false;
			if (stripos($sql, 'INSERT') === 0) {
				if (preg_match("/VALUES\s*\('([^']*)',\s*'([^']*)'\)/", $sql, $m)) {
					$GLOBALS['__fa_table'][] = ['pref_name' => stripslashes($m[1]), 'pref_value' => stripslashes($m[2])];
					$GLOBALS['__fa_last_insert_id'] = count($GLOBALS['__fa_table']);
				}
				$GLOBALS['__fa_result_set'] = [];
				$GLOBALS['__fa_result_pos'] = [];
				return $sql;
			}

			if (stripos($sql, 'UPDATE') === 0) {
				if (preg_match("/SET\s+([a-zA-Z0-9_]+)\s*=\s*'([^']*)'\s+WHERE\s+([a-zA-Z0-9_]+)\s*=\s*'([^']*)'/i", $sql, $m)) {
					$GLOBALS['__fa_last_update_matched'] = true;
					$v = stripslashes($m[2]);
					$k = stripslashes($m[4]);
					foreach ($GLOBALS['__fa_table'] as &$row) {
						if (($row['pref_name'] ?? null) === $k) {
							$row['pref_value'] = $v;
						}
					}
					unset($row);
				}
				$GLOBALS['__fa_result_set'] = [];
				$GLOBALS['__fa_result_pos'] = [];
				return $sql;
			}

			if (stripos($sql, 'DELETE') === 0) {
				if (preg_match("/WHERE\s+[^=]+\s*=\s*'([^']*)'/", $sql, $m)) {
					$k = stripslashes($m[1]);
					$GLOBALS['__fa_table'] = array_values(array_filter(
						$GLOBALS['__fa_table'],
						fn($r) => (string)($r['pref_name'] ?? '') !== $k
					));
				}
				$GLOBALS['__fa_result_set'] = [];
				$GLOBALS['__fa_result_pos'] = [];
				return $sql;
			}

			// For SELECT and other queries we don't explicitly emulate, reset any cached
			// cursor state so repeated queries behave like fresh result resources.
			if (stripos($sql, 'SELECT') === 0) {
				if (stripos($sql, 'FROM test_table') !== false) {
					$GLOBALS['__fa_result_set'][$sql] = [
						['id' => 1, 'name' => 'Test Item'],
						['id' => 2, 'name' => 'Another Item'],
					];
					$GLOBALS['__fa_result_pos'][$sql] = 0;
					return $sql;
				}
				unset($GLOBALS['__fa_result_set'][$sql], $GLOBALS['__fa_result_pos'][$sql]);
			}

			return $sql;
		}
	}

	if (!function_exists('db_insert_id')) {
		function db_insert_id(): int {
			return (int)($GLOBALS['__fa_last_insert_id'] ?? 0);
		}
	}

	if (!function_exists('db_fetch')) {
		function db_fetch($res) {
			$sql = (string)$res;
			if (stripos($sql, 'SELECT') !== 0) {
				return false;
			}

			if (!isset($GLOBALS['__fa_result_set'][$sql])) {
				$rows = array_values($GLOBALS['__fa_table']);

				if (preg_match("/WHERE\s+[^=]+\s*=\s*'([^']*)'/", $sql, $m)) {
					$k = stripslashes($m[1]);
					$rows = array_values(array_filter($rows, fn($r) => (string)($r['pref_name'] ?? '') === $k));
				} elseif (preg_match("/LIKE\s*'([^']*)'/", $sql, $m)) {
					$like = stripslashes($m[1]);
					$prefix = rtrim($like, '%');
					$rows = array_values(array_filter($rows, fn($r) => strncmp((string)($r['pref_name'] ?? ''), $prefix, strlen($prefix)) === 0));
				}

				if (preg_match('/SELECT\s+1\s+FROM/i', $sql)) {
					$rows = array_map(fn() => ['1' => 1], $rows);
				} elseif (preg_match('/SELECT\s+pref_value\s+FROM/i', $sql)) {
					$rows = array_map(fn($r) => ['pref_value' => $r['pref_value'] ?? ''], $rows);
				}

				$GLOBALS['__fa_result_set'][$sql] = $rows;
				$GLOBALS['__fa_result_pos'][$sql] = 0;
			}

			$pos = $GLOBALS['__fa_result_pos'][$sql] ?? 0;
			$rows = $GLOBALS['__fa_result_set'][$sql] ?? [];
			if ($pos >= count($rows)) {
				return false;
			}
			$GLOBALS['__fa_result_pos'][$sql] = $pos + 1;
			return $rows[$pos];
		}
	}

	if (!function_exists('db_fetch_assoc')) {
	function db_fetch_assoc($res) {
	// Alias for db_fetch in FA - returns associative array
	return db_fetch($res);
	}
	}
}
