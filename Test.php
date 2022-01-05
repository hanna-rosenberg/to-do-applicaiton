<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

?>

<article class="login-page">
    <div class="container">
        <div class="view-account">
            <div class="content-panel">
                <h1 class="title">Welcome to Heli do</h1>
                <h2 class="fieldset-title">Log in</h2>
                <?php
                if (isset($_SESSION['errors'])) :
                    foreach ($_SESSION['errors'] as $error) : ?>
                        <p class="alert alert-danger"><?= $error ?></p>
                <?php endforeach;
                    unset($_SESSION['errors']);
                endif;
                ?>
                <?php
                if (isset($_SESSION['confirm'])) :
                    foreach ($_SESSION['confirm'] as $confirmUser) : ?>
                        <p class="alert alert-success"><?= $confirmUser ?></p>
                <?php endforeach;
                    unset($_SESSION['confirm']);
                endif;
                ?>

                <form action="app/users/login.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                            <small class="form-text">Please provide your email adress</small>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <small class="form-text">Please provide your password (passphrase)</small>

                        </div>
                    </div>







                    <!-- <form action="app/users/login.php" method="post">
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="test@test.com" required>
                        <small class="form-text">Please provide the your email address.</small>
                    </div>
                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                        <small class="form-text">Please provide the your password (passphrase).</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form> -->
                    <hr>
                    <div class="form-group">
                        <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</article>
<?php require __DIR__ . '/views/footer.php';
?>
