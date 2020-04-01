<?php
$title='Register for Membership';
require_once ('gym_header.php');
require_once ('gym_auth.php');

//initializing variables
$firstName=null;
$lastName=null;
$membership=null;
$memberId=null;
$time_pref=null;
//Adding image with each record
$pic=null;

if (!empty($_GET['memberId'])) {
    $memberId = $_GET['memberId'];

    $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT * FROM gym WHERE memberId = :memberId";
    $cmd = $database->prepare($sql);
    $cmd->bindParam(':memberId', $memberId, PDO::PARAM_INT);
    $cmd->execute();

    $client = $cmd->fetch();
    $firstName = $client['firstName'];
    $lastName = $client['lastName'];
    $time_pref=$client['time_pref'];
    $membership=$client['membership'];
    $pic = $client['pic'];

    $database = null;
}
?>
<h1>Client/Member Details</h1>
    <form action="gym-saved.php" method="post">
        <fieldset>
            <label for="firstName">First Name: *</label>
            <input name="firstName" id="firstName" required value="<?php echo $firstName; ?>" />
        </fieldset>
        <fieldset>
            <label for="lastName">Last Name: *</label>
            <input name="lastName" id="lastName" required value="<?php echo $lastName; ?>"/>
        </fieldset>
        <fieldset>
            <label for="time_pref">Preferred Time: *</label>
            <input name="time_pref" id="time_pref" required value="<?php echo $time_pref; ?>"/>
        </fieldset>

        <fieldset>
            <label for="membership">Select Membership Type: *</label>
            <select name="membership" id="membership" required />
            <?php
            //COMP 1006 Assignment-2
            //Name-Parth Joshi
            //Lakehead ID- 1126914

            $membership=null;
            
            if(!empty($GET['memberId'])) {
                $memberId = $_GET['memberId'];


                $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
                $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT membership FROM membership";
                $cmd = $database->prepare($sql);
                $cmd->execute();
                $gym = $cmd->fetchAll();
                foreach ($gym as $value) {
                    echo '<option>' . $value['membership'] . '</option>';
                }

                $database = null;
            }
            else {
                $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
                $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT membership FROM membership";
                $cmd = $database->prepare($sql);
                $cmd->execute();
                $gym = $cmd->fetchAll();
                foreach ($gym as $value) {
                    echo '<option>' . $value['membership'] . '</option>';
                }

                $database = null;
            }
            ?>
        </fieldset>
        <fieldset>
            <label for="pic" >Photo:</label>
            <input name="pic" id="pic" type="file" />
        </fieldset>
        <?php
        if (!empty($pic)) {
            echo '<div>
                    <img src="comp1006-as1/images/' . $pic . '" alt="User Image" />
                </div>';
        }
        ?>
        <input name="memberId" id="memberId" value="<?php echo $memberId; ?>" type="hidden" />
        <input type="submit" name="Add">
    </form>

<?php
require_once ('gym_footer.php');
?>


