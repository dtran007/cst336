<?php
    include 'inc/functions.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HW2</title>
        
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"> 
        
    </head>
    <body>
       <h1 id="title">Spin Two Of The Same Faces To Win</h1>
       
        
        <div class="container">
            
            <?php
   
                $int = $_POST['int'];
           
                if($int == 0) {
                    firstHead();
                } else {
                    firstTail();
                }
            displayCoin($int);
                
                $randomInt = rand(0,1);
           
                
                $getCoin = $_POST['coinPass'];
                $coinPass = $getCoin.",".$randomInt;
                
                if($int == $randomInt) {
                    flipCoin2("index2", $randomInt, $coinPass);
                } else {
                    flipCoin2("index0", $randomInt, $coinPass);
                }
                
            ?>
        </div>    
        

    
    </body>

</html>