<!-- <nav class="navbar">
    <a href="#" class="navbar-brand"><?php echo $config['title']; ?>LOGO </a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/index.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?> ">Home</a>
        </li>


        <li class="nav-item">
            <a href="/about.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/about.php' ? 'active' : ''; ?> ">About</a>
        </li>


        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="app/users/logout.php" class="nav-link">Log out</a>
            <?php else : ?>
                <a href="/login.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>">Log in</a>
            <?php endif; ?>
        </li>


        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="/profile.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/profile.php' ? 'active' : ''; ?>">My Account</a>
            <?php else : ?>
                <a href="/register.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/register.php' ? 'active' : ''; ?>">Register Account</a>
            <?php endif; ?>
        </li>

        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?><img class="profile-img-nav" src="<?php echo $_SESSION['user']['image']; ?>" alt="profile picture">
            <?php endif; ?>

    </ul>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <?php if (isset($_SESSION['user'])) : ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="profile-img-nav" src="<?php echo $_SESSION['user']['image']; ?>" alt="profile picture">
            </a>
        <?php endif; ?>
        <!-- <span class="navbar-toggler-icon"></span> -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/Test.php">Log in test</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register.php">Register</a>
            </li>
            <li class="nav-item dropdown">
                <?php if (isset($_SESSION['user'])) : ?>
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="profile-img-nav" src="<?php echo $_SESSION['user']['image']; ?>" alt="profile picture">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                        <a class="dropdown-item" href="/profile.php">Profile</a>
                        <a class="dropdown-item" href="/index.php">Home</a>
                        <a class="dropdown-item" href="/register.php">Register</a>
                        <a class="dropdown-item" href="/Test.php">Test</a>
                        <a class="dropdown-item" href="app/users/logout.php">Log out</a>

            </li>

    </div>
<?php endif; ?>
</li>
</ul>
</div>
</nav>
