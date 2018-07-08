<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
 ?>
 
<?php
    $backgroundImage = "img/sea.jpg";
    $layoutHV = "horizontal";   
    if(isset($_GET['keyword'])){
        include './api/pixabayAPI.php';
        $keyword = $_GET['keyword'];
        $layoutHV = $_GET['layout'];
        echo $layoutHV;
        $imageURLs = getImageURLs($keyword, $layoutHV);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
        echo '<pre>';
            var_dump($imageURLs); 
        echo '</pre>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <style>
            @import url("css/styles.css");
            body {
               background-image: url(<?=$backgroundImage?>); background-attachment: fixed; background-size: 100% 100%;
            }
        </style>
    </head>
    <body>
        <br>
        <?php

            printf("keyword:\t%s.\n",$_GET['keyword']);
            printf("category:\t%s.\n",$_GET['category']);
            printf("boolean:\t%s.",(empty($_GET['keyword']) and !isset($_POST['category'])));
            if(empty($_GET['keyword']) and empty($_POST['category'])){ // form not submitted due to missing type
            //if(!isset($imageURLs)){ // form not submitted due to missing type
                echo "<h2>Must type a keyword to display a slide show of random images</h2>";
            }else{
                // form submitted
        ?>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                         for($i = 0; $i <7; $i++){
                            echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                            echo ($i==0)? "class='active'" : "";
                            echo "></li>";
                        }
                    ?>
                </ol>

            <div class="carousel-inner" role="listbox">
                  <?php
                     for($i = 0; $i < 7; $i++){
                        do{
                              $randomIndex = rand(0, count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
         
                        echo '<div class="item ';
                        echo ($i== 0)? "active" : "";
                        echo '">';
                        echo '<img src="' .$imageURLs[$randomIndex]. '">';
                        echo '</div>';
                        //echo '<div class="carousel-caption">...</div></div>';
                        unset($imageURLs[$randomIndex]);
                     }
                  ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <?php
            } //endfile
        ?>
        <br>

        <div id="layoutDiv" align="center">
        <form>
            <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
            </br>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            </br>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            </br>
            <select name="category">
                <option value="">Select One</option>
                <option value="ocean">Sea</option>
                <option value="forest">Forest</option>
                <option value="mountain">Mountain</option>
                <option value="snow">Snow</option>
            </select>
            </br>
            <input type="submit" value="Search" />
            
        </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>        
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    </body>
</html>