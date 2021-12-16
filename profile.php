<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <h1>Update Account</h1>
    <form action="app/users/updateUser.php" method="post">
        <div class="register-form">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="updated-email" id="email" placeholder="Email" required>
            <small class="form-text">Please provide your email adress</small>
        </div>

        <div class="login-form">
            <label for="password">Password</label><input type="password" class="form-control" name="updated-pwd" id="password" placeholder="New password" required>
            <small class="form-text">Please provide your new password (passphrase)</small>
        </div>
        <div class="login-form">
            <label for="password">Password</label><input type="password" class="form-control" name="repeate-updated-pwd" id="password" placeholder="Confirm new password" required>
            <small class="form-text">Please confirm your new password (passphrase)</small>
        </div>
        <button type="submit" class="btn btn-form">Update profile</button>
    </form>
    <div>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>
