<?php require __DIR__ . '/app/autoload.php'; ?>
<?php require __DIR__ . '/views/header.php';

//https://stackoverflow.com/questions/13336200/add-class-active-to-active-page-using-php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>
<article>
    <?php if ($_SESSION['user']) :
        $id = $_SESSION['user']['id'];
        $statement = $database->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);



        // die(var_dump($first_part));
    ?>

        <div class="container">
            <div class="view-account">
                <section class="module">
                    <div class="module-inner">
                        <div class="side-bar">
                            <div class="user-info">
                                <?php if ($first_part == "profile.php") : ?>
                                    <img class="img-profile img-circle img-responsive" src="/assets/images/logo.png" alt="">
                                <? else : ?>
                                    <img class="img-profile img-circle img-responsive" src="<?php echo $_SESSION['user']['image']; ?>" alt="">
                                <? endif; ?>
                                <ul class="meta list list-unstyled">
                                    <li class="name">Name
                                        <label class="label label-info">Role</label>
                                    </li>
                                    <li class="email"><a href="#">Link</a></li>
                                    <li class="activity">INDEX</li>
                                </ul>
                            </div>


                            <nav class="side-menu">
                                <ul class="nav">

                                    <li class="<?php if ($first_part == "profile.php") : echo "active";
                                                endif; ?>"><a href="/profile.php">Profile</a></li>
                                    <li class="<?php if ($first_part == "tasks.php") : echo "active";
                                                endif; ?>"><a href="/tasks.php">Tasks</a></li>
                                    <li class="<?php if ($first_part == "lists.php") : echo "active";
                                                endif; ?>"><a href="/lists.php">Lists</a></li>
                                    <li class="<?php if ($first_part == "index.php") : echo "active";
                                                endif; ?>"><a href="/index.php">Home</a></li>
                                    <li class="<?php if ($first_part == "register.php") : echo "active";
                                                endif; ?>"><a href="/register.php">Register</a></li>
                                    <li class="<?php if ($first_part == "logout.php") : echo "active";
                                                endif; ?>"><a href="/app/users/logout.php">Log out</a></li>
                                </ul>
                            </nav>

                        </div>

                        <? else :
                        if (!$_SESSION['user']) : ?>
                            <div class="container">
                                <div class="view-account">
                                    <section class="module">
                                        <div class="module-inner">
                                            <div class="side-bar">
                                                <div class="user-info">
                                                    <img class="img-profile img-circle img-responsive center-block" src="/assets/images/logo.png" alt="">
                                                    <!-- <img class="img-profile img-circle img-responsive center-block" src="<?php echo $_SESSION['user']['image']; ?>" alt=""> -->
                                                    <ul class="meta list list-unstyled">
                                                        <li class="name">Name
                                                            <label class="label label-info">Role</label>
                                                        </li>
                                                        <li class="email"><a href="#">Link</a></li>
                                                        <li class="activity">INDEX</li>
                                                    </ul>
                                                </div>
                                                <nav class="side-menu">
                                                    <ul class="nav">

                                                        <li class="<?php if ($first_part == "Test.php") : echo "active";
                                                                    endif; ?>"><a href="/Test.php">Log in</a></li>
                                                        <li class="<?php if ($first_part == "register.php") : echo "active";
                                                                    endif; ?>"><a href="/register.php">Register</a></li>
                                                    </ul>
                                                </nav>

                                            </div>
                                    <? endif;
                            endif; ?>
