<?php
$title='Register as User';
require_once ('gym_header.php');
?>
<main>
    <h1>Register as a User</h1>
    <form method="post" action="gym_save-register.php">
        <fieldset>
            <label for="username">Username:* </label>
            <input name="username" id="username" required placeholder="No Profane Words !!"/>
        </fieldset>
        <fieldset>
            <label for="password">Password:* </label>
            <input type="password" name="password" id="password" required pattern=".{8,}"/>
            <img id="showHide" src="images/show_pw.png" alt="ShowOrHide" onclick="showHidePassword();" />
        </fieldset>
        <fieldset>
            <label for="confirm_password">Confirm Password:* </label>
            <input name="confirm_password" id="confirm_password" type="password" required pattern=".{8,}" onkeyup="return comparePw();"/>
            <span id="pwMsg"></span>
        </fieldset>
        <div>
            <input type="submit" value="Register" onclick="return comparePw();" />
        </div>
    </form>
</main>

<?php
require_once ('gym_footer.php');
?>