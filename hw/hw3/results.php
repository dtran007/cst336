<!DOCTYPE html>
<html>
    <head>
        <title>HW3</title>
        
        <style>
            @import url("css/styles.css");
        </style>
        
    </head>
    <body>
        <!-- cast (int)$_POST['var'] -->
        <?php
        
            if( empty($_POST['name']) || empty($_POST['userGen']))
            {
                echo '<h2 class="warningText">I must know who you are!</h2>';
                echo '<br><h2 class="warningMsg">Please give me your name!</h2>';
                echo '<h3><a href="index.php">Try Again!</a></h3>';
            } 
            else 
            {
            echo "<div id='trainerResult'>";
            echo "That's right! You are " . $_POST['name'] ."!!!";
            echo "<br>The ". $_POST['userGen'] . " who wants to be a Pokemon Trainer!<br>";
            
            $squirtle = (int)$_POST['blue']+(int)$_POST['rad2']+(int)$_POST['rad4'];
            $charmander = (int)$_POST['red']+(int)$_POST['rad3']+(int)$_POST['rad6'];
            $bulbasaur = (int)$_POST['green']+(int)$_POST['rad1']+(int)$_POST['rad5'];
            
            $pokeArr = array("Charmander" => $charmander, "Squirtle" => $squirtle, "Bulbasaur" => $bulbasaur);
            $pokeChoice = array_search(max($pokeArr), $pokeArr);
            
            
            echo "<br>Your starter Pokemon is: ". $pokeChoice."<br><br>";
            
            echo "<img src='img/$pokeChoice.png' alt='$pokeChoice'>";
            
            echo "<div id='congrats'><br>Congratulations!<br></div>";
            
            echo "</div>";
            }
        ?>
        
        
    </body>
</html>