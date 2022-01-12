<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-task'])) :
    $taskId = $_POST['delete-task'];

    $query = 'DELETE FROM tasks WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['task-deleted'] = 'The task was successfully deleted';
    redirect('/tasks.php');
endif;
$_SESSION['task-errors'] = 'Something went wrong';
// back();
redirect('/tasks.php');
