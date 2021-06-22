<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #successful {
                font-family: Arial, Helvetica, sans-serif;
                color: #728C69;
            }
            #failed {
                font-family: Arial, Helvetica, sans-serif;
                color: #BC544B;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'mini_project');
        if (!$db) {
            die("Connection failed: ".mysqli_connect_error());
        }
        // initialize variable 
        $id = 0;
        $username = "";
        $psw = "";
        $psw_repeat = "";
        $errors = array();
        
        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $psw = $_POST['psw'];
            $psw_repeat = $_POST['psw_repeat'];
            if ($_POST['psw'] === $_POST['psw_repeat']) {
                $sql = "INSERT INTO register (username, psw, psw_repeat) "
                    . "VALUES ('$username', '$psw', '$psw_repeat')";
                if (mysqli_query($db, $sql)) {
                    $_SESSION['message'] = "Registration Saved!</span>";
                    
                } else {
                    $_SESSION['message'] = "<span stlye = 'color: #BC544B'>Registration Save Failed!";
                    
                }
            } else {
                $_SESSION['error']['message'] = "Passwords are different!";
            }
        }
        
        if (isset($_POST['login_user'])) {
            $username = $_POST['username'];
            $psw = $_POST['psw'];
            
            //to prevent from mysqli injection
            $username = stripcslashes($username);
            $psw = stripcslashes($psw);
            $username = mysqli_real_escape_string($db, $username);
            $psw = mysqli_real_escape_string($db, $psw);
            
            $sql = "SELECT * FROM register WHERE username='$username' AND psw='$psw'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            
            if($count == 1){
                echo "<h1 id='successful'><center>Login successful!</center></h1>";
            } else {
                echo"<h1 id='failed'><center>Login failed :( Invalid username or password!</center></h1>";
            }
        }
        
        ?>
    </body>
</html>
