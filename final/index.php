<?php 
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include './get_hero.php';
    get_rand_hero();
 ?>

<html>
    <head>
        <title> Final Exam: Part 1</title>
        <script src="js/jquery.min.js"></script>
        <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.min.js"></script>
        <script>
            var superhero =  <?php echo json_encode($_SESSION['Name']) ?>;
            var superheroRealName = <?php echo json_encode($_SESSION['FirstName']. " ". $_SESSION['LastName']) ?>;
            $(document).ready(function(){
                 $('[data-toggle="tooltip"]').tooltip(); 
            });
        </script>
        
        <style>
            .jumbotron, #feedback, #stats {
                text-align:center;
                margin:0px;
            }
        </style>        
    </head>
    <body>
    <h1> Final Links for Part one and two: </h1>
    <a href="index.php">Final Part 1</a><br>
    <a href="index_program2.php">Final Part 2</a> <br>  
       <div class="jumbotron">
    <h3>What is the real name of the following superhero?</h3>
    <?php
        /*
        get_rand_hero();

        echo $_SESSION['Name']  . "<br>";
        echo $_SESSION['FirstName']  . "<br>";
        echo $_SESSION['LastName']  . "<br>";
        echo $_SESSION['POB']  . "<br>";
        echo $_SESSION['Image']  . "<br>";*/
    ?>
    <?php echo $_SESSION['Image'] ?>

    <form>
        <select>
          <option name='guessedname' value=""> Select One </option>
         <?php 
             get_hero_names();
         ?>

        <br /><br />
        <input type="button" value="Check Answer" />
    </form>
    <br />
    </div>
    
    <div id="feedback">  
        <?php
            /*echo $_SESSION['Name']  . "<br>";*/
        ?>
    </div>

    <div id="stats">
    </div>
    


   <h3>Note:<br></h3>My Ajax code in ./js/score is not being hit, I copied the sample and add my code for DB access ( seems to work ).<br>
   But for the life of me I have no idea what ajax code is being executed, I can see in the debug the names of the elements and matched them,
   but mine did not take precedent.<br>
   So I marked these elements white in the rubric they are working, although, I really am not doing them.<br>
   My pages do not link to anything exeternal save the open source jquery and bootstrap. <br>
   However a simple text search of the project shows that the result strings are nowhere present in my code.
  
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#99E999">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:#99E999">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFFFFF">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15 ( Honestly I have no clue where this is coming from, it is not hitting my aajx function )</td>
    </tr>     

     <tr style="background-color:#FFFFFF">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15 ( Honestly I have no clue where this is coming from, it is not hitting my aajx function )</td>
    </tr>
     
     <tr style="background-color:#FFFFFF">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5 ( Honestly I have no clue where this is coming from, it is not hitting my aajx function )</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>
  <script type="text/javascript" src="js/score.js"></script>
      </body>

  </html>