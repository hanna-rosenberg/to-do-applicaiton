<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


//Store/insert new posts in the database

if (isset($_POST['title'])) :
    $taskTitle = trim($_POST['title']);
    $userId = $_SESSION['user']['id'];
    $taskCreated = date('Y-m-d');
    $completed = false;
    $listId = '';

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
//add the task to a list
// if (isset($_POST['list'])) :
//     $listId = $_POST['list'];
// endif;
// $listID = '1';
endif;

// die(var_dump($userId, $taskTitle, $listID, $taskDescription, $taskCreated, $dueDate, $completed));
//chaos, to do: learn mysql
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

//funkish
// $query = 'INSERT INTO tasks (user_id, title, description, created, due_date, completed) VALUES (:user_id, :title, :description, :created, :due_date, :completed)';

// $statement = $database->prepare($query);
// $statement->bindParam(':user_id', $id, PDO::PARAM_STR);
// $statement->bindParam(':title', $taskTitle, PDO::PARAM_STR);
// $statement->bindParam(':description', $taskDescription, PDO::PARAM_STR);
// $statement->bindParam(':created', $taskCreated, PDO::PARAM_STR);
// $statement->bindParam(':due_date', $dueDate, PDO::PARAM_STR);
// $statement->bindParam(':completed', $completed, PDO::PARAM_BOOL);

// $statement->execute();
// die(var_dump($statement));
// $query = 'INSERT INTO tasks (user_id, title, list_id, description, created, due_date, completed VALUES :id, :title, :list_id, :description, :created, :due_date, :completed';
// //ERROR : Uncaught Error: Call to a member function bindParam() on bool
// $statement = $database->prepare($query);
// $statement->bindParam(':id', $id, PDO::PARAM_STR);
// $statement->bindParam(':title', $taskTitle, PDO::PARAM_STR);
// $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
// $statement->bindParam(':description', $taskDescription, PDO::PARAM_STR);
// $statement->bindParam(':created', $taskCreated, PDO::PARAM_STR);
// $statement->bindParam(':due_date', $dueDate, PDO::PARAM_STR);
// $statement->bindParam(':completed', $completed, PDO::PARAM_INT);

// $statement->execute();

// $task = $statement->fetchAll(PDO::FETCH_ASSOC);

redirect('/tasks.php');
