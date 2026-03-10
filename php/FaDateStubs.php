<?php

namespace {
    if (!function_exists('begin_month')) {
        function begin_month(string $date): string {
            return date('Y-m-01', strtotime($date));
        }
    }

    if (!function_exists('end_month')) {
        function end_month(string $date): string {
            return date('Y-m-t', strtotime($date));
        }
    }

    if (!function_exists('Today')) {
        function Today(): string {
            return date('Y-m-d');
        }
    }

    if (!function_exists('is_new_reference')) {
        function is_new_reference(string $reference, int $transType): bool {
            // Mock implementation - always return true for testing
            return true;
        }
    }
}