<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['password'])) :
    $user_id = $_SESSION['user']['id'];

    $query = 'SELECT password from users WHERE id = :id';

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($_POST['password'], $user['password'])) :

        $_SESSION['password-errors'][] = 'You typed in the wrong password, please try again! Your account is still active.';

        redirect('/profile.php');

    else :

        $query = 'DELETE FROM users WHERE id = :id';

        $statement = $database->prepare($query);
        $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $query = 'DELETE FROM lists WHERE user_id = :user_id';
        $statement = $database->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();

        $query = 'DELETE FROM tasks WHERE user_id = :user_id';
        $statement = $database->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        unset($_SESSION['user']);
        session_destroy();

        $_SESSION['confirm'][] = 'The account was successfully deleted.';

        redirect('/login.php');

    endif;

endif;
