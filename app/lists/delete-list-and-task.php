<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-all'])) :
    $listId = $_POST['delete-all'];

    $query = 'DELETE FROM lists WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();


    $query = 'DELETE FROM tasks WHERE list_id = :list_id';
    $statement = $database->prepare($query);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['list-deleted'] = 'Your list was deleted along with all its tasks.';

    redirect('/lists.php');

endif;


$_SESSION['errors'] = 'Something went wrong.';
// back();
redirect('/lists.php');
