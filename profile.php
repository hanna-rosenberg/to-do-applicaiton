<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$id = $_SESSION['user']['id'];
$statement = $database->prepare('SELECT * FROM users WHERE id = :id');
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<article>

    <article class="update-profile-container ">

        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <img class="img-profile img-circle img-responsive center-block" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
                                <ul class="meta list list-unstyled">
                                    <li class="name">Name
                                        <label class="label label-info">Role</label>
                                    </li>
                                    <li class="email"><a href="#">Link</a></li>
                                    <li class="activity">Last logged in</li>
                                </ul>
                            </div>
                            <nav class="side-menu">
                                <ul class="nav">
                                    <li class="active"><a href="#"><span class="fa fa-user"></span> Profile</a></li>
                                    <li><a href="#"><span class="fa fa-cog"></span> Task</a></li>
                                    <li><a href="#"><span class="fa fa-credit-card"></span> Lists</a></li>
                                    <li><a href="#"><span class="fa fa-envelope"></span> Messages</a></li>

                                    <li><a href="user-drive.html"><span class="fa fa-th"></span> Drive</a></li>
                                    <li><a href="#"><span class="fa fa-clock-o"></span> Completed</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="content-panel">
                            <h2 class="title">Profile</h2>
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Personal Info</h3>
                                <div class="form-group avatar">
                                    <figure class="figure col-md-2 col-sm-3 col-xs-12">
                                        <img class="img-rounded img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
                                    </figure>
                                    <form action="app/users/imageUpload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-inline col-md-10 col-sm-9 col-xs-12">
                                            <input type="file" name="profile-pic" id="profile-pic" class="file-uploader pull-left" accept="image/png, image/jpeg, image/jpg, image/gif">

                                            <button type="submit" class="btn btn-sm btn-default-alt pull-left">Update Image</button>
                                        </div>
                                </div>
                                </form>
                                <?php
                                if (isset($_SESSION['update-errors'])) :
                                    foreach ($_SESSION['update-errors'] as $error) : ?>
                                        <p class="alert alert-danger"><?= $error ?></p>
                                <?php endforeach;
                                    unset($_SESSION['update-errors']);
                                endif;
                                ?>
                                <?php
                                if (isset($_SESSION['confirm'])) : ?>
                                    <p class="alert alert-success"><?php echo $_SESSION['confirm'] ?></p>
                                <?php unset($_SESSION['confirm']);
                                endif;
                                ?>
                                <?php
                                if (isset($_SESSION['password-errors'])) :
                                    foreach ($_SESSION['password-errors'] as $error) : ?>
                                        <p class="alert alert-danger"><?= $error ?></p>
                                <?php endforeach;
                                    unset($_SESSION['password-errors']);
                                endif;
                                ?>
                                <?php
                                if (isset($_SESSION['password_updated'])) : ?>
                                    <p class="alert alert-success"><?php echo $_SESSION['password_updated'] ?></p>
                                <?php unset($_SESSION['password_updated']);
                                endif;
                                ?>
                                <?php
                                if (isset($_SESSION['image_errors'])) :
                                    foreach ($_SESSION['image_errors'] as $error) : ?>
                                        <p class="alert alert-danger"><?= $error ?></p>
                                <?php endforeach;
                                    unset($_SESSION['image_errors']);
                                endif;
                                ?>
                                <?php
                                if (isset($_SESSION['confirm-email'])) : ?>
                                    <p class="alert alert-success"><?php echo $_SESSION['confirm-email'] ?></p>
                                <?php unset($_SESSION['confirm-email']);
                                endif;
                                ?>
                                <form action="app/users/update2.php" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="email" class="form-control" name="updated-email" id="email" placeholder="Email" required>
                                            <small class="form-text">Please provide your new email adress</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="updated-pwd" id="password" placeholder="New password">
                                            <small class="form-text">Please provide your new password (passphrase)</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Repeat password</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="repeate-updated-pwd" id="password" placeholder="Confirm new password">
                                            <small class="form-text">Please confirm your new password (passphrase)</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Confirm with old password</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="old-pwd" id="password" placeholder="Old password">
                                            <small class="form-text">Please confirm with old password. (passphrase)</small>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                            <!-- <input class="btn btn-primary" type="submit" value="Update Profile"> -->
                                            <button type="submit" name="submit" class="btn btn-form">Update profile</button>
                                </form>
                        </div>
                    </div>
                    </fieldset>
            </div>
        </div>
        </section>
        </div>
        </div>
    </article>
    <?php require __DIR__ . '/views/footer.php';
    ?>
