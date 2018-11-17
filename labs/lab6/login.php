<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {text-align: center;}
            form {display: inline-block;}
            body {background-color: DeepSkyBlue;}
        </style>
        <title>Otter Mart - Admin Site</title>
    </head>
    <body>
        <h1>Otter Mart - Admin Site Login</h1><br><br>
  


        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/><br />
            Password: <input type="password" name="password"/><br />
    
            <input type="submit" name="submitForm" value="Login!"/>
            
            <?php
                if($_SESSION['incorrect']) {
                    echo "<p class='lead' id ='error' style='color:red'>";
                    echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            ?>
        </form>

    </body>

</html>