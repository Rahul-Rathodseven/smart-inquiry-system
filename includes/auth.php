<?php
require_once __DIR__ . '/init.php';

if (empty($_SESSION['user']) || empty($_SESSION['user']['id'])) {
    redirect_to('login.php');
}
?>
