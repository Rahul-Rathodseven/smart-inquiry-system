<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $name, $email, $password);
    $stmt->execute();
    $stmt->close();

    redirect_to('login.php');
}
?>

<form method="POST">
    <input name="name" placeholder="Name" required>
    <input name="email" type="email" required>
    <input name="password" type="password" required>
    <button>Register</button>
</form>
