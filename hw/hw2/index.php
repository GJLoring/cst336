<!DOCTYPE html>
<html>
    <head>
        <title> Fast Food Marketing Generator </title>
        <?php
        
        include 'inc/functions.php';

        ?>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="name">
            <?php
                nameSandwich();
            ?>
        </div>
        <div id="image">
            <?php
                looksLike();
            ?>
        </div>
         <div id="includes">
            <?php
                includedWith();;
            ?>
        </div>
    </body>
    <footer>
  <p>Posted by: Gabriel Loring</p>
  <p>Food items posted are experimental and should not be eaten by anyone</p>
</footer>
</html>