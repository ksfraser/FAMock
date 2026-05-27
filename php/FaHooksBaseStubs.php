<?php

namespace {
    $GLOBALS['__fa_hooks_base_stubs_loaded'] = true;

    if (!class_exists('hooks')) {
        class hooks
        {
            public $module_name = '';

            public function install_tables()
            {
                return true;
            }

            public function install_access()
            {
                return true;
            }

            public function activate_extension()
            {
                return true;
            }

            public function deactivate_extension()
            {
                return true;
            }
        }
    }
}
