<?php
use App\Core\App;

require_once './config/constants.php';
require_once BASE_DIR . '/app/includes/ErrorDisplay.php';
require_once BASE_DIR . '/app/core/Autoloader.php';
// echo BASE_URL;
// Xác định protocol (http/https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

// Lấy tên subfolder từ URL (nếu có)
$path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$subfolder = dirname($path) !== '.' ? dirname($path) : '';

// Tạo BASE_URL bao gồm subfolder
define('BASE_URLs', $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$app = new App();
// echo $_GET['url'];