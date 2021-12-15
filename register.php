<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php'; ?>


<article>
    <h1>Sign Up</h1>
    <form action="app/users/register.php" method="post">
        <div class="register-form">
            <label for="name">Name</label>
            <input type="name" class="form-control" name="name" id="name" placeholder="Full name" required>
            <small class="form-text">Please provide your full name</small>
        </div>

        <div class="register-form">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <small class="form-text">Please provide your email adress</small>
        </div>

        <div class="login-form">
            <label for="password">Password</label><input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <small class="form-text">Please provide your password (passphrase)</small>
        </div>
        <div class="login-form">
            <label for="password">Password</label><input type="password" class="form-control" name="password" id="password" placeholder="Repeat password" required>
            <small class="form-text">Please provide your password (passphrase)</small>
        </div>
        <button type="submit" class="btn btn-form">Sign Up</button>
    </form>
    <div>
</article>
