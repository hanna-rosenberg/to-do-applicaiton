<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$errors = [];

//Register the user

if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password-repeat'])) :

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    //Check if email already exists?
    // if (checkEmail($database, $email) !== false) :
    //     redirect('/../../register.php');
    // endif;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $error[] = 'The email adress is not a valid email adress!';
        die(var_dump('Invalid email'));
    endif;

    if ($password != $passwordRepeat) :
        $error[] = 'The password do not match';
        die(var_dump('Password do not match'));
    endif;

    $uppercase = preg_match('@[A-Z]@', $password);
    // $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$number || !$specialChars || strlen($password) < 8) :
        echo 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.';
        die(var_dump('The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.'));
    else :
        // echo 'Password accepted.';
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    endif;
endif;
// die(var_dump('almost there'));
$query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

$statement = $database->prepare($query);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);

$statement->execute();
// die(var_dump('almost there'));
redirect('/../../login.php');


require __DIR__ . '/../../views/footer.php';
