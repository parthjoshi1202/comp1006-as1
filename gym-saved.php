<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details Saved</title>
</head>
<body>
<?php
//COMP 1006 Assignment-1
//Name-Parth Joshi
//Lakehead ID- 1126914
$firstName=htmlspecialchars($_POST['firstName']);
$lastName=htmlspecialchars($_POST['lastName']);
$time_pref=htmlspecialchars($_POST['time_pref']);
$membership=htmlspecialchars($_POST['membership']);

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

if($ok) {
    $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
 }

//creating a pdo command object
    $cmd = $database->prepare($sql);
    $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 50);
    $cmd->bindParam(':time_pref', $time_pref, PDO::PARAM_STR,7);
    $cmd->bindParam(':membership', $membership, PDO::PARAM_STR,40);

    
    
    
?>

<form action="client-list.php" method="post">
    <button>Click here for Client List</button>
</form>

</body>
</html>
