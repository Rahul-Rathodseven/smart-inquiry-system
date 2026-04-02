<?php
include '../includes/auth.php';
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = $_POST['response'];

    $conn->query("INSERT INTO responses (inquiry_id,response) VALUES ('$id','$response')");
    $conn->query("UPDATE inquiries SET status='Resolved' WHERE id='$id'");

    header("Location: manage.php");
}
?>

<form method="POST">
    <textarea name="response"></textarea>
    <button>Send Reply</button>
</form>