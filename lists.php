<?php require __DIR__ . '/navigation.php';

$tasks = get_all_tasks($database);
?>
<div class="content-panel">
    <h2 class="title">Lists</h2>
    <fieldset class="fieldset">
        <h3 class="fieldset-title">All Lists</h3>
        <div class="form-group avatar">
            <figure class="figure col-md-2 col-sm-3 col-xs-12">
                <img class="img-rounded img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
            </figure>
        </div>
        <?php
        if (isset($_SESSION['errors'])) :
            foreach ($_SESSION['errors'] as $error) : ?>
                <p class="alert alert-danger"><?php htmlspecialchars($error); ?></p>
            <?php endforeach;
            unset($_SESSION['errors']);
        endif;
        if (isset($_SESSION['list-created'])) : ?>
            <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['list-created']); ?></p>
        <?php unset($_SESSION['list-created']);
        endif;
        if (isset($_SESSION['list-edited'])) : ?>
            <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['list-edited']); ?></p>
        <?php unset($_SESSION['list-edited']);
        endif;
        if (isset($_SESSION['list-deleted'])) : ?>
            <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['list-deleted']); ?></p>
        <?php unset($_SESSION['list-deleted']);
        endif;
        ?>

        <h3 class="title"><?php echo htmlspecialchars($_SESSION['user']['name']); ?>, lets create a list to get more structured! </h3>
        <div class="form-group">
            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                <button class="btn btn-primary all-lists">All Lists +</button>
                <button type="submit" name="create-lists" class="btn btn-primary create-lists">Create list +</button>
            </div>
        </div>

        <!-- CREATE LIST -->
        <section class="create-list-container hidden">
            <form action="app/lists/create-list.php" method="post">
                <div class="list-form">
                    <label for="title">List title</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="List name:" required>
                    <small class="form-text">Please set at title for your list.</small>
                </div>
                <button type="submit" class="btn btn-primary">Add new list</button>
            </form>
        </section>
        <hr>

        <section class="show-list-container hidden">
            <?php $lists = get_all_lists($database);
            foreach ($lists as $list) : ?>

                <div class="listRow" data-id="<?php echo $list['id'] ?>">
                    <div class="row align-items-center">
                        <div class="col">
                            <span>Title</span>
                            <h4> <?php echo htmlspecialchars($list["title"]); ?></h4>
                        </div>
                        <div class="col show-task">
                            <button type="submit" class="show-task btn"><img src="/assets/images/down-arrow.png" class="img-responsive" alt=""></button>
                        </div>
                        <div class="col-md-push-2 col-sm-push-3 col-xs-push-0">

                            <button type="submit" name="edit-list" class="editListBtn btn btn-sm img-responsive"><img src="/assets/images/edit.png" class="img-responsive" value="<?= $list['id'] ?>"></button>

                            <form action="/app/lists/delete-list.php" method="POST">
                                <input type="hidden" value="<?php echo $list['id'] ?>" name="delete-list">
                                <button type="submit" name="delete" class="deleteBtn btn btn-sm img-responsive"><img src="/assets/images/bin.png" value="<?= $list['id'] ?>"></button>
                            </form>

                        </div>
                    </div>

                    <!-- EDIT TASK -->
                    <section class="edit-list-container hidden">
                        <form action="/app/lists/update-list.php" method="post">
                            <div class="task-form">
                                <label for="title">List title</label>
                                <input class="form-control" type="text" name="title" id="title" placeholder="List title:" required>
                                <small class="form-text">Please set at title for your list.</small>
                            </div>
                            <input type="hidden" value="<?php echo $list['id'] ?>" name="edit-list">
                            <button type="submit" name="edit" value="<?php echo $list['id'] ?>" class="btn btn-primary">Edit list</button>
                        </form>
                    </section>

                    <section class="show-list-task hidden">
                        <?php foreach ($tasks as $task) :

                            if ($list['id'] == $task['list_id']) : ?>
                                <div class="col-sm-6">

                                    <p>- <?php echo htmlspecialchars($task['title']); ?> <br></p>

                                </div>
                            <?php endif; ?>
                        <?php
                        endforeach;
                        ?>
                        <form action="/app/lists/delete-list-and-task.php" method="post">
                            <input type="hidden" value="<?php echo $list['id'] ?>" name="delete-all">
                            <button type="submit" name="delete-all" value="<?php echo $list['id'] ?>" class="btn btn-danger">Delete list</button>
                            <small class="form-text">Delete list along with all its tasks.</small>
                        </form>

                    </section>
                    <hr>

                </div>
            <?php
            endforeach;
            ?>
        </section>
    </fieldset>
</div>
</div>
</div>
</div>
<?php

if (!$_SESSION['user']) :
    redirect('/Test.php');
endif; ?>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>
