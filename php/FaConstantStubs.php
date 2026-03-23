<?php

namespace {
    $GLOBALS['__fa_constant_stubs_loaded'] = true;

    /**
     * FrontAccounting Core Constants
     * 
     * Defines the standard FrontAccounting constants for:
     * - Database table prefixes
     * - Partner/Entity types (customers, suppliers)
     * - Transaction types
     * - Status codes
     * - Reference type codes
     */

    // ==========================================
    // TABLE PREFIX
    // ==========================================
    if (!defined('TB_PREF')) {
        define('TB_PREF', '0_');
    }

    // ==========================================
    // PARTNER TYPES (gl_account dimensioning)
    // ==========================================
    if (!defined('PT_CUSTOMER')) {
        define('PT_CUSTOMER', 'C');              // Type 'C' = Customer/Debtor
    }

    if (!defined('PT_SUPPLIER')) {
        define('PT_SUPPLIER', 'S');              // Type 'S' = Supplier/Creditor
    }

    if (!defined('PT_BANK')) {
        define('PT_BANK', 'B');                  // Type 'B' = Bank Account
    }

    if (!defined('PT_BRANCH')) {
        define('PT_BRANCH', 'BR');               // Type 'BR' = Customer Branch
    }

    // ==========================================
    // TRANSACTION TYPES AND STATUS CODES
    // ==========================================
    // Sales transactions
    if (!defined('ST_SALESINVOICE')) {
        define('ST_SALESINVOICE', 0);            // 0  = Sales Invoice
    }

    if (!defined('ST_CUSTCREDIT')) {
        define('ST_CUSTCREDIT', 1);              // 1  = Customer Credit Note
    }

    if (!defined('ST_CUSTPAYMENT')) {
        define('ST_CUSTPAYMENT', 2);             // 2  = Customer Payment
    }

    if (!defined('ST_CUSTDELIVERY')) {
        define('ST_CUSTDELIVERY', 13);           // 13 = Customer Delivery
    }

    // Purchasing transactions
    if (!defined('ST_SUPPINVOICE')) {
        define('ST_SUPPINVOICE', 20);            // 20 = Supplier Invoice
    }

    if (!defined('ST_SUPPCREDIT')) {
        define('ST_SUPPCREDIT', 21);             // 21 = Supplier Credit Note
    }

    if (!defined('ST_SUPPAYMENT')) {
        define('ST_SUPPAYMENT', 22);             // 22 = Supplier Payment
    }

    if (!defined('ST_SUPPRECEIVE')) {
        define('ST_SUPPRECEIVE', 25);            // 25 = Supplier Receive
    }

    // Bank transactions
    if (!defined('ST_BANKPAYMENT')) {
        define('ST_BANKPAYMENT', 1);             // 1  = Bank Payment
    }

    if (!defined('ST_BANKDEPOSIT')) {
        define('ST_BANKDEPOSIT', 2);             // 2  = Bank Deposit
    }

    if (!defined('ST_BANKTRANSFER')) {
        define('ST_BANKTRANSFER', 4);            // 4  = Bank Transfer
    }

    // Journal/General Ledger transactions
    if (!defined('ST_JOURNAL')) {
        define('ST_JOURNAL', 0);                 // 0  = Journal Entry
    }

    if (!defined('ST_MEMO')) {
        define('ST_MEMO', 11);                   // 11 = Memo (non-financial note)
    }

    if (!defined('ST_INVADJUST')) {
        define('ST_INVADJUST', 16);              // 16 = Inventory Adjustment
    }

    if (!defined('ST_LOCTRANSFER')) {
        define('ST_LOCTRANSFER', 17);            // 17 = Location Transfer
    }

    if (!defined('ST_MANUISSUE')) {
        define('ST_MANUISSUE', 18);              // 18 = Manual Issue
    }

    if (!defined('ST_MANURECEIVE')) {
        define('ST_MANURECEIVE', 19);            // 19 = Manual Receive
    }

    if (!defined('ST_PURCHORDER')) {
        define('ST_PURCHORDER', 24);             // 24 = Purchase Order
    }

    if (!defined('ST_SALESQUOTE')) {
        define('ST_SALESQUOTE', 32);             // 32 = Sales Quote
    }

    if (!defined('ST_SALESORDER')) {
        define('ST_SALESORDER', 30);             // 30 = Sales Order
    }

    if (!defined('ST_WORKORDER')) {
        define('ST_WORKORDER', 60);              // 60 = Work Order (Manufacturing)
    }

    // ==========================================
    // PAYMENT RECONCILIATION STATUSES
    // ==========================================
    if (!defined('STATUS_UNRECONCILED')) {
        define('STATUS_UNRECONCILED', 0);        // Not reconciled
    }

    if (!defined('STATUS_RECONCILED')) {
        define('STATUS_RECONCILED', 1);          // Reconciled
    }

    if (!defined('STATUS_PARTIAL')) {
        define('STATUS_PARTIAL', 2);             // Partially reconciled
    }

    // ==========================================
    // REFERENCE TYPES
    // ==========================================
    if (!defined('DIMENSION_TYPE_CUSTOMER')) {
        define('DIMENSION_TYPE_CUSTOMER', 1);    // Dimension for customers
    }

    if (!defined('DIMENSION_TYPE_PROJECT')) {
        define('DIMENSION_TYPE_PROJECT', 2);     // Dimension for projects
    }

    if (!defined('DIMENSION_TYPE_DEPARTMENT')) {
        define('DIMENSION_TYPE_DEPARTMENT', 3);  // Dimension for departments
    }
}
