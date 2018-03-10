<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

if (isset($_POST['add'])) {
    $task = htmlspecialchars($_POST['task']);
    $_SESSION['tasks'][] = $task;
}

if (isset($_POST['clear'])) {
    $_SESSION['tasks'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
</head>
<body>
    <h2>My To-Do List</h2>
    <form method="POST" action="index.php">
        <input type="text" name="task" required>
        <button type="submit" name="add">Add Task</button>
        <button type="submit" name="clear">Clear All</button>
    </form>

    <ul>
        <?php foreach ($_SESSION['tasks'] as $task): ?>
            <li><?php echo $task; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
