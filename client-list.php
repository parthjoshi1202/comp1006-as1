<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Details</title>
</head>
<body>
<?php
//COMP 1006 Assignment-1
//Name-Parth Joshi
//Lakehead ID- 1126914
//Connect
$database=new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
$query="SELECT * FROM gym";

//using command variable to run the query and then executing it
$cmd=$database->prepare($query);
$cmd->execute();

//using fetchAll() method to store the data
$store_data=$cmd->fetchAll();
 
//Displaying the Table
echo '<table border="1"><thead><th>firstName</th><th>lastName</th><th>time_pref</th><th>membership</th></thead>';
    foreach ($store_data as $value)
{
    echo '<tr><td>' .$value['firstName']. '</td><td>'  .$value['lastName']. '</td><td>'  .$value['time_pref']. '</td><td>' .$value['membership']. '</td></tr>' ;
}

echo '</table>';

//Disconnect
$database=null;
    
?>
</body>
</html>
