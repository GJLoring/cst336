<?php
    session_start();
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <div>
         <header>
            <h1> OtterMart Administrator Login </h1>
         </header>

         <div></div>
         <div>
            <form method="post" action="loginProcess.php">
                  Username: <input type="text" name="username" /> <br />
                  Password: <input type="password" name="password" /> <br />
                  <input type="submit" class='btn btn-primary' name="submitForm" value="Login!" />
            </form>
         </div>

         <br /><br />
         <?php
         if($_SESSION['incorrect']){
            echo "<p class = 'lead' id = 'error' style = 'color:red'>";
            echo "<strong>Inocrrect Username or Password!</strong</p>";
         }
         ?>


      </div>
   </body>
</html>
