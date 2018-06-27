<?php

    function description(){
        $randomValue = rand(0,6);
        switch($randomValue){
            case 0: $c="moldy";
                break;
            case 1: $c="huge";
                break;
            case 2: $c="amazing";
                break;
            case 3: $c="damp";
                break;
            case 4: $c="smelly";
                break;
            case 5: $c="reserved";
                break;
            case 6: $c="regrettable";
                break;
        }
        return $c;
    }


    function eatiery(){
        $randomValue = rand(0,4);
        switch($randomValue){
            case 0: $a="McDonalds";
                break;
            case 1: $a="Wendys";
                break;
            case 2: $a="In and Out";
                break;
            case 3: $a="Jack in the Box";
                break;
            case 4: $a="Burger King";
                 break;
        }
        return $a;
    }
    function style(){
        $randomValue = rand(0,9);
        switch($randomValue){
            case 0: $b="Super";
                 break;
            case 1: $b="Double";
                 break;
            case 2: $b="Deluxe ";
                 break;
            case 3: $b="Jumbo";
                 break;
            case 4: $b="Gourmet";
                 break;
            case 5: $b="Fresh";
                 break;
            case 6: $b="Toasted";
                 break;
            case 7: $b="Western";
                 break;
            case 8: $b="Open Faced";
                 break;
            case 9: $b="Smokey";
                 break;
        }
        return$b;
    }
    function sandwichType(){
        $randomValue = rand(0,6);
        switch($randomValue){
            case 0: $c="Burger";
                 break;
            case 1: $c="Fish";
                 break;
            case 2: $c="ChimiChanga";
                 break;
            case 3: $c="Wrap";
                 break;
            case 4: $c="Nacho";
                 break;
            case 5: $c="Crunchy Frog";
                 break;
            case 6: $c="Vegetable";
                 break;
        }
        return $c;
    }
    function flourish(){
        $randomValue = rand(0,6);
        $flourishes = array("Diet","With Cheese","Lite","To go","Grill","On a sesame bun","Animal Style");
        return $flourishes[$randomValue];
    }
    
    function nameSandwich(){
        for($i=1; $i<2;$i++){

        }
        $a = eatiery();
        $b = style();
        $c = sandwichType();
        
        $b = "";
        $superlative = rand(1, 4);
        while($superlative > 0){
            $b = $b.style();
            $superlative--;
            if($superlative != 0){
                $b=$b." ";
            }
        }
        
        $doubleFlourish = rand(0,2);
        if($doubleFlourish==1){
            $d = flourish(). " ".flourish();
        }else{
            $d = flourish();
        }

        $fries = description();
        $shake = description();
        echo "<H1>$a $b $c $d!";
        for($i=1; $i<4;$i++){
            echo "!";
        }
        echo"</H1></br>";
    }
    
    function includedWith(){
        $fries = description();
        $shake = description();
        echo "<H2>$fries Fries and the $shake Shake in town!</H2>";
    }

    function looksLike(){
        $randomValue = rand(0,3);
        $images = array("a","b","c","d");
        $images[$randomValue];
        echo "<img src='./img/$images[$randomValue].jpeg' alt='It is probally better you can not see this' >";
    }
    
?>