<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting-Client</title>
    <link href="css/css.css" rel="stylesheet" />
</head>
<body>
<?php
session_start();
require_once 'gym_auth.php';

$memberId=$_GET['memberId'];


try {
    $db = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM gym WHERE memberId= :memberId";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':memberId', $memberId, PDO::PARAM_INT);

    $cmd->execute();
    $db = null;

    echo '<h3>Client Has Been Deleted</h3>';
    echo '<a href="client-list.php">Go to the Client List</a>';
}
catch (Exception $e) {
    header('location:gym_error.php');
    exit();
}


?>

</body>
</html>
