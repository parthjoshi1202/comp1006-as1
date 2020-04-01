<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register for Membership</title>
</head>
<body>
    <form action="gym-saved.php" method="post">
        <fieldset>
            <label for="firstName">First Name: *</label>
            <input name="firstName" id="firstName" required />
        </fieldset>
        <fieldset>
            <label for="lastName">Last Name: *</label>
            <input name="lastName" id="lastName" required />
        </fieldset>
        <fieldset>
            <label for="time_pref">Preferred Time: *</label>
            <input name="time_pref" id="time_pref" required />
        </fieldset>
        <fieldset>
            <label for="membership">Select Membership Type: *</label>
            <select name="membership" id="membership" required />
            <?php
            //COMP 1006 Assignment-2
            //Name-Parth Joshi
            //Lakehead ID- 1126914
            //initializing variables

            require_once 'gym_auth.php';
            $firstName=null;
            $lastName=null;
            $membership=null;
            $memberId=null;
            //Adding image with each record
            $pic=null;

            if(!empty($GET['memberId'])) {
                $memberId = $_GET['memberId'];


                $database = new PDO('mysql:host=172.31.22.43;dbname=Parth1126914', 'Parth1126914', 'HE9auH3i9m');
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
        <input type="submit" name="Add">
    </form>

</body>
</html>
