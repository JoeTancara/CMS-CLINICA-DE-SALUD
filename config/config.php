<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'salud_mental_cms');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

define('BASE_URL', '/salud-mental-cms');

define('SESSION_NAME', 'smcms_session');


define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEWS_PATH', APP_PATH . '/views');
define('UPLOADS_PATH', ROOT_PATH . '/uploads');
define('UPLOADS_URL', BASE_URL . '/uploads');

define('APP_DEBUG', true); 

if (APP_DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
