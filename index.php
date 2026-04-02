<?php
require_once __DIR__ . '/includes/init.php';

if (!empty($_SESSION['user']) && !empty($_SESSION['user']['id'])) {
    redirect_to('dashboard.php');
}

redirect_to('login.php');
