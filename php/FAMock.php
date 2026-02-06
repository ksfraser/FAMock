<?php

/**
 * FAMock - FrontAccounting Function Mocks for Testing
 *
 * This file provides mock implementations of FrontAccounting functions
 * that are used in FA modules but not available during unit testing.
 *
 * Usage: require_once 'path/to/FAMock.php';
 */

// Load all stub files
require_once __DIR__ . '/FaDbStubs.php';
require_once __DIR__ . '/FaUIStubs.php';
require_once __DIR__ . '/FaHookStubs.php';
require_once __DIR__ . '/FaSecurityStubs.php';
require_once __DIR__ . '/FaSessionStubs.php';
require_once __DIR__ . '/FaUpdateOnlyStubs.php';