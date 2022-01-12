<?php require __DIR__ . '/navigation.php';

if ($_SESSION) :
?>
    <div class="content-panel">
        <h2 class="title">Index</h2>
        <fieldset class="fieldset">
            <h3 class="fieldset-title">All lists and tasks</h3>
            <div class="form-group avatar">
                <figure class="figure col-md-2 col-sm-3 col-xs-12">
                    <img class="img-rounded img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
                </figure>
            </div>

            <h1>Due date</h1>
            <div class="form-group">
                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                    <button class="btn btn-primary all-tasks">Due day tasks +</button>
                </div>
            </div>
            <hr>

            <section class="show-task-container hidden">
                <?php
                $tasks = due_date($database);
                foreach ($tasks as $task) : ?>

                    <div class="taskRow" data-id="<?php echo $task['id'] ?>">
                        <div class="row align-items-center">
                            <div class="col">
                                <span>Title</span>
                                <h5><?php echo htmlspecialchars($task["title"]); ?></h5>
                            </div>
                            <div class="col">
                                <span>Due date</span>
                                <p class="bold"> <?php echo htmlspecialchars($task["due_date"]); ?></p>
                            </div>

                            <div class="col-md-push-2 col-sm-push-1 col-xs-push-0">

                                <button type="submit" name="edit-task" class="editBtn btn btn-form btn-sm img-responsive"><img src="/assets/images/edit.png" class="img-responsive" value="<?= $task['id'] ?>"></button>

                                <form action="/app/tasks/delete-task.php" method="POST">
                                    <input type="hidden" value="<?php echo $task['id'] ?>" name="delete-task">
                                    <button type="submit" name="delete" class="deleteBtn btn btn-form btn-sm img-responsive"><img src="/assets/images/bin.png" value="<?= $task['id'] ?>"></button>
                                </form>
                            </div>
                        </div>

                        <!-- EDIT TASK -->
                        <section class="edit-task-container hidden">
                            <form action="/app/tasks/update-task.php" method="post">
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
                                <input type="hidden" value="<?php echo $task['id'] ?>" name="edit-task">
                                <button type="submit" name="edit" value="<?php echo $task['id'] ?>" class="btn btn-primary"> <?= $task['id'] ?></button>
                            </form>
                        </section>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </section>
        </fieldset>
    </div>
    </div>
    </div>
    </div>
<?php
endif;
if (!$_SESSION['user']) :
    redirect('/login.php');
endif; ?>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>
