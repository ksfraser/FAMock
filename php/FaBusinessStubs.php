<?php

namespace {
    $GLOBALS['__fa_business_stubs_loaded'] = true;

    // Business Logic Functions - Data Retrieval
    if (!function_exists('get_supplier_details_all')) {
        function get_supplier_details_all() {
            // Mock database result for suppliers
            $suppliers = [
                [
                    'supplier_id' => 1,
                    'supp_name' => 'Test Supplier 1',
                    'supp_ref' => 'SUP001',
                    'address' => '123 Test St, Test City',
                    'curr_code' => 'USD',
                    'tax_group_id' => 1,
                    'payment_terms' => 1,
                    'credit_limit' => 10000.00,
                    'inactive' => 0
                ],
                [
                    'supplier_id' => 2,
                    'supp_name' => 'Test Supplier 2',
                    'supp_ref' => 'SUP002',
                    'address' => '456 Mock Ave, Mock City',
                    'curr_code' => 'USD',
                    'tax_group_id' => 1,
                    'payment_terms' => 1,
                    'credit_limit' => 5000.00,
                    'inactive' => 0
                ]
            ];

            // Return iterator that mimics db_query result
            return new \ArrayIterator($suppliers);
        }
    }

    if (!function_exists('get_customer_details_all')) {
        function get_customer_details_all() {
            // Mock database result for customers
            $customers = [
                [
                    'debtor_no' => 1,
                    'name' => 'Test Customer 1',
                    'debtor_ref' => 'CUST001',
                    'address' => '789 Test Blvd, Test City',
                    'curr_code' => 'USD',
                    'tax_group_id' => 1,
                    'payment_terms' => 1,
                    'credit_limit' => 15000.00,
                    'inactive' => 0
                ],
                [
                    'debtor_no' => 2,
                    'name' => 'Test Customer 2',
                    'debtor_ref' => 'CUST002',
                    'address' => '321 Mock Lane, Mock City',
                    'curr_code' => 'USD',
                    'tax_group_id' => 1,
                    'payment_terms' => 1,
                    'credit_limit' => 7500.00,
                    'inactive' => 0
                ]
            ];

            // Return iterator that mimics db_query result
            return new \ArrayIterator($customers);
        }
    }

    if (!function_exists('get_quick_entries')) {
        function get_quick_entries(int $type = 0) {
            // Mock database result for quick entries
            $entries = [
                [
                    'id' => 1,
                    'type' => $type,
                    'description' => 'Test Quick Entry 1',
                    'base_desc' => 'Test Base Description 1',
                    'base_amount' => 100.00
                ],
                [
                    'id' => 2,
                    'type' => $type,
                    'description' => 'Test Quick Entry 2',
                    'base_desc' => 'Test Base Description 2',
                    'base_amount' => 200.00
                ]
            ];

            // Return iterator that mimics db_query result
            return new \ArrayIterator($entries);
        }
    }

    // Bank/Transaction Functions
    if (!function_exists('get_gl_trans_from_to')) {
        function get_gl_trans_from_to(string $begin, string $end, string $account): float {
            // Mock - return a balance amount
            return 1000.00;
        }
    }

    if (!function_exists('get_bank_gl_account')) {
        function get_bank_gl_account($account): int {
            // Mock - return a GL account ID
            return 1001;
        }
    }

    if (!function_exists('add_bank_trans')) {
        function add_bank_trans(...$args): bool {
            // Mock - always succeed
            return true;
        }
    }

    if (!function_exists('add_comments')) {
        function add_comments(...$args): bool {
            // Mock - always succeed
            return true;
        }
    }

    if (!function_exists('get_bank_account')) {
        function get_bank_account($id) {
            // Mock bank account data
            $accounts = [
                1 => [
                    'id' => 1,
                    'bank_account_name' => 'Test Bank Account 1',
                    'bank_curr_code' => 'USD',
                    'bank_name' => 'Test Bank',
                    'account_code' => '1001',
                    'inactive' => 0
                ],
                2 => [
                    'id' => 2,
                    'bank_account_name' => 'Test Bank Account 2',
                    'bank_curr_code' => 'CAD',
                    'bank_name' => 'Test Bank 2',
                    'account_code' => '1002',
                    'inactive' => 0
                ]
            ];

            return $accounts[$id] ?? null;
        }
    }

    if (!function_exists('get_gl_trans')) {
        function get_gl_trans($trans_type, $trans_no) {
            // Mock GL transactions - return ArrayIterator to mimic db_query result
            return new ArrayIterator([
                [
                    'account' => '1000',
                    'person_id' => 1,
                    'person_type_id' => 2, // customer
                    'memo' => 'Test transaction'
                ]
            ]);
        }
    }

    if (!function_exists('db_fetch')) {
        function db_fetch($result) {
            // Mock db_fetch - return the current item from ArrayIterator
            if ($result instanceof ArrayIterator) {
                $current = $result->current();
                $result->next();
                return $current;
            }
            return false;
        }
    }

    // Mock FrontAccounting classes
    if (!class_exists('fa_bank_transfer')) {
        class fa_bank_transfer {
            private $data = [];

            public function set($key, $value) {
                $this->data[$key] = $value;
            }

            public function get($key) {
                return $this->data[$key] ?? null;
            }

            public function write() {
                // Set trans_no for the mock
                $this->data['trans_no'] = 123;
                return 123; // Mock transaction ID
            }

            public function getNextRef() {
                return 'BT001'; // Mock reference number
            }

            public function add_bank_transfer() {
                // Set trans_no and trans_type for the mock
                $this->data['trans_no'] = 123;
                $this->data['trans_type'] = 4; // ST_BANKTRANSFER
                return true; // Mock success
            }
        }
    }
}

// Define functions in specific namespaces
namespace KsfBankImport\Services {
    if (!function_exists('KsfBankImport\Services\get_exchange_rate_from_to')) {
        function get_exchange_rate_from_to($from, $to, $date) {
            // Mock exchange rates for testing
            $rates = [
                'USD_CAD' => 1.30,
                'CAD_USD' => 0.77,
                'USD_EUR' => 0.85,
                'EUR_USD' => 1.18,
                'CAD_EUR' => 0.65,
                'EUR_CAD' => 1.54,
            ];

            $key = "{$from}_{$to}";
            return $rates[$key] ?? 1.0;
        }
    }
}