<?php require __DIR__ . '/navigation.php';

$query = 'SELECT * FROM tasks WHERE user_id = :user_id';
$statement = $database->prepare($query);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);
$statement->execute();

$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="content-panel">
    <h2 class="title">Tasks</h2>
    <fieldset class="fieldset">
        <h3 class="fieldset-title">All tasks</h3>
        <div class="form-group avatar">
            <figure class="figure col-md-2 col-sm-3 col-xs-12">
                <img class="img-rounded img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
            </figure>

        </div>
        <?php
        if (isset($_SESSION['errors'])) :
            foreach ($_SESSION['errors'] as $error) : ?>
                <p class="alert alert-danger"><?= $error ?></p>
            <?php endforeach;
            unset($_SESSION['errors']);
        endif;
        if (isset($_SESSION['task-created'])) : ?>
            <p class="alert alert-success"><?php echo $_SESSION['task-created'] ?></p>
        <?php unset($_SESSION['task-created']);
        endif;
        ?>

        <!-- CONTENT -->
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']) ?>, lets create a task! </h1>

        <div class="form-group">
            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                <button class="btn btn-primary all-tasks">All Tasks +</button>
                <button class="btn btn-primary create-task">Create Task +</button>
            </div>
        </div>
        <!-- CREATE TASK -->
        <section class="create-task-container hidden">
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
        <!-- CREATE TASK END -->
        <!-- SECTION START -->
        <section class="show-task-container hidden">
            <!-- TOP INFO -->
            <div class="row">
                <div class="col">
                    <p>Titel</p>
                </div>
                <div class="col">
                    <p style="text-decoration: solid;">Due date</p>
                </div>
            </div>
            <hr>
            <!-- PRINT EACH TASK -->
            <?php foreach ($tasks as $task) : ?>
                <!-- col-md-push-2 col-sm-push-3 col-xs-push-0 -->
                <div class="taskRow">
                    <div class="row">
                        <div class="col">
                            <h4> <?php echo $task["title"]; ?></h4>
                        </div>
                        <div class="col">
                            <p> <?php echo $task["due_date"]; ?></p>
                        </div>
                        <div class="col-md-push-2 col-sm-push-3 col-xs-push-0">

                            <button type="submit" name="edit-task" class="editBtn btn btn-primary btn-sm img-responsive"><img src="/assets/images/edit.png" class="img-responsive" value="<?= $task['id'] ?>"><? echo $task['id'] ?></button>


                            <form action="/app/tasks/delete-task.php" method="POST">
                                <input type="hidden" value="<? $task['id'] ?>" name="delete-task">
                                <button type="submit" name="delete-task" class="deleteBtn btn btn-danger btn-sm img-responsive"><img src="/assets/images/bin.png" value="<?= $task['id'] ?>"><? echo $task['id'] ?></button>
                            </form>
                        </div>
                    </div>

                    <!-- EDIT TASK -->
                    <section class="edit-task-container hidden">
                        <form action="app/tasks/update-task.php" method="post">
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
                            <button type="submit" name="submit" value="<?= $task['id'] ?>" class="btn btn-primary"> <?= $task['id'] ?></button>
                        </form>
                    </section>
                    <hr>
                    <!-- EDIT TASK END -->
                </div>
            <?
            endforeach;
            ?>
        </section>


        <!-- value=<? $task['id'] ?>  -->
        <!-- onClick=submit();  -->

        <!-- <img src="/assets/images/bin.png" class="img-responsive" alt="" onclick="deleteTask()"> -->

        <!-- <img src="/assets/images/edit.png" class="img-responsive" alt="" onclick="editTask()"> -->
        <!-- </form> -->
        <!-- <form class="done-form" action="/app/tasks/done.php" method="POST">
                            <input type="hidden" id="done_id" name="done_id" value="<?= $task['id'] ?>">
                            <input class="form-check-input" type="checkbox" name="is_completed" id='1'> -->
        <!-- <label for="is_completed"><?= htmlspecialchars($task['title']); ?></label>
                        </form>  -->



        <!-- </section> -->

        <!-- </div> End of content panel  -->
        <?

        // endif;
        ?>

        <!-- <?
                if (isset($_POST['add-task'])) :
                ?>
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

?> -->

</div>
</fieldset>
</div>
</div>
</div>
<?php

if (!$_SESSION['user']) :
    redirect('/login.php');
endif; ?>

</article>
<?php require __DIR__ . '/views/footer.php'; ?>
