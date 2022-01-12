<?php
//DONE
declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['password-repeat'])) :
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];

    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user['email'] === $email) :
        $_SESSION['errors'][] = 'This email is aldready registered!';

        redirect('/register.php');
    endif;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $_SESSION['errors'][] = 'The email adress is not a valid email adress!';
    endif;

    if ($password != $passwordRepeat) :
        $_SESSION['errors'][] = 'The password do not match!';
    else :
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$number || !$specialChars || strlen($password) < 8) :
            $_SESSION['errors'][] = 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character!';
        else :
            $hashPassword = password_hash($password, PASSWORD_BCRYPT);

            $image = '/uploads/profile-placeholder-img.jpg';

            $query = 'INSERT INTO users (name, email, password, image) VALUES (:name, :email, :password, :image)';

            $statement = $database->prepare($query);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            $_SESSION['confirm'][] = 'Your registration was succesfull, you can now login!';
            redirect('/login.php');
        endif;
    endif;
endif;

redirect('/register.php');

require __DIR__ . '/views/footer.php';
