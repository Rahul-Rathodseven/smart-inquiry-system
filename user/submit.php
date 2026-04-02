<?php
include '../includes/auth.php';
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user']['id'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $conn->query("INSERT INTO inquiries (user_id,subject,message) VALUES ('$user_id','$subject','$message')");
}
?>

<form method="POST">
    <input name="subject" placeholder="Subject">
    <textarea name="message"></textarea>
    <button>Submit</button>
</form>