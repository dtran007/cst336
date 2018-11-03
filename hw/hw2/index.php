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
                layout();
            ?>
        </div>    
        

        <?php
        
            echo '<div class="coinform">';
            
            initialize();
        
            

        ?>
     
    
    </body>

</html>