<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['profile-pic'])) :
    $avatar = $_FILES['profile-pic'];
    $avatarExtension = explode('.', $avatar['name']);
    $avatarActualExtension = strtolower(end($avatarExtension));
    $allowedFiles = array('jpeg', 'jpg', 'gif', 'png');

    if (in_array($avatarActualExtension, $allowedFiles)) :
        if ($avatar['error'] === 0) :
            if ($avatar['size'] < 16000000) :
                $fileName = date('y-m-d') . '-' . $avatar['name'];
                $destination = __DIR__ . '/../../uploads/' . $fileName;
                move_uploaded_file($avatar['tmp_name'], $destination);

                $id = $_SESSION['user']['id'];
                $path = '/../../uploads/' . $fileName;

                $query = 'UPDATE users SET image = :path WHERE id = :id';
                $statement = $database->prepare($query);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->bindParam(':path', $path, PDO::PARAM_STR);
                $statement->execute();

                $_SESSION['user']['image'] = $path;

                $_SESSION['confirm'] = 'Profile image uploaded!';
                redirect('/profile.php');
            else :
                $_SESSION['image_errors'][] = 'Your file is too big!';
                redirect('/profile.php');
            endif;
        else :
            $_SESSION['image_errors'][] = 'There was an error uploading your file!';
            redirect('/profile.php');
        endif;
    else :
        $_SESSION['image_errors'][] = 'The file type is not allowed!';
        redirect('/profile.php');
    endif;
endif;
