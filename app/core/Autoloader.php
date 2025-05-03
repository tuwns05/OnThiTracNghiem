<?php

/**
* Đăng ký hàm tự động tải để tự động tải các lớp.
*
* Hàm này được đăng ký với `spl_autoload_register` và được kích hoạt
* bất cứ khi nào một lớp được sử dụng nhưng vẫn chưa được định nghĩa. Nó cố gắng
* định vị và bao gồm tệp chứa định nghĩa lớp dựa trên
* tên lớp.
*
* @param string $class Tên đủ điều kiện của lớp đang được tải.
*/
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
