<?php
require 'includes/classes/Login.php';
$login = new Login($con);
$login->isAdmin($con);
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Smart Form Login</title>
        <link rel="stylesheet" href="adminassets/css/login.css">
        <link rel="stylesheet" href="adminassets/css/font-awesome.min.css">
        <script src="adminassets/js/jquery-1.9.1.min.js"></script>
        <script src="adminassets/js/plugins.js"></script>
        <script src="adminassets/js/login.js"></script>
    </head>
    <body class="smartbg">
        <form method="post" action="login.php" class="smartLogin" id="loginfm">
        <div class="smart-container">
            <div class="frm-header">
            	<h4><i class="fa fa-lock"></i> Admin Login </h4>
            </div><!-- end .frm-header section -->            
            <div class="frm-body">
                <div class="elem-group colm colm6">
                    <label class="field">
                        <input type="text" name="username" id="username" class="flo-input" placeholder="Username">
                    </label>                            
                </div><!-- end .colm .elem-group section -->
                <div class="elem-group colm colm6">
                    <label class="field">
                        <input type="password" name="password" id="password" class="flo-input" placeholder="Password">
                    </label>                            
                </div><!-- end .colm .elem-group section -->
                <div class="response"></div><!-- end .response  section -->
            </div><!-- .frm-body -->
            <div class="frm-footer">
                <button type="submit" class="flo-button">Login</button>
            </div><!-- end .frm-footer section -->
        </div>                  
        </form>
    </body>
</html>