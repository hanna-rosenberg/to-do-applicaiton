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
        <!-- <h2>Update Account</h2>
        <form action="app/users/update2.php" method="post">
            <div class="register-form">
                <label for="email">Update Email</label>
                <input type="email" class="form-control" name="updated-email" id="email" placeholder="Email" required>
                <small class="form-text">Please provide your new email adress</small>
            </div>
            <div class="login-form">
                <label for="password">Password</label><input type="password" class="form-control" name="updated-pwd" id="password" placeholder="New password">
                <small class="form-text">Please provide your new password (passphrase)</small>
            </div>
            <div class="login-form">
                <label for="password">Password</label><input type="password" class="form-control" name="repeate-updated-pwd" id="password" placeholder="Confirm new password">
                <small class="form-text">Please confirm your new password (passphrase)</small>
            </div>
            <div class="login-form">
                <label for="password">Old password</label><input type="password" class="form-control" name="old-pwd" id="password" placeholder="Old password">
                <small class="form-text">Please confirm with old password. (passphrase)</small>
            </div>
            <button type="submit" name="submit" class="btn btn-form">Update profile</button>
        </form>

        <form action="app/users/imageUpload.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="avatar">Upload profile picture</label>
                <input class="form-control" type="file" name="profile-pic" id="profile-pic" accept="image/png, image/jpeg, image/jpg, image/gif">
                <small class="form-text">Choose your image.</small>
            </div>
            <button type="submit" class="btn btn-primary">Update profile images</button>
        </form>
        <div> -->


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
                            <h2 class="title">Sign Up</h2>
                            <fieldset class="fieldset">
                                <h3 class="fieldset-title">Register User</h3>
                                <?php
                                if (isset($_SESSION['errors'])) :
                                    foreach ($_SESSION['errors'] as $error) : ?>
                                        <p class="alert alert-danger"><?= $error ?></p>
                                <?php endforeach;
                                    unset($_SESSION['errors']);
                                endif;
                                ?>
                                <form action="app/users/register.php" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="name" class="form-control" name="name" id="name" placeholder="Full name" required>
                                            <small class="form-text">Please provide your full name</small>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            <small class="form-text">Please provide your email (passphrase)</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                            <small class="form-text">Please provide your password (passphrase)</small>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Repeat password</label>
                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                            <input type="password" class="form-control" name="password-repeat" id="password" placeholder="Repeat password" required>
                                            <small class="form-text">Please confirm with old password. (passphrase)</small>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group">
                                        <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                                            <button type="submit" name="submit" class="btn btn-form">Register</button>
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
