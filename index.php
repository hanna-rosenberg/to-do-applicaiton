<?php require __DIR__ . '/navigation.php' ?>

<div class="content-panel">
    <h2 class="title">Index</h2>
    <fieldset class="fieldset">
        <h3 class="fieldset-title">All lists and tasks</h3>
        <div class="form-group avatar">
            <figure class="figure col-md-2 col-sm-3 col-xs-12">
                <img class="img-rounded img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
            </figure>


        </div>

        <h1> Print todays tasks</h1>
        <hr>
        <div class="form-group">
            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                <input class="btn btn-primary" type="submit" value="Update Profile">
                <button type="submit" name="submit" class="btn btn-form">Update profile</button>
                </form>
            </div>

    </fieldset>
</div>
</div>
</section>
</div>
</div>


<h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?> </h1>

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
            <div class="list-form">
                <label for="description">Task description</label>
                <input class="form-control" type="text" name="description" id="description">
                <small class="form-text">Please describe the task at hand.</small>
            </div>
            <div class="task-form">
                <label for="date">Due date</label>
                <input class="form-control" type="date" name="date" id="date">
                <small class="form-text">Set a due date for your task.</small>
            </div>
            <button type="submit" class="btn btn-primary">Add list</button>
        </form>
    </section>
<?
endif;

if (!$_SESSION['user']) :
    // die(var_dump('hej'));
    redirect('/about.php');
endif; ?>
</article>

<?php require __DIR__ . '/views/footer.php'; ?>
