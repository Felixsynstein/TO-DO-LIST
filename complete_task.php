<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("UPDATE tasks SET is_completed = 1 WHERE id = :i");
    $stmt->bindParam(":i", $id);
    $stmt->execute();
}

header("Location: index.php");
exit();
?>
?>