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
    // Global Hook System Functions (for direct use in tests)
    if (!function_exists('add_filter')) {
        function add_filter($filter_name, $callback, $priority = 10) {
            // Mock FA add_filter - register a test filter
            static $test_filters = [];
            
            if (!isset($test_filters[$filter_name])) {
                $test_filters[$filter_name] = [];
            }
            
            $test_filters[$filter_name][] = $callback;
        }
    }

    if (!function_exists('apply_filters')) {
        function apply_filters($filter_name, $value) {
            // Mock FA apply_filters - in real FA this would call registered filter functions
            // For testing, we'll return the value unchanged unless specific test filters are registered
            static $test_filters = [];
            
            if (isset($test_filters[$filter_name])) {
                foreach ($test_filters[$filter_name] as $callback) {
                    $value = call_user_func($callback, $value);
                }
            }
            
            return $value;
        }
    }

    // Global Variables
    if (!isset($GLOBALS['path_to_root'])) {
        $GLOBALS['path_to_root'] = '/mock/fa/root'; // Mock path for testing
    }
}