<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <?php
        
        include 'inc/functions.php';

        ?>
        <style>
            @import url("css/styles.css");
        </style>
        <script type="text/javascript">
            function play_jackpot() {
                var soundFile = document.createElement('audio');
                soundFile.setAttribute('src', './mp3/jackpot.mp3');
                soundFile.setAttribute('autoplay', 'autoplay');
                soundFile.load();
                soundFile.play();
            }
        </script>
    </head>
    <body>
        <div id="main">
            <?php
                play();
            ?>
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
    </body>
</html>