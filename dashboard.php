<?php
include 'includes/auth.php';

$user = $_SESSION['user'];
$userName = $user['name'] ?? 'User';
$userRole = $user['role'] ?? 'user';

echo "<h2>Welcome " . htmlspecialchars($userName) . "</h2>";

if ($userRole === 'admin') {
    echo "<a href='" . app_url('admin/manage.php') . "'>Manage Inquiries</a>";
} else {
    echo "<a href='" . app_url('user/submit.php') . "'>Submit Inquiry</a><br>";
    echo "<a href='" . app_url('user/view.php') . "'>View My Inquiries</a>";
}

echo "<br><a href='" . app_url('logout.php') . "'>Logout</a>";
?>
