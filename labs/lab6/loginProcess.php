<?php

   ini_set('display_errors', 'On');
   error_reporting(E_ALL);

   session_start(); 
   include './dbConnection.php';

   $conn = getDatabaseConnection("ottermart");
   //echo " 1. Debug message:". isset($_POST['loginForm']);
   //echo " 2. Debug message:". $_POST['username'];
   //echo " 3. Debug message:". $_POST['password'];
   //if (isset($_POST['loginForm'])) { //Check me 

      //echo " 4. Debug message:". $_POST['username'];
      //echo " 5. Debug message:". $_POST['password'];
      $username = $_POST['username'];
      $password = sha1($_POST['password']); 
      
      
      $sql = "SELECT *
      FROM om_admin
      WHERE username = :username
      AND password = :password";  
      
      $np = array();
      $np[':username'] = $username;
      $np[':password'] = $password;
      
      $stmt = $conn->prepare($sql);
      $stmt->execute($np);
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if (empty($record)) {
         echo " 6. Debug message record not found:". $_POST['username'];
         $_SESSION['incorrect'] = true;
         header("Location: login.php");
      } else {
         echo " 7. Debug message record found:". $_POST['username'];
         $_SESSION['incorrect'] = false;
         $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
         echo " 8. Debug message record found:". $_POST['adminName'];
         $_SESSION['userLevel'] = $record['loginLevel'];
         header("Location:admin.php");
      }
   //}
?>
