<?php
   ini_set('display_errors', 'On');
   error_reporting(E_ALL);

   session_start();
 ?>

<?php
    function validateFormWithPHP(){
        if(isset($_GET['validatdeForm'])){
            
            $message = "Processed Inputs:";
            $message = $message."<br>The Validation Form Submit returned ".$_GET['validatdeForm'];
            $message = $message."<br>The Text Box return converted to Upper Case is ". strtoupper($_GET['textBox']);        
            $message = $message."<br>The Drop Down Box return was ". strtoupper($_GET['dropDown']);           
            $message = $message."<br>The Selected Radio Button was ";
            if($_GET['radioButtons']!='XOROptionA'){
                $message = $message."A"; 
            }elseif($_GET['radioButtons']!='XOROptionB'){
                $message = $message."B"; 
            }else{
               $message = $message."C";     
            }
            echo '<h3>'.$message.'</h3><br>';
    
            echo "<h3>Errors Noted during form validation:</h3>";
                
        
            echo '<div id="errorText">';
            if(!empty($_GET['textBox'])){
                $_SESSION["textBox"]= $_GET['textBox'];
                if($_GET['textBox'] != "Correct"){
                    echo '<h3>Text Box must have text "Correct" entered, not: '.$_GET['textBox'].'</h3>';
                }
            }else{
                echo '<h3> Text Box must not be empty, set it to "Correct"</h3>';
            }
    
            if(!empty($_GET['dropDown'])){
                $_SESSION["dropDown"]= $_GET['dropDown'];
                if($_GET['dropDown'] != "Correct"){
                    echo '<h3>The Drop down box needs to be set, set it to "Correct", not: '.$_GET['dropDown'].'</h3>';
                }
            }
    
            if(isset($_GET['radioButtons'])){
                $_SESSION["radioButtons"]= $_GET['radioButtons'];
                if($_GET['radioButtons']!='XOROptionB'){
                    echo '<h3>Radio Button B must be selected</h3>';
                }
            }else{
                echo '<h3> Radio Button XOR Option B must be selected</h3>';
            }
            echo '</div>';
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Form Demonstration Page </title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="introText">
                <h1> Demonstrate Validation of Form Elements with PHP </h1>

            <img 
                id = "logo"
                src="img/logo.png" 
                alt="CSUMB Logo">
                <p>This page has several HTML Form elements, each has correct and incorrect options, select the correct options.</p>

            <form>

                Form Element 1, Type Text Box (enter the string "Correct" or recive an error )<input type="text" name="textBox" value="<?php echo isset($_SESSION["textBox"]) ? $_SESSION['textBox'] : '' ?>"  />
                <br />
                Form Element 2, Type Drop Down, Select the one labeled "Correct":
                    <select name="dropDown">
                        <option value="none" <?php echo ($_SESSION['dropDown'] == "none") ? 'selected="selected"' : '';?> ></option>
                        <option value="wrong" <?php echo ($_SESSION['dropDown'] == "wrong") ? 'selected="selected"' : '';?> >wrong</option>
                        <option value="bad" <?php echo ($_SESSION['dropDown'] == "bad") ? 'selected="selected"' : '';?> >bad</option>
                        <option value="Correct" <?php echo ($_SESSION['dropDown'] == "Correct") ? 'selected="selected"' : '';?> >Correct</option>
                        <option value="false" <?php echo ($_SESSION['dropDown'] == "false") ? 'selected="selected"' : '';?> >false</option>
                    </select>
                <br>
                Form Element 3-5, Type Radio Buttons:
                <br>
                <input type="radio" name="radioButtons" id="XOROptionA" value="XOROptionA" <?php echo ($_SESSION['radioButtons'] == "XOROptionA") ? 'checked="checked"' : '';?> /><label for="XOROptionA"> XOR Option A </label><br />
                <input type="radio" name="radioButtons" id="XOROptionB" value="XOROptionB" <?php echo ($_SESSION['radioButtons'] == "XOROptionB") ? 'checked="checked"' : '';?> /><label for="XOROptionB"> XOR Option B (Check this one)</label><br />
                <input type="radio" name="radioButtons" id="XOROptionC" value="XOROptionC" <?php echo ($_SESSION['radioButtons'] == "XOROptionC") ? 'checked="checked"' : '';?> /><label for="XOROptionC"> XOR Option C</label><br />
                <br>
                Form Element 6, Type Submit:<input type="submit" value="Validate" name="validatdeForm" />

            </form>
            <br />
        </div>
        <hr>
        <?=validateFormWithPHP()?>
    </body>
    <footer>
      <p>Posted by: Gabriel Loring to demonstrate PHP form processing, session managment and feedback</p>
    </footer>
</html>