<?php
    session_start();
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Login</h1>
        <h2>Credentials required before submiting form.</h2>
        <p>You can log in using usernames <strong>user_1</strong> or <strong>user_2</strong>. The password is <strong>s3cr3t</strong>.</p>

        <!--Form to enter credentials-->
        <form method="post" action="verifyUser.php">
              Username: <input type="text" name="username" value="user_1"/> <br />
              Password: <input type="password" name="password" value="s3cr3t" /> <br />
            <!--<input type "submit" name="submit" placeholder="Login" /> <br />-->
            <input type="submit" class='btn btn-primary' name="submitForm" value="Login!" />
        </form>
    </body>
</html>