<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

//Create list

if (isset($_POST['title'])) :
    $id = $_SESSION['user']['id'];
    $listTitle = trim($_POST['title']);
    $taskID = '';
    //Add list to database
    $query = 'INSERT INTO lists (user_id, task_id, title) VALUES (:user_id, :task_id, :title)';

    $statement = $database->prepare($query);

    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':task_id', $taskID, PDO::PARAM_INT);
    $statement->bindParam(':title', $listTitle, PDO::PARAM_STR);
    $statement->execute();

    //fetch list and then?
    $query = 'SELECT * FROM lists WHERE user_id =' . (int) $id;

    $statement = $database->prepare($query);
    $statement->execute();
    $_SESSION['list'] = $statement->fetchAll(PDO::FETCH_ASSOC);

// foreach ($lists as $key => $value) :
//     echo $value['title'];
// endforeach;
endif;
redirect('/');
