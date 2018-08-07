<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    function getDatabaseConnection($dbname = 'final'){
        /*
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "final";
        $dbport = 3306;
    
        $db = new mysqli($servername, $username, $password, $database, $dbport);
    
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        } 
        echo "Connected successfully (".$db->host_info.")";
        echo $username;
        return $db
        */
        
        
        
        $host = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
        
     }
?>
