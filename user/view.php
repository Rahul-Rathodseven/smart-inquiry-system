<?php
include '../includes/auth.php';
include '../includes/db.php';

$user_id = $_SESSION['user']['id'];

$result = $conn->query("SELECT * FROM inquiries WHERE user_id='$user_id'");

while($row = $result->fetch_assoc()) {
    echo "<h3>".$row['subject']."</h3>";
    echo "Status: ".$row['status']."<br>";

    $res = $conn->query("SELECT * FROM responses WHERE inquiry_id=".$row['id']);
    while($r = $res->fetch_assoc()) {
        echo "Reply: ".$r['response']."<br>";
    }
}
?>