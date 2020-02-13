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
    
        </fieldset>
        <input type="submit" name="Add">
    </form>

</body>
</html>
