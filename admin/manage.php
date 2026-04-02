<?php
include '../includes/auth.php';
include '../includes/db.php';

$result = $conn->query("SELECT * FROM inquiries");

while($row = $result->fetch_assoc()) {
    echo "<h3>".$row['subject']."</h3>";
    echo "Status: ".$row['status']."<br>";

    echo "<a href='reply.php?id=".$row['id']."'>Reply</a><br><br>";
}
?>