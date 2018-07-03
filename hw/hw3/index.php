<!DOCTYPE html>
<html>
    <head>
        <title> Fast Food Marketing Generator </title>
        <?php
        
        include 'inc/functions.php';

        ?>
        <style>
            @import url("css/style.css");
        </style>
    </head>
    <body>
        <div id="plate">
            <img src='./img/plate.jpeg' alt='Plate' >
            <div id="name">
                <?php
                    nameSandwich();
                ?>
                       <?php
                    looksLike();
                ?>
            </div>



             <div id="includes">
                <?php
                    includedWith();;
                ?>
            </div>
        </div> 
    </body>
    <footer>
  <p>Posted by: Gabriel Loring</p>
  <p>Food items posted are experimental and should not be eaten by anyone</p>
</footer>
</html>