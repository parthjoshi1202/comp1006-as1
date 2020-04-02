<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Users</title>
</head>
<body>
<?php
//session_start();

/*if (empty($_SESSION['userId'])) {
    header('location:gym_login.php');
    exit();
}*/

$username=$_POST['username'];
$password=$_POST['password'];
$confirm_password=$_POST['confirm_password'];
$ok=true;


if (empty($username)) {
    echo 'Username is Required <br />';
    $ok=false;
}

if(empty($password)) {
    echo 'Please Enter the Password <br />';
    $ok=false;
}

if ($password!= $confirm_password) {
    echo 'Passwords are not the same <br />';
    $ok = false;
}


if($ok) {

//hashing the password
    $pw=password_hash($password,PASSWORD_DEFAULT);


    try {

        $db= new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //checking before insert

        $sql = "SELECT * FROM gym_users WHERE username=:username";
        $cmd = $db->prepare($sql);
        $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
        $cmd->execute();
        $user = $cmd->fetch();

        if (!empty($user)) {
            echo 'Username already exists, Please Try Another One ! <br />';
        }

        else {

            $sql = "INSERT INTO gym_users(username,password) VALUES (:username,:password)";
            $cmd = $db->prepare($sql);
            $cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
            $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
            $cmd->execute();
        }

        $db = null;

//redirecting to login page
        header('location:gym_login.php');
    }
    catch (Exception $e) {
         header('location:gym_error.php');
        exit();
    }
}
?>
</body>
</html>
