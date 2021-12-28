<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <?php
    $id = $_SESSION['user']['id'];
    $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

    <h1><?php echo htmlspecialchars($_SESSION['user']["name"]); ?>, your profile was successfully updated! </h1>

</article>
