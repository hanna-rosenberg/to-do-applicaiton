<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


//Delete posts in the database
if (isset($_POST['delete-list'])) :
    $listId = $_POST['delete-list'];

    $query = 'DELETE FROM lists WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();

    $query = 'DELETE FROM tasks WHERE list_id = :list_id';
    $statement = $database->prepare($query);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['list-deleted'] = 'The list was successfully deleted';

    redirect('/lists.php');
endif;
$_SESSION['errors'] = 'Something went wrong.';
// back();
redirect('/lists.php');
