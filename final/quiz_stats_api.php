
<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include './dbConnection.php';
    $dbname = 'final';
    $connect = getDatabaseConnection($dbname);

    $sql = "
        UPDATE guesscount 
        SET correctTotal = correctTotal + 1
        WHERE name = '".$_SESSION['Name']."'
    ";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    //mysql_query($sql);
    //$stmt = $connect->prepare($sql);
    //$result = $stmt->exec()
    //fetch(PDO::FETCH_ASSOC);
    

    $sql = "SELECT correctTotal, incorrectTotal
        FROM guesscount
        WHERE name = (:name)";
    
    $stmt = $connect->prepare($sql);
    $stmt->execute(array(":name"=>$_SESSION['Name']));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //Encoding data using JSON
    echo json_encode($result);
?>