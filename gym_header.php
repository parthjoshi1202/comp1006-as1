<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Gym - <?php echo $title; ?></title>
     <link rel="stylesheet" href="css/css.css" />
</head>
<body>
<nav>
   <a href="gym_index.php">PHP 24/7 Gym</a>
    <div>
        <ul class="nav">
            <li>
                <a href="gym_index.php">Home</a>
                <a href="client-list.php">Client List</a>
                <?php
                session_start();
                if(!empty($_SESSION['memberId'])) {
                    echo '<li><a href="#">' . $_SESSION['username'] . '</a></li>
                    <li><a href="gym_logout.php">Logout</a></li>';
                }
                else {
                    echo '<li><a href="gym_register.php">Register</a></li>
                    <li><a href="gym_login.php">Login</a></li>';
                }
                ?>
            </li>
        </ul>

    </div>

</nav>




