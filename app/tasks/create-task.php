<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['title'])) :
    $taskTitle = trim($_POST['title']);
    $userId = $_SESSION['user']['id'];
    $taskCreated = date('Y-m-d');
    $completed = false;

    if (isset($_POST['description'])) :
        $taskDescription = trim($_POST['description']);
    else :
        $dueDate = '';
    endif;

    if (isset($_POST['date'])) :
        if ($_POST['date'] > date('Y-m-d')) :
            $dueDate = $_POST['date'];
        else :
            $_SESSION['errors'][] = 'The date has already past, choose a later date.';
            redirect('/tasks.php');
        endif;
    else :
        $dueDate = '';
    endif;

    if (isset($_POST['list'])) :
        $listId = trim($_POST['list']);
    else :
        $listId = 0;
    endif;

endif;

$query = 'INSERT INTO tasks (user_id, title, list_id, description, created, due_date, completed) VALUES (:user_id, :title, :list_id,:description, :created, :due_date, :completed)';

$statement = $database->prepare($query);
$statement->bindParam(':user_id', $userId, PDO::PARAM_STR);
$statement->bindParam(':title', $taskTitle, PDO::PARAM_STR);
$statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
$statement->bindParam(':description', $taskDescription, PDO::PARAM_STR);
$statement->bindParam(':created', $taskCreated, PDO::PARAM_STR);
$statement->bindParam(':due_date', $dueDate, PDO::PARAM_STR);
$statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);

$statement->execute();

$query = 'SELECT * FROM tasks WHERE user_id = :user_id';
$statement = $database->prepare($query);
$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
$statement->execute();

$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

$_SESSION['task-created'] = 'A new task was created.';

redirect('/tasks.php');
