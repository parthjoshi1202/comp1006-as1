<?php
if(empty($_SESSION['userId'])) {
    header('location:gym_login.php');
    exit();
}
?>