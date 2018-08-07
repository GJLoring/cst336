<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include './get_hero.php';
 ?>

<html>
    <head>
        <title> Final Exam: Part 2 </title>
        <script>
        	var superhero = "";
            var superheroRealName = "";

        </script>
        <script src="js/jquery.min.js"></script>
        <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                 $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        <style>
            body {
                text-align:center;
            }
        </style>        

    </head>
    <body>
    <h1> Final Links for Part one and two: </h1>
    <a href="index.php">Final Part 1</a><br>
    <a href="index_program2.php">Final Part 2</a> <br>  
        <div class="jumbotron">

            <h2>Select Superhero: </h2>

            <select name="superhero" id="superhero">
            <?php 
                get_hero_comic_names();
            ?>
            </select>


            </a>
            <br /><br />
            <input type="button" value="Search Movies!"/>
          
            
            <br /><br />
            <input type="button" value="Superhero Details"/>
            <a href="#" data-toggle="tooltip" title="Make AJAX call to display Superhero info (full name, place of birth, and image) and all of his/her enemies"><img src='img/info.png' width='15'></a>

            <br><br>
            <a href="history.php" target='searchHistory'> See search history </a>
            <a href="#" data-toggle="tooltip" title="Each time movies are searched,
            use an AJAX call to save into a Session the superhero searched. Use an iframe to display the history of superheroes movies searched."><img src='img/info.png' width='15'></a>

        </div>

        <div id="info">
        </div>

        <iframe name='searchHistory' width='300' height='800' frameborder=0></iframe>
        
 
   <table border="1" width="600" cellpadding="10">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The list of the superheroes in the dropdown menu is retrieved from the database (ordered alphabetically, no duplicates)<br></td>
      <td width="20" align="center">10</td>
    </tr> 
    <tr style="background-color:#FFFFFF">
      <td>2</td>
      <td>When clicking on the "Search Movies" button, the OMDB API is used to display the list of movies (<strong>poster</strong> and <strong>title</strong>) for the superhero selected<br></td>
      <td width="20" align="center">15 ( I have no idea why this button works )</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>3</td>
      <td> When clicking on the "Search Movies" button, the superhero selected is stored in a Session variable using AJAX<br></td>
      <td width="20" align="center">15</td>
    </tr>
     <tr style="background-color:#FFC0C0">
      <td>4</td>
      <td> When clicking on the "See Search History" link, the superheroes whose movies have been searched are displayed within an iFrame</td>
      <td width="20" align="center">15</td>
    </tr>   
     <tr style="background-color:#FFC0C0">
      <td>5</td>
      <td> When clicking on the "Superhero Details" button, an AJAX call is made to display all corresponding info (name, image, and pob)<br></td>
      <td width="20" align="center">15</td>
    </tr>  
     <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>When clicking on the "Superhero Details" button, the name and images of the superhero's enemies are displayed<br></td>
      <td width="20" align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>       
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
          
        
    </body>
</html>