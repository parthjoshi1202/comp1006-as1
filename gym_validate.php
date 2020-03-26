<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validating the Credentials</title>
</head>
<body>
<?php
$username = $_POST['username'];
$pw = $_POST['pw'];

try {
    $db= new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT userId, password FROM gym_users WHERE username = :username";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
    $cmd->execute();
    $user = $cmd->fetch();


    if (!password_verify($pw, $user['pw'])) {
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
    //header('location:gym_error.php');
    echo 'Please Refresh the Page and Try Again';
    exit();
}
?>

</body>
</html>
