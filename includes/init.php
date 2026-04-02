<?php

// Show PHP errors while debugging locally in XAMPP.
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('APP_BASE_URL', '/' . basename(dirname(__DIR__)));

function app_url($path = '')
{
    $path = ltrim($path, '/');

    if ($path === '') {
        return APP_BASE_URL . '/';
    }

    return APP_BASE_URL . '/' . $path;
}

function redirect_to($path)
{
    header('Location: ' . app_url($path));
    exit();
}
