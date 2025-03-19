<?php
    include ('db.php');

    $sql = "SELECT * FROM tasks ORDER BY created_at DESC";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felix's To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    
    
    <div class="container">
        <h1>Felix's To-Do List</h1><h2>New Task</h2>
        <span class="add_task">
            <form action="add_task.php" method="POST">
                <input type="text" name="task" placeholder="Task" required>
                <button type="submit">Add Task</button>
            </form>
        </span>
        
        <h3>Task List</h3>
        <div class="task-container">
            <?php
                $task = "SELECT * FROM tasks WHERE is_completed = 0 ORDER BY created_at DESC";
                $task_result = $conn->query($task);
                foreach ($task_result as $row){
            ?>
                    <div class="Task">
                        <span><?php echo htmlspecialchars($row['task_name']); ?></span>
                        <a href="complete_task.php?id=<?php echo $row['id']; ?>" class="button complete-btn">Complete</a>
                        <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="button delete-btn">Delete</a>
                    </div>
                <?php }; ?>
        </div>

        <h3>Completed Tasks</h3>
        <div class="task-container">
            <?php
                $completed_sql = "SELECT * FROM tasks WHERE is_completed = 1 ORDER BY created_at DESC";
                $completed_result = $conn->query($completed_sql);
                foreach ($completed_result as $row){
            ?>
                    <div class="task completed">
                    <span><?php echo htmlspecialchars($row['task_name']); ?></span>
                    <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="button delete-btn">Delete</a>
                    </div>
                <?php }; ?>
        </div>
    </div>
</body>
</html>