<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include './dbConnection.php';

    function get_rand_hero($dbname = 'final'){
        $conn = getDatabaseConnection($dbname);

        $sql = "SELECT *
            FROM superhero
            ORDER BY RAND()
            Limit 1";  
            
            
        $np = array();

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $row){/*
                echo "name: ". $row["name"]. 
                    " firstName: ". $row["firstName"]. 
                    " lastName: ". $row["lastName"]. 
                    " pob: ". $row["pob"].
                    " image: ". $row["image"]."<br>";
                */
                $_SESSION['Name'] = $row["name"];
                $_SESSION['FirstName'] = $row["firstName"];
                $_SESSION['LastName'] = $row["lastName"];
                $_SESSION['POB'] = $row["pob"];
                $_SESSION['Image'] = '<img src="img/superheroes/' . $row["image"] . '.png">';
        }
    }
    
   function get_hero_names($dbname = 'final'){
        $conn = getDatabaseConnection($dbname);

        $sql = "SELECT Distinct firstName, lastName
            FROM superhero
            ORDER BY firstName"; 
 
            
        $np = array();

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['NameList'] = '';
        foreach($result as $row){
                echo '<option>' . $row["firstName"] . " " .  $row["lastName"] . '</option>';
        }
    }
    
    function get_hero_comic_names($dbname = 'final'){
        $conn = getDatabaseConnection($dbname);

        $sql = "SELECT Distinct name
            FROM superhero
            ORDER BY name
            Limit 7"; 
 
            
        $np = array();

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $_SESSION['NameList'] = '';
        foreach($result as $row){
                echo '<option>' . $row["name"] . '</option>';
        }
    }
?>
