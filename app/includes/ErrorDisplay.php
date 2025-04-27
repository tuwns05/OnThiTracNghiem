<?php
// 1. Tắt tự động in lỗi ra trình duyệt
ini_set('display_errors', 0);
error_reporting(E_ALL);

// 2. Custom Error Handler
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    renderErrorTable('Error', $errno, $errstr, $errfile, $errline);
    exit;
});

// 3. Custom Exception Handler (cho fatal error / uncaught exception)
set_exception_handler(function ($exception) {
    renderErrorTable('Exception', $exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine());
    exit;
});

// 4. Hàm render bảng lỗi
function renderErrorTable($type, $code, $message, $file, $line) {
    echo "
    <style>
        table {border-collapse: collapse; width: 60%; margin: 50px auto; font-family: Arial, sans-serif;}
        th, td {border: 1px solid #ccc; padding: 12px; text-align: left;}
        th {background-color: #f44336; color: white;}
        tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
    <table>
        <tr><th colspan='2'>PHP $type Occurred</th></tr>
        <tr><td><strong>Code</strong></td><td>$code</td></tr>
        <tr><td><strong>Message</strong></td><td>$message</td></tr>
        <tr><td><strong>File</strong></td><td>$file</td></tr>
        <tr><td><strong>Line</strong></td><td>$line</td></tr>
    </table>";
}
