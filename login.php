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
        <p>Email: test@test.com</p>
        <p>
            Password: 123</p>
    </div>
</article>
<?php require __DIR__ . '/views/footer.php'; ?>
