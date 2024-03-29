<?php
$title='Client-List';
require_once ('gym_header.php');
?>

<h1>Client List</h1>

<?php
//COMP 1006 Assignment-2
//Name-Parth Joshi
//Lakehead ID- 1126914
if(!empty($_SESSION['userId'])) {
    echo '<a href="gym.php">Add Client</a>';
}

try {
//Connect
$database=new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT * FROM gym";

//using command variable to run the query and then executing it
$cmd=$database->prepare($query);
$cmd->execute();

//using fetchAll() method to store the data
$store_data=$cmd->fetchAll();

//Displaying the Table with Add, Delete and Edit Links with Photo
    echo '<table border="1"><thead><th>First Name</th><th>Last Name</th><th>Preferred Time</th><th>Membership</th><th>Delete</th><th>Edit</th><th>Picture</th></thead>';
    //echo '<table border="1"><thead><th>First Name</th><th>Last Name</th><th>Preferred Time</th><th>Membership</th><th>Delete</th><th>Edit</th></thead>';
   // echo '<a href="gym.php">Add Client</a>';

    foreach ($store_data as $value) {
        echo '<tr>';

        if (!empty($_SESSION['userId'])) {
           // echo '<td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td><td>' . $value['time_pref'] . '</td><td>' . $value['membership'] . '</td>';
            echo '<td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td>' ;
        }

        else {
            //echo '<td>' . $value['firstName'] . '</td>';
            echo '<td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td>' ;
            //echo '<td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td><td>' . $value['time_pref'] . '</td><td>' . $value['membership'] . '</td>';
        }

        echo '<td>' . $value['time_pref'] . '</td><td>' . $value['membership'] . '</td>';

       // echo '<td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td><td>' . $value['time_pref'] . '</td><td>' . $value['membership'] . '</td>';



        //Showing Edit and Delete Link for Authenticated Users
        if (!empty($_SESSION['userId'])) {
            echo '<td><a href="delete-client.php?memberId=' . $value['memberId'] . '" class="btn btn-danger"
                onclick="return confirmDelete();">Delete</a><td><a href="gym.php?memberId="' . $value['memberId'] . '"class="btn btn-danger">Edit</a></td></td>';
        }

        //echo '</tr>';

        if (!empty($value['pic'])) {
            echo '<td><img src="gym_upload/' . $value['pic'] . '" alt="User Image" class="thumbnail" />';
        }
        else {
            echo '<td></td>';
        }

        echo '</tr>';
        /*echo '<tr><td>' . $value['firstName'] . '</td><td>' . $value['lastName'] . '</td><td>' . $value['time_pref'] . '</td><td>' . $value['membership'] . '</td><td><a href="delete-client.php?memberId=' . $value['memberId'] . '"class="btn btn-danger"
    onclick="return confirmDelete();">Delete</a><td><a href="gym.php?memberId=",' . $value['memberId'] . '"class="btn btn-danger">Edit</a></td></tr>';*/
    }



    echo '</table>';

//Disconnect
    $database = null;
}
catch (Exception $e) {
    header('location:gym_error.php');
    exit();
}
require_once('gym_footer.php');
?>
