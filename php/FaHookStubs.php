<?php

namespace {
    $GLOBALS['__fa_hook_stubs_loaded'] = true;

    // Hook System Functions
    if (!function_exists('fa_hooks')) {
        function fa_hooks() {
            // Mock hook manager for testing
            if (!isset($GLOBALS['mock_fa_hooks'])) {
                $GLOBALS['mock_fa_hooks'] = new class {
                    public function apply_filters($filter, $value, ...$args) {
                        return $value; // Return unchanged for testing
                    }
                    public function do_action($action, ...$args) {
                        // Do nothing for testing
                    }
                    public function add_filter($filter, $callback, $priority = 10) {
                        // Do nothing for testing
                    }
                    public function add_action($action, $callback, $priority = 10) {
                        // Do nothing for testing
                    }
                };
            }
            return $GLOBALS['mock_fa_hooks'];
        }
    }

    // Global Variables
    if (!isset($GLOBALS['path_to_root'])) {
        $GLOBALS['path_to_root'] = '/mock/fa/root'; // Mock path for testing
    }
}