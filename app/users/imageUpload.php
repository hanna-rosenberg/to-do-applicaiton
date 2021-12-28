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
                echo 'success';
            else :
                echo 'Your file is too big!';
            endif;
        else :
            echo 'There was an error uploading your file!';
        endif;
    else :
        echo 'The file type is not allowed!';
    endif;
endif;
