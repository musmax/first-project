<?php
include'conn.php';
//include('app_logic.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

              
                
                <div class="signin-form">
                        <h2 class="form-title">Recovery Details</h2>
                        <p>A token will be sent to you through Email to recover your forgotten details</p>
                        <form method="POST" class="register-form" id="login-form" action = "login.inc.php">
                            <div class="form-group">
                                <label for="your_email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="emailz" id="your_name" placeholder="Your Email"/required>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pazzword" id="your_pass" placeholder="Password"/required>
                            </div>
                         
                        </form>
                            <div class="form-group form-button" value = "Reset">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Reset"/>
                            </div>
                       
                       
                   
            <!-- JS -->
   
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
                </div>
                    

    </body>
    </html>
  