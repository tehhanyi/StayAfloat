<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'server.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Register form </title>
        <link rel="stylesheet" type="text/css" href="register_stylesheet.css">
        <link href="login_stylesheet.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        
        <?php
        if (isset($_SESSION['message'])): ?>
        <div class="msg" style="color:#728C69">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php endif ?>
        
        <?php if (isset($_SESSION['error']['message'])): ?>
        <div class="errmsg" style="color:#BC544B">
            <?php
            echo $_SESSION['error']['message'];
            unset($_SESSION['error']['message']);
            ?>
        </div>
        <?php endif ?>
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" >
        
            <div class="container">
                <h1>Register</h1>
                <p>Please fill in this form to create an account.</p>
                <hr>
                
                <input type="hidden" name="id">
                
                <label for="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>
                
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                
                <label for="psw_repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw_repeat" id="psw_repeat" required>
                <hr>
                
                <button type="submit" class="registerbtn" name="register">Register</button>
            </div>
            
            <div class="container signin">
                <p>Already have an account? <a href="http://localhost:8080/CSADMiniProject/login.php">Log in</a>.</p>
            </div>
            
        </form>
         <footer class="footer-distributed">
        <img src="corgi.png" height="165">
        <div class="footer-left">
            <h3>Stay Afloat</h3>
            <span style="font-size: 14px; color: #CFB997;">My mind. My participation. </span><br><br>
                <span>Aim of our project:</span>
                <p>We hope to promote mind training as well as active online participation from our users!</p>
            <p class="footer-name">© 2021 CSAD Mini Project <3</p>
        </div>

        <div class="footer-right">
            <p class="footer-about">
                <p class="footer-links">
                <a href="http://localhost:8080/CSADMiniProject/login.php">Home</a>
                |
                <a href="http://localhost:8080/CSADMiniProject/game.php">Game</a>
                |
                <a href="http://localhost:8080/CSADMiniProject/about_page.html">About us</a>
                |
                <a href="http://localhost:8080/CSADMiniProject/forum.php">Discussion Forum</a></p>
            <div>
                <i class="envelope"></i>
                <p>Contact us: <br>
                    <a href="mailto:anushka.19@ichat.sp.edu.sg">anushka.19@ichat.sp.edu.sg</a> |
                    <a href="mailto:yeoaugustine.19@ichat.sp.edu.sg">yeoaugustine.19@ichat.sp.edu.sg</a> |
                    <a href="mailto:hanyi.20@ichat.sp.edu.sg">hanyi.20@ichat.sp.edu.sg</a> |
                    <a href="mailto:michellemt.19@ichat.sp.edu.sg">michellemt.19@ichat.sp.edu.sg</a>
                </p>
            </div>
        </div>
    </footer>
    </body>
</html>
