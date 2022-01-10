<?php
//DONE
declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//Login the user

if (isset($_POST['email'], $_POST['password'])) :
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $_SESSION['errors'][] = 'The email adress is not a valid email adress!';
        redirect('/Test.php');
    endif;

    $query = 'SELECT * FROM users WHERE email = :email';
    $statement = $database->prepare($query);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) :
        $_SESSION['errors'][] = 'The email address or the password is incorrect.';
        redirect('/Test.php');
    endif;


    if (password_verify($password, $user['password'])) :

        unset($user['password']);

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'image' => $user['image']
        ];

        redirect('/index.php');
    elseif (!password_verify($_POST['password'], $user['password']) || $user['email'] !== $_POST['email']) :
        $_SESSION['errors'][] = 'The email address or the password is incorrect.';
        redirect('/Test.php');
    endif;

endif;
