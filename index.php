<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <?php if ($_SESSION['user']) :

        $id = $_SESSION['user']['id'];
        $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC); ?>

        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']["name"]); ?> </h1>

        <form action="/index.php" method="post">
            <button type="submit" name="add-task" class="open-create-task-btn">Add task +</button>
        </form>
        <form action="/index.php" method="post">
            <button type="submit" name="create-list" class="open-create-list-btn">Create List +</button>
        </form>
        <?
        if (isset($_POST['add-task'])) : ?>
            <section class="create-task-container">
                <form action="app/tasks/create-task.php" method="post">
                    <div class="task-form">
                        <label for="title">Task title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="To do:" required>
                        <small class="form-text">Please set at title for your task.</small>
                    </div>
                    <div class="task-form">
                        <label for="description">Task description</label>
                        <input class="form-control" type="text" name="description" id="description">
                        <small class="form-text">Please describe the task at hand.</small>
                    </div>
                    <div class="task-form">
                        <label for="date">Due date</label>
                        <input class="form-control" type="date" name="date" id="date">
                        <small class="form-text">Set a due date for your task.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Add task</button>
                </form>
            </section>
        <?
        endif;

        if (isset($_POST['create-list'])) : ?>
            <section class="create-list-container hidden">
                <form action="app/lists/create-list.php" method="post">
                    <div class="list-form">
                        <label for="title">List title</label>
                        <input class="form-control" type="text" name="title" id="title" placeholder="List name:" required>
                        <small class="form-text">Please set at title for your list.</small>
                    </div>
                    <!-- <div class="list-form">
                        <label for="description">Task description</label>
                        <input class="form-control" type="text" name="description" id="description">
                        <small class="form-text">Please describe the task at hand.</small>
                    </div>
                    <div class="task-form">
                        <label for="date">Due date</label>
                        <input class="form-control" type="date" name="date" id="date">
                        <small class="form-text">Set a due date for your task.</small>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Add list</button>
                </form>
            </section>
        <?
        endif;
        ?>
    <?php else : ?>
        <h1><?php echo $config['title']; ?></h1>
        <p>Heli Do</p>
    <?php endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>

<!-- Placeholder bild i profilen
     Ladda upp ny bild, placera i profilen samt i mapp. Gitignore

     Delete task
     Update task
     Move task

     Delete List
     Update list

     Utseende?


