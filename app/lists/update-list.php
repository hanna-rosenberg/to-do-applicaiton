<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['edit'])) :
    $title = trim($_POST['title']);
    $list_id = $_POST['edit'];

    $query = 'UPDATE lists SET title = :title WHERE id = :list_id';

    $statement = $database->prepare($query);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':list_id', $list_id, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['list-edited'] = 'Your list was succesfully updated.';

    redirect('/lists.php');
endif;

$_SESSION['errors'][] = 'Something when wrong.';

redirect('/lists.php');
