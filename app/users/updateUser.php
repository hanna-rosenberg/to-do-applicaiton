<?

declare(strict_types=1);
//TELL THE USER IF PASSWORD WASN'T REPEATED
//Add confirm with old password then log out user
require __DIR__ . '/../autoload.php';


//Change variable names and create a function?
if (isset($_POST['updated-email'], $_POST['updated-pwd'], $_POST['repeate-updated-pwd'], $_POST['old-pwd'])) :
    $id = $_SESSION['user']['id'];
    $email = trim($_POST['updated-email']);
    $updPwd = $_POST['updated-pwd'];
    $updPwdRep = $_POST['repeate-updated-pwd'];
    $oldPwd = $_POST['old-pwd'];
    $query = 'SELECT password from users WHERE id = :id';

    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (password_verify($oldPwd, $user['password'])) :

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            $error[] = 'The email adress is not a valid email adress!';
            die(var_dump('Invalid email'));
        endif;

        if ($updPwd != $updPwdRep) :
            $error[] = 'The password do not match';
            die(var_dump('Password do not match'));
        else :
            $hashPassword = password_hash($updPwd, PASSWORD_BCRYPT);
        endif;
        //LÄgg till att gammalt lösen krävs

        //SECURE PASSWORD!

        // $uppercase = preg_match('@[A-Z]@', $updPwd);
        // // $lowercase = preg_match('@[a-z]@', $password);
        // $number = preg_match('@[0-9]@', $updPwd);
        // $specialChars = preg_match('@[^\w]@', $updPwd);

        // if (!$uppercase || !$number || !$specialChars || strlen($updPwd) < 8) :
        //     echo 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.';
        // else :
        //     // echo 'Password accepted.';
        //     $hashPassword = password_hash($updPwd, PASSWORD_BCRYPT);
        // endif;


        $query = 'UPDATE users SET email = :email, password = :password WHERE id = :id';

        $statement = $database->prepare($query);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

    else :
        die(var_dump('not valid'));
    endif;
endif;
redirect('/index.php');
