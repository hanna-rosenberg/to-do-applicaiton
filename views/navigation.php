<nav class="navbar">
    <a href="#" class="navbar-brand"><?php echo $config['title']; ?></a>

    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/index.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/index.php' ? 'active' : ''; ?> ">Home</a>
        </li>


        <li class="nav-item">
            <a href="/about.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === 'about.php' ? 'active' : ''; ?> ">About</a>
        </li>


        <li class="nav-item">
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="app/users/logout.php" class="nav-link">Log out</a>
            <?php else : ?>
                <a href="/login.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/login.php' ? 'active' : ''; ?>">Log in</a>
            <?php endif; ?>
        </li>


        <li class="nav-item">
            <a href="/app/users/register.php" class="nav-link <?php echo $_SERVER['SCRIPT_NAME'] === '/app/users/register.php' ? 'active' : ''; ?>">Register Account</a>
        </li>


    </ul>
</nav>
