<!DOCTYPE html>
<html>
    <head>
        <title>OnBudget | Sign Up</title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <?php include "header.php" ?>
    </head>
    <body>
        <div class="container">
            <h1>Welcome to <span><br/>On</span>Budget!</h1>
            <form action="login" method="POST">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <div class="input-container">
                    <img src="public/img/mail-icon.svg" height="20" width="20">
                    <input name="email" type="text" placeholder="Mail">
                </div>
                <div class="input-container">
                    <img src="public/img/password-icon.svg" height="20" width="20">
                    <input name="password" type="password" placeholder="Password">
                </div>
                
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="#">Sign Up</a></p>
        </div>
    </body>
</html>

