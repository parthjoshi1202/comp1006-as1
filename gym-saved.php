<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details Saved</title>
</head>
<body>
<?php
//COMP 1006 Assignment-2
//Name-Parth Joshi
//Lakehead ID- 1126914

session_start();
require_once 'gym_auth.php';    
    
$firstName=htmlspecialchars($_POST['firstName']);
$lastName=htmlspecialchars($_POST['lastName']);
$time_pref=htmlspecialchars($_POST['time_pref']);
$membership=htmlspecialchars($_POST['membership']);
$memberId = $_POST['memberId'];
    
echo $firstName;    

//boolean ok
$ok=true;

if(empty($firstName)) {
    echo 'Please Enter First Name<br />';
    $ok=false;
}
if(empty($lastName)) {
    echo 'Please Enter Last Name<br />';
    $ok=false;
}

if($ok==true) {
    try {
    $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
    
    //set up SQL Insert command

         if(empty($memberId)) {
        $sql = "INSERT INTO gym (firstName, lastName, time_pref, membership) VALUES (:firstName,:lastName,:time_pref,:membership)";
    } else{
        $sql="UPDATE gym SET firstName= :firstName, lastName= :lastName, time_pref=:time_pref, membership=:membership WHERE memberId=:memberId ";
    }
    
 

//creating a pdo command object
    $cmd = $database->prepare($sql);
    $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':time_pref', $time_pref, PDO::PARAM_STR,7);
    $cmd->bindParam(':membership', $membership, PDO::PARAM_STR,40);
    
    if(!empty($memberId)) {
        $cmd->bindParam(':memberId',$memberId,PDO::PARAM_INT);
    }

//executing
    $cmd->execute();

//disconnect
    $database = null;
//show message to user
    echo 'Details Saved';
    }
     catch (Exception $e) {
        echo 'Please Refresh and Try Again';
        exit();
    }
}
    
?>

<form action="client-list.php" method="post">
    <button>Click here for Client List</button>
</form>

</body>
</html>
