<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['title'])) :
    $id = $_SESSION['user']['id'];
    $listTitle = trim($_POST['title']);
    $taskID = '';

    $query = 'INSERT INTO lists (user_id, task_id, title) VALUES (:user_id, :task_id, :title)';

    $statement = $database->prepare($query);

    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $taskID, PDO::PARAM_INT);
    $statement->bindParam(':title', $listTitle, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['list-created'] = 'The list was successfully created.';

    redirect('/lists.php');
endif;

$_SESSION['list-errors'][] = 'Something went wrong, please try again.';

redirect('/lists.php');
