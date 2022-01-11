<?php require __DIR__ . '/navigation.php';

$query = 'SELECT * FROM lists WHERE user_id = :user_id';

$statement = $database->prepare($query);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);
$statement->execute();
$lists = $statement->fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT * FROM tasks WHERE user_id = :user_id';
$statement = $database->prepare($query);
$statement->bindParam(':user_id', $id, PDO::PARAM_INT);
$statement->execute();

$tasks = $statement->fetchAll(PDO::FETCH_ASSOC);


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
                <p class="alert alert-danger"><?= $error ?></p>
            <?php endforeach;
            unset($_SESSION['errors']);
        endif;
        if (isset($_SESSION['list-created'])) : ?>
            <p class="alert alert-success"><?php echo $_SESSION['list-created'] ?></p>
        <?php unset($_SESSION['list-created']);
        endif;
        if (isset($_SESSION['list-deleted'])) : ?>
            <p class="alert alert-success"><?php echo $_SESSION['list-deleted']; ?></p>
        <?php unset($_SESSION['list-deleted']);
        endif;
        ?>

        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']) ?>, lets create a list! </h1>
        <p><?php echo 'See all lists'; ?></p>

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
        <!-- CREATE LIST END -->

        <hr>
        <!-- SECTION SHOW LIST START -->
        <section class="show-list-container hidden">
            <!-- TOP INFO -->
            <div class="row">
                <div class="col">
                    <p>Titel</p>
                </div>
                <div class="col">
                    <p style="text-decoration: solid;">Tasks</p>
                </div>
            </div>
            <hr>
            <!-- PRINT EACH LIST -->
            <?php foreach ($lists as $list) : ?>
                <!-- col-md-push-2 col-sm-push-3 col-xs-push-0 -->
                <div class="listRow" data-id="<?php echo $list['id'] ?>">
                    <div class="row">
                        <div class="col">
                            <h4> <?php echo $list["title"]; ?></h4>
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
                            <button type="submit" name="edit" value="<?php echo $list['id'] ?>" class="btn btn-primary"> <?= $list['id'] ?></button>
                        </form>
                    </section>
                    <!-- EDIT TASK END -->

                    <!-- SHOW LIST TASK -->
                    <section class="show-list-task hidden">
                        <?php foreach ($tasks as $task) :

                        endforeach;
                        ?>


                        <input type="hidden" value="<?php echo $list['id'] ?>" name="edit-list">
                        <button type="submit" name="edit" value="<?php echo $list['id'] ?>" class="btn btn-primary"> <?= $list['id'] ?><img src="/assets/images/down-arrow.png" class="img-responsive" alt=""></button>
                        </form>
                    </section>
                    <hr>
                    <!-- SHOW LIST TASK END -->
                </div>
            <?
            endforeach;
            ?>
        </section>
    </fieldset>
</div>
</div>
<!-- </section> -->
</div>
</div>
<?php

if (!$_SESSION['user']) :
    redirect('/Test.php');
endif; ?>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>
