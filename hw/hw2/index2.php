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
                
                $getInt = $_POST['int'];
                if($getInt == 0) {
                    winHead();
                } else {
                    winTail();
                }
                
                displayCoin($getInt);
                
                echo "<h2>You Win!</h2>";
                
            ?>
        </div>    
        
        <div class="results">
        <?php
            $getCoin = $_POST['coinPass'];
            
            turns($getCoin);
            
            counter($getCoin);
            

        ?>
        </div>
    
    </body>

</html>