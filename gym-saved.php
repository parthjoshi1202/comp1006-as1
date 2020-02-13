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
    
    
    
    
?>

<form action="client-list.php" method="post">
    <button>Click here for Client List</button>
</form>

</body>
</html>
