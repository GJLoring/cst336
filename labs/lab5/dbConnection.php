<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    function getDatabaseConnection($dbname = 'ottermart'){
        $host = "localhost";
        $username = "root";
        $password = "";

        //when connecting from Heroku
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $host = "localhost";
            $username = "b6ef724ec50a2b";
            $password = "8db34bf9";
        
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 

        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $dbConn;
     }
?>
