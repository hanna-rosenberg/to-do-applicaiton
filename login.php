<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div class="login-form">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="test@test.com" required>
            <small class="form-text">Please provide your email adress</small>
        </div>

        <div class="login-form">
            <label for="password">Password</label><input type="password" class="form-control" name="password" id="password" required>
            <small class="form-text">Please provide your password (passphrase)</small>
        </div>
        <button type="submit" class="btn btn-form">Login</button>
    </form>
    <div>
        <p>Email: francis@darjeeling.com</p>
        <p>
            Password: the-darjeeling-limited</p>
    </div>
</article>
<?php $oldpassword = '$2y$10$syAwWK6/BFCpylyRoEAc/eRyVWk/BGYn2tddHx30S4FjTAkXiy5HC'; ?>
<?php require __DIR__ . '/views/footer.php'; ?>
