<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :i");
    $stmt->bindParam(":i", $id);
    $stmt->execute();
}

header("Location: index.php");
exit();
?>