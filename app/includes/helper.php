<?php
namespace App\Includes;

// hàm dùng để chuyển đổi, chuẩn hóa url cho gọi api
function url($path) {
    return BASE_URL . '/' . ltrim($path, '/');
}