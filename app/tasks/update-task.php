<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['title'], $_POST['description'])) :
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $taskId = $_POST['edit-task'];

    if (isset($_POST['date'])) :
        if ($_POST['date'] > date('Y-m-d')) :
            $dueDate = $_POST['date'];
        else :
            $_SESSION['errors'][] = 'The date has already past, choose a later date.';
            redirect('/tasks.php');
        endif;
    endif;;

    $query = 'UPDATE tasks SET title = :title, description = :description, due_date = :due_date WHERE id = :id';

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $desctription, PDO::PARAM_STR);
    $statement->bindParam(':due_date', $dueDate, PDO::PARAM_STR);

    $statement->execute();

    $_SESSION['task-updated'] = 'Your task was successfully updated.';
    redirect('/tasks.php');
endif;

$_SESSION['errors'][] = 'Something went wrong.';

redirect('/tasks.php');
