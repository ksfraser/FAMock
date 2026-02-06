<?php

namespace {
    $GLOBALS['__fa_session_stubs_loaded'] = true;

    // Session/Company Functions
    if (!function_exists('get_company_pref')) {
        function get_company_pref($name) {
            // Mock - return default values
            return null;
        }
    }

    // Mock session for testing
    if (!isset($_SESSION)) {
        $_SESSION = [];
    }
    if (!isset($_SESSION['wa_current_user'])) {
        $_SESSION['wa_current_user'] = new class {
            public $company = 0;
            public $user = 1;
            public $loginname = 'test_user';
        };
    }
}