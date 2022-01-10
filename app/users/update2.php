<?

declare(strict_types=1);
//TELL THE USER IF PASSWORD WASN'T REPEATED
//Add confirm with old password then log out user
//Secure password por favor
//Can still get same email!!!
require __DIR__ . '/../autoload.php';


$id = $_SESSION['user']['id'];

if (isset($_POST['submit'])) :


    if (empty($_POST['old-pwd'])) :
        $_SESSION['update-errors'][] = 'Please confirm the updates by typing in your old password!';

        redirect('/profile.php');
    endif;
    //kolla confirm med lösenord
    $query = 'SELECT password from users WHERE id = :id';

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($_POST['old-pwd'], $user['password'])) :
        $_SESSION['password-errors'][] = 'You typed in the wrong password, please try again!';

        redirect('/profile.php');

    endif;
    if (isset($_POST['updated-email'])) :
        $email = trim($_POST['updated-email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            $_SESSION['update-errors'][] = 'The email adress is not a valid email adress!';
        endif;

        $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user['email'] === $email) :
            $_SESSION['update-errors'][] = 'This email is aldready registered!';

            redirect('/profile.php');
        endif;

        $statement = $database->prepare('UPDATE users SET email = :email WHERE id = :id');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $_SESSION['confirm-email'] = 'Your e-mail was successfully updated!';
    endif;


    if (isset($_POST['updated-pwd'], $_POST['repeate-updated-pwd'])) :
        $updPwd = $_POST['updated-pwd'];
        $updPwdRep = $_POST['repeate-updated-pwd'];

        if ($updPwd != $updPwdRep) :
            $_SESSION['password-errors'][] = 'No match my man!';
            redirect('/profile.php');
        endif;
        $uppercase = preg_match('@[A-Z]@', $updPwd,);
        $lowercase = preg_match('@[a-z]@', $updPwd,);
        $number = preg_match('@[0-9]@', $updPwd,);
        $specialChars = preg_match('@[^\w]@', $updPwd,);

        if (!$uppercase || !$number || !$specialChars || strlen($updPwd,) < 8) :
            $_SESSION['errors'][] = 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character!';
            redirect('/profile.php');
        else :
            $hashPassword = password_hash($updPwd, PASSWORD_BCRYPT);

            $query = 'UPDATE users SET password = :password WHERE id = :id';

            $statement = $database->prepare($query);
            $statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

            $_SESSION['confirm'] = 'Your password was succesfully updated!';

            redirect('/profile.php');
        endif;
    endif;
    redirect('/profile.php');
endif;


//     if (isset($_POST['updated-pwd'], $_POST['repeate-updated-pwd'], $_POST['old-pwd'])) :
//         $updPwd = $_POST['updated-pwd'];
//         $updPwdRep = $_POST['repeate-updated-pwd'];
//         $oldPwd = $_POST['old-pwd'];
//         $query = 'SELECT password from users WHERE id = :id';

//         $statement = $database->prepare($query);
//         $statement->bindParam(':id', $id, PDO::PARAM_INT);
//         $statement->execute();

//         $user = $statement->fetch(PDO::FETCH_ASSOC);

//         if (password_verify($oldPwd, $user['password'])) :


//             if ($updPwd != $updPwdRep) :
//                 $error[] = 'The password do not match';
//                 die(var_dump('Password do not match'));
//             else :
//                 $hashPassword = password_hash($updPwd, PASSWORD_BCRYPT);
//             endif;
//             //LÄgg till att gammalt lösen krävs

//             //SECURE PASSWORD!

//             // $uppercase = preg_match('@[A-Z]@', $updPwd);
//             // // $lowercase = preg_match('@[a-z]@', $password);
//             // $number = preg_match('@[0-9]@', $updPwd);
//             // $specialChars = preg_match('@[^\w]@', $updPwd);

//             // if (!$uppercase || !$number || !$specialChars || strlen($updPwd) < 8) :
//             //     echo 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.';
//             // else :
//             //     // echo 'Password accepted.';
//             //     $hashPassword = password_hash($updPwd, PASSWORD_BCRYPT);
//             // endif;


//             $query = 'UPDATE users SET email = :email, password = :password WHERE id = :id';

//             $statement = $database->prepare($query);
//             $statement->bindParam(':email', $email, PDO::PARAM_STR);
//             $statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);
//             $statement->bindParam(':id', $id, PDO::PARAM_INT);

//             $statement->execute();


//         else :
//             die(var_dump('not valid'));
//         endif;
//     endif;
//     redirect('/index.php');
// endif;
