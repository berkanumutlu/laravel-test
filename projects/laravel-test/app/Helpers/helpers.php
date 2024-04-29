<?php
if (!function_exists('date_format_custom')) {
    function date_format_custom(string $date): string
    {
        return date('Y-m-d', strtotime($date));
    }
}
