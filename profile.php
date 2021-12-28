<?php

require __DIR__ . '/app/autoload.php';
require __DIR__ . '/views/header.php';

$id = $_SESSION['user']['id'];
$statement = $database->prepare('SELECT * FROM users WHERE id = :id');
$statement->bindParam(':id', $id, PDO::PARAM_INT);
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC); ?>
<!--Add confirm with old password then log out user-->

<article>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user']["name"]); ?> </h1>
    <h2>Update Account</h2>
    <form action="app/users/updateUser.php" method="post">
        <div class="register-form">
            <label for="email">Update Email</label>
            <input type="email" class="form-control" name="updated-email" id="email" placeholder="Email" required>
            <small class="form-text">Please provide your new email adress</small>
        </div>
        <!-- </form>

    <form action="app/users/updateUser.php" method="post"> -->
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
        <button type="submit" class="btn btn-form">Update profile</button>
    </form>

    <form action="app/users/imageUpload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="avatar">Choose a PNG image to upload</label>
            <input type="file" name="profile-pic" id="profile-pic" accept="image/png, image/jpeg, image/jpg, image/gif">
        </div>
        <button type="submit" class="btn btn-form">Update profile images</button>
    </form>
    <div>
</article>
<?php require __DIR__ . '/views/footer.php';
?>
