<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['delete-list'])) :
    $listId = $_POST['delete-list'];

    $query = 'DELETE FROM lists WHERE id = :id';
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['list-deleted'] = 'The list was successfully deleted';

    redirect('/lists.php');
endif;

$_SESSION['errors'] = 'Something went wrong.';
// back();
redirect('/lists.php');
