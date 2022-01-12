<?php require __DIR__ . '/navigation.php' ?>

<div class="content-panel">
    <h2 class="title">Sign Up</h2>
    <fieldset class="fieldset">
        <h3 class="fieldset-title">Register User</h3>
        <?php
        if (isset($_SESSION['errors'])) :
            foreach ($_SESSION['errors'] as $error) : ?>
                <p class="alert alert-danger"><?php echo htmlspecialchars($error) ?></p>
        <?php endforeach;
            unset($_SESSION['errors']);
        endif;
        ?>
        <form action="app/users/register.php" method="post" class="form-horizontal">
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Name</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="name" class="form-control" name="name" id="name" placeholder="Full name" required>
                    <small class="form-text">Please provide your full name.</small>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <small class="form-text">Please provide your email.</small>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <small class="form-text">Please provide your password.</small>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-5 col-sm-5 col-xs-12 control-label">Repeat password</label>
                <div class="col-md-10 col-sm-9 col-xs-12">
                    <input type="password" class="form-control" name="password-repeat" id="password" placeholder="Repeat password" required>
                    <small class="form-text">Please confirm with old password. </small>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
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
