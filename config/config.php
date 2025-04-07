<?php
// config.php

// Automatically detect the base URL
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$base_url = $protocol . '://' . $host . '/ums168/';

define('BASE_URL', $base_url);

// Define the base path for file inclusions
define('BASE_PATH', realpath(__DIR__ . '/../../') . '/ums168/');