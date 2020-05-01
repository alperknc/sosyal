<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sosyal</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

<?php
    if (isset($_POST['register_button'])) :
        echo '
            <script> 
                $(document).ready(function() {
                  $("#first").hide();
                  $("#second").show();
                })
            </script>
        ';
    endif;
?>


<div class="wrapper">

    <div class="login_box">
        <div class="login_header">
            <h1>Social</h1>
            Giriş yap veya Kayıt ol!
        </div>

        <div id="first">

            <form action="register.php" method="post">
                <input type="email" name="log_email" placeholder="E-Posta" value="<?php if (isset($_SESSION['log_email'])) : echo  $_SESSION['log_email']; endif; ?>" required>
                <br>
                <input type="password" name="log_password" placeholder="Şifre" required>
                <br>
                <?php if (in_array("Yanlış giriş!<br>", $error_array)) :
                    echo "Yanlış giriş!<br>";
                endif;
                ?>
                <input type="submit" name="log_button" value="Giriş">
                <br><br>
                <a href="#" id="signup" class="signup">Kayıt Sayfasına Git</a>
            </form>

        </div>

    <div id="second">

        <form action="register.php" method="post">
            <input type="text" name="reg_fname" placeholder="Ad" value="<?php if (isset($_SESSION['reg_fname'])) : echo  $_SESSION['reg_fname']; endif; ?>" required>
            <br>
            <?php if (in_array("Ad 2-25 karakter arasında olmalı!<br>", $error_array)) :
                echo "Ad 2-25 karakter arasında olmalı!<br>";
            endif;
            ?>
            <input type="text" name="reg_lname" placeholder="Soyad" value="<?php if (isset($_SESSION['reg_lname'])) : echo  $_SESSION['reg_lname']; endif; ?>" required>
            <br>
            <?php if (in_array("SoyAd 2-25 karakter arasında olmalı!<br>", $error_array)) :
                echo "SoyAd 2-25 karakter arasında olmalı!<br>";
            endif;
            ?>
            <input type="email" name="reg_email" placeholder="E-Posta" value="<?php if (isset($_SESSION['reg_email'])) : echo  $_SESSION['reg_email']; endif; ?>" required>
            <br>
            <input type="email" name="reg_email2" placeholder="E-Posta Doğrula" value="<?php if (isset($_SESSION['reg_email2'])) : echo  $_SESSION['reg_email2']; endif; ?>" required>
            <br>
            <?php if (in_array("E-Posta Kayıtlı<br>", $error_array)) :
                echo "E-Posta Kayıtlı<br>";


            elseif (in_array("E-Posta doğru formatta değil!<br>", $error_array)) :
                echo "E-Posta doğru formatta değil!<br>";

            elseif (in_array("E-Posta Eşleşmedi<br>", $error_array)) :
                echo "E-Posta Eşleşmedi<br>";
            endif;
            ?>
            <input type="password" name="reg_password" placeholder="Şifre" required>
            <br>
            <input type="password" name="reg_password2" placeholder="Şifre Doğrula" required>
            <br>
            <?php if (in_array("Şifreler eşleşmiyor!<br>", $error_array)) :
                echo "Şifreler eşleşmiyor!<br>";
            elseif (in_array("Şifre Türkçe Karakter İçeremez<br>", $error_array)) :
                echo "Şifre Türkçe Karakter İçeremez<br>";
            elseif (in_array("Şifre 5-30 karakter arasında olabilir!<br>", $error_array)) :
                echo "Şifre 5-30 karakter arasında olabilir!<br>";
            endif;
            ?>
            <input type="submit" name="register_button" value="Kayıt Ol">
            <br>
            <?php if (in_array("<span style='color: #14CB00;'>Kayıt başırılı Giriş yap!</span><br>", $error_array)) :
                echo "<span style='color: #14CB00;'>Kayıt başırılı Giriş yap!</span><br>";
            endif;
            ?>
            <br>
            <a href="#" id="signin" class="signin">Giriş Sayfasına Git</a>
        </form>

    </div>

    </div>
</div>

</body>
</html>