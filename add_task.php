<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $task = $_POST['task'];

        $stmt = $conn->prepare("INSERT INTO tasks(task_name) VALUES (:s)");
        $stmt->bindParam(":s", $task);
        try{
            $stmt->execute();
        }catch(\Throwables $e){
            echo "Something went wrong".$e;

        }
    
    
}

header("Location: index.php");
exit();
?>