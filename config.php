<?php
// config.php
session_start();

define('DB_HOST', 'localhost');
define('DB_NAME', 'fuchka_muchka');
define('DB_USER', 'root');
define('DB_PASS', ''); // যদি পাসওয়ার্ড থাকে সেটা দাও

define('BASE_URL', 'http://localhost/fuchka_muchka/');

date_default_timezone_set('Asia/Dhaka');
