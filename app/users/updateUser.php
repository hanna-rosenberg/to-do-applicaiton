<?

declare(strict_types=1);

require __DIR__ . '/../autoload.php';
//Change variable names and create a function?
if (isset($_POST['updated-email'], $_POST['updated-pwd'], $_POST['repeat-updated-pwd'])) :
    $id = $_SESSION['user']['id'];
    $email = trim($_POST['updated-email']);
    $updPwd = $_POST['updated-pwd'];
    $updPwdRep = $_POST['repeat-updated-pwd'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
        $error[] = 'The email adress is not a valid email adress!';
        die(var_dump('Invalid email'));
    endif;

    if ($updPwd != $updPwdRep) :
        $error[] = 'The password do not match';
        die(var_dump('Password do not match'));
    endif;

    $uppercase = preg_match('@[A-Z]@', $password);
    // $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$number || !$specialChars || strlen($password) < 8) :
        echo 'The password should contain atleast 8 characters and should include at least one uppercase letter, one number, and one special character.';
    else :
        // echo 'Password accepted.';
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
    endif;
endif;

//Ta reda på felet i denna queryn
$query = 'UPDATE users SET email = :email, password = :password, WHERE id = :id';

$statement = $database->prepare($query);
$statement->bindParam(':email', $email, PDO::PARAM_STR);
$statement->bindParam(':password', $hashPassword, PDO::PARAM_STR);
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();
