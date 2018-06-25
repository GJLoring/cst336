<?php
    function displayPoints($randomValue1, $randomValue2, $randomValue3){
        echo "<div id='ouput'>";
        
        # If a bar appears add 900 to the totalpoints
        $bar = 3;
        $totalPoints = 0;
        if($randomValue1 == $bar || $randomValue2 == $bar || $randomValue3 == $bar ){
            $totalPoints = $totalPoints + 900;
        }
        
        if($randomValue1 == $randomValue2 && $randomValue3 == $randomValue2){
            switch($randomValue1){
                case 0: $totalPoints = $totalPoints + 1000;
                echo "<h1>Jackpot!</h1>";
                    break;
                case 1: $totalPoints = $totalPoints + 500;
                    break;
                case 2: $totalPoints = $totalPoints + 250;
                    break;   
            }
        }
        
        #If total points is not zero display win
        if($totalPoints != 0){
            echo "<h2>You won $totalPoints points!</h2>";
            echo '<script type="text/javascript">play_jackpot();</script>';
        }else{
            echo "<h3>Try Again!</h3>";
            echo '<script type="text/javascript">play_jackpot();</script>';
        }
        echo "</div>";
        
    }
    
    function displaySymbol($randomValue, $pos){
        switch($randomValue){
            case 0: $symbol="seven";
                break;
            case 1: $symbol="cherry";
                break;
            case 2: $symbol="lemon";
                break;
            case 3: $symbol="bar";
                break;
        }
        
        echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' width='70' />";

    }
    
    function play(){
        for($i=1; $i<4;$i++){
            ${"randomValue" . $i} = rand(0,3);
            displaySymbol(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
?>