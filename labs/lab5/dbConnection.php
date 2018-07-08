<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    function getDatabaseConnection($dbname = 'ottermart'){
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
     }
?>
