<!DOCTYPE html>
<html>
    <head>
        <title>HW3</title>
        
        <style>
            @import url("css/styles.css");
        </style>
        <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet"> 
        
    </head>
    <body>
        <h1 id="title"><span id="spanone">Starter</span> <span id="spantwo">Pokemon</span> <span id="spanthree">Selection</span></h1>
        
        <div class="images">
            <img src="img/pokeball.png" alt="Pokeball">
        </div>
        
        <div class="divCenter">
        
        <form action='results.php' method='post'>
            <table class="tableClass">
            <!-- text -->
            <tr>
                <td>What was your name again?</td>
                <td colspan="3"><input type='text' name='name'></td>
            </tr>
            
            <!-- select -->
            <tr>
                <td>Are you a boy or a girl?</td>
                <td colspan="3">
                    <select name="userGen" size="1">
                    <option>boy</option>
                    <option>girl</option>
                    </select>
                </td>
            </tr>
            
            <!-- radio -->
            <!-- Q1 -->
            
            <tr id="radioID">
                <td></td>
                <td>Disagree</td>
                <td>Neutral</td>
                <td>Agree</td>
            </tr>
            <tr id="radioID">
                <td>A balanced pokemon is the best trait.</td>
                <td><input type="radio" name="rad1" value="-1"></td>
                <td><input type="radio" name="rad1" value="0"></td>
                <td><input type="radio" name="rad1" value="1"></td>
            </tr>
            <!-- Q2 -->
            <tr id="radioID">
                <td>A good offense is a strong defense.</td>
                <td><input type="radio" name="rad2" value="-1"></td>
                <td><input type="radio" name="rad2" value="0"></td>
                <td><input type="radio" name="rad2" value="1"></td>
            </tr>
            <!-- Q3 -->
            <tr id="radioID">
                <td>Pure strength is the greatest quality.</td>
                <td><input type="radio" name="rad3" value="-1"></td>
                <td><input type="radio" name="rad3" value="0"></td>
                <td><input type="radio" name="rad3" value="1"></td>
            </tr>
            <!-- Q4 -->
            <tr id="radioID">
                <td>Rainy days are the best.</td>
                <td><input type="radio" name="rad4" value="-1"></td>
                <td><input type="radio" name="rad4" value="0"></td>
                <td><input type="radio" name="rad4" value="1"></td>
            </tr>
            <!-- Q5 -->
            <tr id="radioID">
                <td>Sunny days are the best.</td>
                <td><input type="radio" name="rad5" value="-1"></td>
                <td><input type="radio" name="rad5" value="0"></td>
                <td><input type="radio" name="rad5" value="1"></td>
            </tr>
            <!-- Q6 -->
            <tr id="radioID">
                <td>Hot climates are ideal.</td>
                <td><input type="radio" name="rad6" value="-1"></td>
                <td><input type="radio" name="rad6" value="0"></td>
                <td><input type="radio" name="rad6" value="1"></td>
            </tr>

            <!-- checkbox for multiple checks--> 

            <tr>
                <td>Color</td>
                <td>Red<input type="checkbox" name="red" value="1"></td>
                <td>Blue<input type="checkbox" name="blue" value="1"></td>
                <td>Green<input type="checkbox" name="green" value="1"></td>
            </tr>
            
            <!-- Textarea -->
            <tr>
                <td>Lastly, tell me about yourself!</td>
                <td colspan="3">
                    <textarea name="userText" rows="5" cols="50">
                         
                    </textarea>
                </td>
            </tr>
            
            <tr>
                <td></td>
                <td colspan="3">
                    <input type='submit' value='Submit'>
                </td>
            </tr>
            </table
        </form>
        
        </div>
        
    </body>
</html>