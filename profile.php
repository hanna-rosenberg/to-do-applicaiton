<?php

require __DIR__ . '/navigation.php'; ?>

<div class="content-panel">
    <h2 class="title">Profile</h2>
    <fieldset class="fieldset">
        <h3 class="fieldset-title">Personal info</h3>
        <div class="form-group avatar">
            <figure class="figure col-md-1 col-sm-3 col-xs-12">
                <img class="img-circle rounded-circle" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
            </figure>
            <fieldset class="fieldset">
                <p>Name : <?php echo htmlspecialchars($_SESSION['user']['name']); ?></p>
                <p>Email : <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
                <p>Tasks to complete :</p>
                <h3 class="fieldset-title">Update profile</h3>
                <form action="app/users/imageUpload.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group col-md-10 col-sm-9 col-xs-12">
                        <input type="file" name="profile-pic" id="profile-pic" class="file-uploader pull-left" accept="image/png, image/jpeg, image/jpg, image/gif">
                        <button type="submit" class="btn btn-form btn-sm">Update Image</button>
                    </div>
        </div>
        </form>
        <div class="form-group">
            <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                <button onclick="updateProfile()" type="submit" name="submit" class="btn btn-primary btn-sm" value="Update Profile" id="update-button">Update profile</button>
                </form>
            </div>
            <?php
            if (isset($_SESSION['update-errors'])) :
                foreach ($_SESSION['update-errors'] as $error) : ?>
                    <p class="alert alert-danger"><?php echo htmlspecialchars($error) ?></p>
            <?php endforeach;
                unset($_SESSION['update-errors']);
            endif;
            ?>
            <?php
            if (isset($_SESSION['confirm'])) : ?>
                <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['confirm']) ?></p>
            <?php unset($_SESSION['confirm']);
            endif;
            ?>
            <?php
            if (isset($_SESSION['password-errors'])) :
                foreach ($_SESSION['password-errors'] as $error) : ?>
                    <p class="alert alert-danger"><?php echo htmlspecialchars($error) ?></p>
            <?php endforeach;
                unset($_SESSION['password-errors']);
            endif;
            ?>
            <?php
            if (isset($_SESSION['password_updated'])) : ?>
                <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['password_updated']) ?></p>
            <?php unset($_SESSION['password_updated']);
            endif;
            ?>
            <?php
            if (isset($_SESSION['image_errors'])) :
                foreach ($_SESSION['image_errors'] as $error) : ?>
                    <p class="alert alert-danger"><?php echo htmlspecialchars($error) ?></p>
            <?php endforeach;
                unset($_SESSION['image_errors']);
            endif;
            ?>
            <?php
            if (isset($_SESSION['confirm-email'])) : ?>
                <p class="alert alert-success"><?php echo htmlspecialchars($_SESSION['confirm-email']) ?></p>
            <?php unset($_SESSION['confirm-email']);
            endif;
            ?>
            <div class="hidden" id="update-profile">
                <form action="app/users/update2.php" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Email</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="email" class="form-control" name="updated-email" id="email" placeholder="Email" required>
                            <small class="form-text">Please provide your new email adress.</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12 control-label">Password</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="updated-pwd" id="password" placeholder="New password">
                            <small class="form-text">Please provide your new password.</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">Repeat password</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="repeate-updated-pwd" id="password" placeholder="Confirm new password">
                            <small class="form-text">Please confirm your new password.</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-5 col-sm-6 col-xs-12 control-label">Confirm with old password</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="old-pwd" id="password" placeholder="Old password">
                            <small class="form-text">Please confirm with old password.</small>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-10 col-sm-9 col-xs-12 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            <button type="submit" name="submit" class="btn btn-primary">Update profile</button>
                </form>
            </div>
            <hr>
            <div class="delete-user">
                <form action="/app/users/delete-user.php" method="post" class="delete-user-form">
                    <div class="form-group">
                        <label class="col-md-5 col-sm-6 col-xs-12 control-label">Delete account.</label>
                        <div class="col-md-10 col-sm-9 col-xs-12">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            <small class="form-text">Insert password to delete your account.</small>
                            <button type="submit" class="btn btn-danger">Delete account</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
</fieldset>
</div>
</div>
</article>
<?php require __DIR__ . '/views/footer.php';
?>
