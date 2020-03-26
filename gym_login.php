<?php
$title='Login';
require_once('gym_header.php');
?>
<main>
    <h1>Login</h1>
    <?php
    if(!empty($_GET['invalid'])) {
        if ($_GET['invalid'] == 'true') {
            echo '<div>Invalid Login</div>';
        } else {
            echo '<div>Please Enter your Credentials</div>';
        }
    }
    else {
        echo '<div>Please Enter your Credentials</div>';
    }
    ?>
    <form method="post" action="gym_validate.php">
        <fieldset class="form-group">
            <label for="username">Username:* </label>
            <input name="username" id="username" required />
        </fieldset>
        <fieldset class="form-group">
            <label for="password">Password:* </label>
            <input type="password" name="password" id="password" required />
        </fieldset>
        <div>
            <input type="submit" value="Login" class="btn btn-info" />
        </div>
        <p>Not a Registered User? Please Register <a href="gym_register.php">Here</a></p>
    </form>
</main>



<?php
require_once 'gym_footer.php';
?>
