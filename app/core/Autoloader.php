<?php
spl_autoload_register(function ($class) {

    // Đổi namespace thành path
    $prefix = 'App\\';
    $base_dir = BASE_DIR . '/app/';

    // Nếu class không dùng prefix App\, bỏ qua
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Cắt prefix và chuyển namespace thành đường dẫn
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
