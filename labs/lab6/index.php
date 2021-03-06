<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    include './dbConnection.php';

    $conn = getDatabaseConnection("ottermart");
   
    function displaySearchResults(){
        global $conn;
        
        if(isset($_GET['searchForm'])){
            echo "<h3>Products Found:</h3>";
            
            $namedParameters = array();
        
            $sql = "SELECT * FROM om_product WHERE 1";
        
            if(!empty($_GET['product'])){
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product']."%";
            }
            
            if(!empty($_GET['category'])){
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] =  $_GET['priceFrom'];
            }
            
            if(!empty($_GET['priceTo'])){
                $sql .= " AND price <= :priceTo";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }            
            
            if(isset($_GET['orderBy'])){
                if($_GET['orderBy']=='price'){
                    $sql .= " ORDER BY price";
                }
                else{
                    $sql .= " ORDER BY productName";
                }
            }            

            echo $sql;
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($records as $record){
                echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
                echo  $record["productName"] . " " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />";
            }
        }
    }   
    
    function displayCategories(){
        global $conn;
        
        $sql = "SELECT catID, catName from om_category ORDER BY catName";  
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<option valu='".$record["catId"]."'>".$record["catName"]."</option>";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div>
            <h1> OtterMart Product Search </h1>

            <a href="login.php">This index is from the last lab, you want to login with this link</a>
            <form>
                
                Product: <input type="text" name="product" />
                <br />
                Category: 
                    <select name="category">
                        <option value=""> Select One </option>
                        <?=displayCategories()?>
                    </select>
                <br>
                
                Price: From <input type="text" name="priceFrom" size="7" />
                       To   <input type="text" name="priceTo" size="7" />
                       
                <br>
                    Order result by: 
                <br>
                
                <input type="radio" name="orderBy" value="price"/> Price <br />
                <input type="radio" name="orderBy" value="name"/> Name
                
                <br><br>
                <input type="submit" value="Search" name="searchForm" />
                
            </form>
            <br />
        </div>
        <hr>
        <?=displaySearchResults()?>
    </body>
</html>