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
//adding image upload
$pic = $_FILES['pic'];
$picName = null;
    
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

if (!empty($pic['tmp_name'])) {
    $picName = $pic['name'];
    $tmp_name = $pic['tmp_name'];

    //this checks for the actual type of file
    $type = mime_content_type($tmp_name);

    if ($type != 'image/jpeg' && $type != 'image/png') {
        echo 'Image must be a .jpg or .png file !';
        $ok = false;
        exit();
    }

    $picName = session_id() . '-' . $picName;
    move_uploaded_file($tmp_name, "gym_upload/$picName");
    //move_uploaded_file($tmp_name, "img/artists/$photoName");
}    
    
    
if($ok==true) {
    try {
    $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
    
    //set up SQL Insert command

         if(empty($memberId)) {
            $sql = "INSERT INTO gym (firstName, lastName, time_pref, membership, pic) VALUES (:firstName,:lastName,:time_pref,:membership,:pic)";
        } else {
            $sql = "UPDATE gym SET firstName= :firstName, lastName= :lastName, time_pref=:time_pref, membership=:membership, pic=:pic WHERE memberId=:memberId ";
        }

//creating a pdo command object
        $cmd = $database->prepare($sql);
        $cmd->bindParam(':firstName', $firstName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':lastName', $lastName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':time_pref', $time_pref, PDO::PARAM_STR, 7);
        $cmd->bindParam(':membership', $membership, PDO::PARAM_STR, 40);
        $cmd->bindParam(':pic', $picName, PDO::PARAM_STR, 100);

        if (!empty($memberId)) {
            $cmd->bindParam(':memberId', $memberId, PDO::PARAM_INT);
        }


//executing
        $cmd->execute();

//disconnect
        $database = null;
        //show message to user
        echo 'Details Saved';
    }
    catch (Exception $e) {
        header('location:gym_error.php');
        exit();
    }

}
    
?>

<form action="client-list.php" method="post">
    <button>Click here for Client List</button>
</form>

</body>
</html>
