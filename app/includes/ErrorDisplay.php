<?php
// 1. Tắt tự động in lỗi
ini_set('display_errors', 0);
error_reporting(E_ALL);

// 2. Đăng ký bắt lỗi
set_error_handler(function ($errno, $errstr, $errfile, $errline) {
    renderErrorTableWithStackTrace('Error', $errno, $errstr, $errfile, $errline);
    exit;
});

set_exception_handler(function ($exception) {
    renderErrorTableWithStackTrace('Exception', $exception->getCode(), $exception->getMessage(), $exception->getFile(), $exception->getLine(), $exception->getTrace());
    exit;
});

// 3. Hàm in bảng lỗi với stack trace
function renderErrorTableWithStackTrace($type, $code, $message, $file, $line, $trace = null) {
    echo "
    <table border='1' cellpadding='8' cellspacing='0' style='margin:50px auto; font-family:sans-serif; width:800px;'>
        <tr style='background:#eee;'><th colspan='2'>$type Occurred</th></tr>
        <tr><td><b>Code</b></td><td>$code</td></tr>
        <tr><td><b>Message</b></td><td>$message</td></tr>
        <tr><td><b>File</b></td><td>$file</td></tr>
        <tr><td><b>Line</b></td><td>$line</td></tr>";

    // Nếu có stack trace thì hiện ra luôn
    if ($trace) {
        echo "<tr><td colspan='2'><b>Stack Trace:</b><pre style='white-space: pre-wrap; background:#f5f5f5; padding:10px; border:1px solid #ccc;'>";
        foreach ($trace as $step) {
            echo "File: {$step['file']} (Line: {$step['line']})\nFunction: {$step['function']}\n\n";
        }
        echo "</pre></td></tr>";
    }

    echo "</table>";
}
?>
