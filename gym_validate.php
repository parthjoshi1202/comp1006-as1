<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validating the Credentials</title>
</head>
<body>
<?php
$username = $_POST['username'];
$password= $_POST['password'];

try {
    $db= new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT userId, password FROM gym_users WHERE username = :username";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();


    if (!password_verify($password, $user['password'])) {
        session_start();
        header('location:gym_login.php?invalid=true');
        exit();
    } else {
        session_start();
        $_SESSION['userId'] = $user['userId'];

        $_SESSION['username'] = $username;

        header('location:client-list.php');
    }

    $db = null;
}
catch(Exception $e) {
   header('location:gym_error.php');
    exit();
}
?>

</body>
</html>
