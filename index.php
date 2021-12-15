<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <p>ToDoList</p>
    <?php if ($_SESSION['user']) { ?><p>Welcome, <?php echo $_SESION['user']["name"]; ?> </p> <?php } ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
