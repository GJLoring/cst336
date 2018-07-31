<?php

   ini_set('display_errors', 'On');
   error_reporting(E_ALL);

   session_start(); 
   echo "A. Debug message username:". $_POST['username'];
   echo "A. Debug message password:". $_POST['password']; 

    include 'connect.php';
    $connect = getDBConnection();

    //Checking credentials in database
    $sql = "SELECT * FROM users
            WHERE username = :username
            AND password = :password";
    $stmt = $connect->prepare($sql);
    $data = array(":username" => $_POST['username'], ":password" => sha1($_POST['password']));
    $stmt->execute($data);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($user)) {
         echo " 6. Debug message record not found:". $_POST['username'];
}

//redirecting user to quiz if credentials are valid
if(isset($user['username'])){
    $_SESSION['username'] = $user['username'];
    header('Location: index.php');
} else {
    echo "The values you entered were incorrect. <a href='login.php' >Retry</a>";

}
?>