<?php


        function displayCoin($randomValue) {
            
            $value = ($randomValue == 0 ? "heads" : "tails");
            
            echo "<img id='coin' src='img/$value.png' alt='heads' title='Heads' />";
   
        
        }
        
        function initialize() {
            $randomInt = rand(0,1);
            $coinArr = array($randomInt);
     
            $coinPass = implode(",", $coinArr);

            echo "<form action='index1.php' method='post'>";
            echo "<input type='hidden' name='coinPass' value='$coinPass' >";
            echo "<input type='hidden' name='int' value='$randomInt' >";
            echo "<input type='submit' value='Flip Coin'/>";
            echo "</form>";
            echo "</div>";
            
            
        }
        
        function play() {
            $randomInt = rand(0,1);
            displayCoin($randomInt);
            
            return $randomInt;
        }
        
        function flipCoin() {
            $getCoin = $_POST['coinPass'];
            $getInt = $_POST['int'];
            
            $randomInt = rand(0,1);

            $coinPass = $getCoin . "," . $randomInt;
            
            echo "<form action='index1.php' method='post'>";
            echo "<input type='hidden' name='coinPass' value='$coinPass' >";
            echo "<input type='hidden' name='int' value='$randomInt' >";
            echo "<input type='submit' value='Flip Coin'/>";
            echo "</form>";
            echo "</div>";
        }
        
        function flipCoin2($index, $randomInt, $coinPass) {
            
            echo "<form action='$index.php' method='post'>";
            echo "<input type='hidden' name='coinPass' value='$coinPass' >";
            echo "<input type='hidden' name='int' value='$randomInt' >";
            echo "<input type='submit' value='Flip Coin'/>";
            echo "</form>";
            echo "</div>";
        }
        
        function getVariable() {
            $getCoin = $_POST['coinPass'];
            $getInt = $_POST['int'];

        }
        
        function layout() {
            echo '<div class="row">';
            echo '<div class="white label">Heads Win</div>';
            echo '<div class="black label">Heads</div>';
            echo '<div class="white label">Start<br><br><img src="img/star.png" alt="Star" title="Star" /></div>';
            echo '<div class="black label">Tails</div>';
            echo '<div class="white label">Tails Win</div>';
            
            echo '<div class="clear"> </div>';
        
        }
        
        function firstHead() {
            echo '<div class="row">';
            echo '<div class="white label">Heads Win</div>';
            echo '<div class="black label">Heads<br><br><img src="img/star.png" alt="Star" title="Star" /></div>';
            echo '<div class="white label">Start</div>';
            echo '<div class="black label">Tails</div>';
            echo '<div class="white label">Tails Win</div>';
            
            echo '<div class="clear"> </div>';   
        }
        
        function winHead() {
            echo '<div class="row">';
            echo '<div class="white label">Heads Win<br><br><img src="img/star.png" alt="Star" title="Star" /></div>';
            echo '<div class="black label">Heads</div>';
            echo '<div class="white label">Start</div>';
            echo '<div class="black label">Tails</div>';
            echo '<div class="white label">Tails Win</div>';
            
            echo '<div class="clear"> </div>';   
        }
        
        function firstTail() {
            echo '<div class="row">';
            echo '<div class="white label">Heads Win</div>';
            echo '<div class="black label">Heads</div>';
            echo '<div class="white label">Start</div>';
            echo '<div class="black label">Tails<br><br><img src="img/star.png" alt="Star" title="Star" /></div>';
            echo '<div class="white label">Tails Win</div>';
            
            echo '<div class="clear"> </div>';   
        }
        
        function winTail() {
            echo '<div class="row">';
            echo '<div class="white label">Heads Win</div>';
            echo '<div class="black label">Heads</div>';
            echo '<div class="white label">Start</div>';
            echo '<div class="black label">Tails</div>';
            echo '<div class="white label">Tails Win<br><br><img src="img/star.png" alt="Star" title="Star" /></div>';
            
            echo '<div class="clear"> </div>';   
        }
        
     
        
        function turns($string) {
            $turnArr = explode(",", $string);
            $faceArr = array();
            for($i=0; $i<count($turnArr); $i++)
            {
                if($turnArr[$i] == 0) {
                    array_push($faceArr, "Heads");
                } else {
                    array_push($faceArr, "Tails");
                }
            }
            
            $faceString = implode(",",$faceArr);
            echo "<br><br><h3>Your spins were: '$faceString'</h3>";
            
        }
        
        function counter($string) {
            $countArr = explode(",", $string);
            $counterVar = 0;
            for($i=0; $i<count($countArr); $i++) {
                $counterVar++;
            }
            
            echo "<br><br><h3>Total spin count: '$counterVar'</h3>";
        }

?>