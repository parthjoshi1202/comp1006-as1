<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
</head>
<body>
<?php
session_start();
session_unset();
//ending the current session
session_destroy();
header('location:gym_login.php');
?>
</body>
</html>
