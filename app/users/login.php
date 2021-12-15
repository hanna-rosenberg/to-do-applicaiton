<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$errors = [];

//Login the user

if (isset($_POST['email'], $_POST['password'])) :
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $error[] = 'The email adress is not a valid email adress!';
    endif;
endif;

$query = 'SELECT * FROM users WHERE email = :email';
$statement = $database->prepare($query);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if ($email === $user['email'] && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email'],
    ];

    redirect('/');
} else {
    redirect('/about.php');
}
