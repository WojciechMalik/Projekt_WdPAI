<!DOCTYPE html>
<html>
    <head>
        <title>OnBudget | Login</title>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <?php include "header.php" ?>
        <script type="text/javascript" src="./public/js/script.js" defer></script>
    </head>
    <body>
        <div class="container">
            <h1>Welcome to <span><br/>On</span>Budget!</h1>
            <form>
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
                <div class="input-container">
                    <img src="public/img/mail-icon.svg" height="20" width="20">
                    <input name="email" type="text" placeholder="Mail">
                </div>
                <div class="input-container">
                    <img src="public/img/password-icon.svg" height="20" width="20">
                    <input name="password" type="password" placeholder="Password">
                </div>
                <div class="input-container">
                    <img src="public/img/password-icon.svg" height="20" width="20">
                    <input name="confirm-password" type="password" placeholder="Confirm Password">
                </div>
                <div class="input-container">
                    <img src="public/img/username-icon.svg" height="20" width="20">
                    <input name="name" type="text" placeholder="Name">
                </div>
                <div class="input-container">
                    <img src="public/img/username-icon.svg" height="20" width="20">
                    <input name="surname" type="text" placeholder="Surname">
                </div>
                <button>Submit</button>
            </form>
            <p>Already have an account? <a href="login">Login</a></p>
        </div>
    </body>
</html>

