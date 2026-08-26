<?php
/**
 * Base Class Stubs for FAMock
 * Provides minimal stubs for deprecated FA base classes so that
 * modules using legacy inheritance patterns can load in test environments.
 *
 * @package Ksfraser\FAMock
 */

// Minimal db_base stub
if (!class_exists('db_base')) {
    class db_base {
        function __construct($host = null, $user = null, $pass = null, $database = null, $pref_tablename = null) {}
        function set($field, $value = null, $enforce = false) {}
        function get($field) { return null; }
    }
}

// Minimal generic_fa_interface stub
if (!class_exists('generic_fa_interface')) {
    class generic_fa_interface extends db_base {
        var $table_interface;
        var $controller;
        var $tabs = array();
        var $found;
        var $config_values = array();
        var $help_context;
        var $action;
        var $redirect_to;
        var $edit;
        var $delete;
        var $selected_id;

        function __construct($host = null, $user = null, $pass = null, $database = null, $pref_tablename = null) {
            parent::__construct($host, $user, $pass, $database, $pref_tablename);
            $this->edit = -1;
            $this->delete = -1;
            $this->selected_id = -1;
        }
        function set_var($var, $value = null, $enforce = false) {}
        function get_var($var) { return null; }
        function add_submodules() {}
        function module_install() {}
        function install() {}
        function loadprefs() {}
        function updateprefs() {}
        function checkprefs() {}
        function call_table($action, $msg) {}
        function action_show_form() {}
        function show_config_form() {}
        function show_form() {}
        function display() {}
        function run() {}
        function is_installed() { return true; }
        function set($field, $value = null, $enforce = false) {}
        function get($field) { return null; }
    }
}

// Minimal generic_fa_interface_model stub
if (!class_exists('generic_fa_interface_model')) {
    class generic_fa_interface_model extends generic_fa_interface {
        var $table_interface;
        function __construct($host = null, $user = null, $pass = null, $database = null, $pref_tablename = null) {
            parent::__construct($host, $user, $pass, $database, $pref_tablename);
        }
        function getAll() { return new \ArrayIterator([]); }
        function select_row() {}
        function install() {}
        function insert_data($arr) {}
        function getPrimaryKey() { return 'id'; }
        function define_table() {}
        function create_table() {}
    }
}

// Minimal generic_fa_interface_controller stub
if (!class_exists('generic_fa_interface_controller')) {
    class generic_fa_interface_controller extends generic_fa_interface {
        var $model;
        var $view;
        var $tabs = array();
    }
}

// Minimal generic_fa_interface_view stub
if (!class_exists('generic_fa_interface_view')) {
    class generic_fa_interface_view extends generic_fa_interface {
        var $controller;
        var $header_arr;
        var $show_inactive = false;
        function __construct($host = null, $user = null, $pass = null, $database = null, $pref_tablename = null, $controller = null, $show_inactive = false) {
            parent::__construct($host, $user, $pass, $database, $pref_tablename);
            $this->controller = $controller;
            $this->show_inactive = $show_inactive;
        }
        function master_form() {}
        function usage_form() {}
    }
}

// Minimal table_interface stub
if (!class_exists('table_interface')) {
    class table_interface {
        var $table_details = array('tablename' => '', 'primarykey' => 'id');
        var $fields_array = array();
        var $db_insert_id;

        function __construct($caller = null) {
            $this->table_details = array('tablename' => '', 'primarykey' => 'id');
            $this->fields_array = array();
        }
        function set($field, $value = null, $enforce = false) { $this->$field = $value; }
        function get($field) {
            if (isset($this->$field)) return $this->$field;
            throw new Exception("Field not set", 999);
        }
        function select_row() {}
        function insert_table() { return 1; }
        function update_table() {}
        function delete_table() {}
        function create_table() {}
        function getPrimaryKey() { return $this->table_details['primarykey']; }
        function getAll() { return new \ArrayIterator([]); }
    }
}

// Minimal constants/requires stub for includes/types.inc
if (!defined('DESCRIPTION_LENGTH')) {
    define('DESCRIPTION_LENGTH', 200);
}
if (!defined('TB_PREF')) {
    define('TB_PREF', '0_');
}
if (!defined('ST_SALESINVOICE')) {
    define('ST_SALESINVOICE', 10);
}
if (!defined('NOT_SELECTED')) {
    define('NOT_SELECTED', -1);
}
if (!defined('KSF_FIELD_NOT_SET')) {
    define('KSF_FIELD_NOT_SET', 999);
}
if (!defined('KSF_FIELD_NOT_CLASS_VAR')) {
    define('KSF_FIELD_NOT_CLASS_VAR', 998);
}
if (!defined('PRIMARY_KEY_NOT_SET')) {
    define('PRIMARY_KEY_NOT_SET', 997);
}
