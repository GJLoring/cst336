<?php

    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

	include './dbConnection.php';
	$conn = getDatabaseConnection("ottermart");
    //if(isset($_GET['productId'])){
    //    $product = getProductInfo();
    //}

    function getCategories($catId)
    {
        global $conn;
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option ";
            echo ($record["catId"] == $catId)? "selected": "";
            echo " value = '" .$record["catId"]."'>".$record['catName']."</option>";
        }
    }

    function getProductInfo()
    {
        global $conn;
        $sql = "SELECT * FROM om_product WHERE productId = ". $_GET['productId'];

        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);

        return $record;
    }


    if(isset($_GET['productId'])){

        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = : productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];

        $statement = $conn->prepare($sql);
        $statement->execute($np);
        echo "Product has been updated!";

    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Update Product</title>        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <h1> OtterMart Product Update </h1>
    <form>
        <input type="hidden" name="productId" value="<?=$product['productId']?>"/>
        <strong>Product Name</strong> <input = "text" class="form-control" value="<?=$product['productName']?>" name= "productName"><br>
        <strong>Description</strong><textarea name="description" class="form-control" cols=50 rows = 4>value="<?=$product['productDescription']?>" </textarea><br>
        <strong>Price</strong><input type="text" class="form-control" name="price">value="<?=$product['price']?>" <br>
        
        <strong>Catagory</strong><select name="catId" class="form-control">
            <option value="">Select One</option>
            <?php getCategories($product['catId']); ?>
        </select><br />
        <strong>Set image URL</strong><input type="text" name="productImage" class="form-control"> value="<?=$product['productImage']?>" <br>
        <input type="submit" name="submitProduct" class="btn bnt-primary" value="Update Product">
    </form>
    </body>
</html>