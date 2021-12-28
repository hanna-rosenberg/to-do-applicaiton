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

    // $query = 'SELECT * FROM users WHERE email LIKE :email';
    // $statement = $database->prepare($query);
    // $statement->bindParam(':email', $email, PDO::PARAM_STR);
    // $statement->execute();

    // $usedEmail = $statement->fetchAll(PDO::FETCH_ASSOC);

    // if ($email = $usedEmail) :
    //     $error[] = 'The email is already registered';
    //     echo 'The email is already registered';
    // else :



    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $error[] = 'The email adress is not a valid email adress!';
    // echo $error[0];
    endif;

    if ($password != $passwordRepeat) :
        $error[] = 'The password do not match';
    // echo $error[1];
    else :
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    endif;

// $uppercase = preg_match('@[A-Z]@', $password);
// // $lowercase = preg_match('@[a-z]@', $password);
// $number = preg_match('@[0-9]@', $password);
// $specialChars = preg_match('@[^\w]@', $password);

// if (!$uppercase || !$number || !$specialChars || strlen($password) < 8) :
//     $error[] = 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.';
// die(var_dump('The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.'));
// else :
// echo 'Password accepted.';
// $hashPassword = password_hash($password, PASSWORD_BCRYPT);
// endif;
// echo $error[];
endif;
// die(var_dump('almost there'));
$query = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';

$statement = $database->prepare($query);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);

$statement->execute();

// $query = $database->prepare("SELECT * FROM users WHERE name = :name  AND email = :email ORDER by id");

// $statement->bindParam(':name', $name, PDO::PARAM_STR);
// $statement->bindParam(':email', $email, PDO::PARAM_STR);
// $statement->execute();

// $user = $statement->fetchAll(PDO::FETCH_ASSOC);
// die(var_dump($user));

// if ($user > 0) :





// endif;
// die(var_dump('almost there'));
redirect('/../../login.php');


require __DIR__ . '/../../views/footer.php';
