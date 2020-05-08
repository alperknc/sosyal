<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
include("admin/app/settings/fullsettings.php");
?>

<html>
<head>

    <title><?= $settings['title'] ?></title>

    <?php if (isset($settings['description'])): ?>
        <meta name="description" content="<?= $settings['description'] ?>">
    <?php endif; ?>

    <?php if (isset($settings['keywords'])): ?>
        <meta name="keywords" content="<?= $settings['keywords'] ?>">
    <?php endif; ?>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/animation.js"></script>

    <!-- CSS -->

    <script src="assets/js/register.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/regstyle.css">



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

<h2>SOSYAL</h2>

<div id="first">
    <div class="container" id="container">
        <div class="form-container sign-in-container">
            <form action="register.php" method="post">
                <h1>Giriş Yap</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Bilgilerinle giriş yap</span>
                <input type="email" name="log_email" placeholder="E-Posta" value="<?php if (isset($_SESSION['log_email'])) : echo  $_SESSION['log_email']; endif; ?>" required>
                <input type="password" name="log_password" placeholder="Şifre" required>

                <br>
                <?php if (in_array("Yanlış giriş!<br>", $error_array)) :
                    echo "Yanlış giriş!<br>";
                endif;
                ?>
                <a href="#"></a>
                <input type="hidden" name="log_button" value="Giriş">
                <button>Giriş Yap</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <h1>Merhaba</h1>
                    <p>Kişisel bilgilerinizi girin ve bizimle yolculuğa başlayın</p>
                    <button class="ghost" id="signup">Kayıt Ol</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="second">
    <div class="container right-panel-active" id="container">
        <div class="form-container right-panel-active sign-up-container right-panel-active">
            <form action="register.php" method="post">
                <h1>Hesap Oluştur</h1>
                <div class="social-container right-panel-active">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Bilgileri lütfen doldurun</span>
                <input type="text" name="reg_fname" placeholder="Ad" value="<?php if (isset($_SESSION['reg_fname'])) : echo  $_SESSION['reg_fname']; endif; ?>" required>

                <?php if (in_array("Ad 2-25 karakter arasında olmalı!<br>", $error_array)) :
                    echo "Ad 2-25 karakter arasında olmalı!<br>";
                endif;
                ?>
                <input type="text" name="reg_lname" placeholder="Soyad" value="<?php if (isset($_SESSION['reg_lname'])) : echo  $_SESSION['reg_lname']; endif; ?>" required>

                <?php if (in_array("SoyAd 2-25 karakter arasında olmalı!<br>", $error_array)) :
                    echo "SoyAd 2-25 karakter arasında olmalı!<br>";
                endif;
                ?>
                <input type="email" name="reg_email" placeholder="E-Posta" value="<?php if (isset($_SESSION['reg_email'])) : echo  $_SESSION['reg_email']; endif; ?>" required>

                <?php if (in_array("E-Posta Kayıtlı<br>", $error_array)) :
                    echo "E-Posta Kayıtlı<br>";


                elseif (in_array("<br>E-Posta doğru formatta değil!<br>", $error_array)) :
                    echo "E-Posta doğru formatta değil!<br>";

                endif;
                ?>
                <input type="password" name="reg_password" placeholder="Şifre" required>

                <?php if (in_array("Şifre Türkçe Karakter İçeremez<br>", $error_array)) :
                    echo "Şifre Türkçe Karakter İçeremez<br>";
                elseif (in_array("Şifre 5-30 karakter arasında olabilir!<br>", $error_array)) :
                    echo "Şifre 5-30 karakter arasında olabilir!<br>";
                endif;
                ?>
                <input type="hidden" name="register_button" value="Kayıt Ol">
                <button>Kayıt Ol</button>

                <?php if (in_array("<span style='color: #14CB00; font-size: 25px;'>Kayıt başarılı!</span><br>", $error_array)) :
                    echo "<span style='color: #14CB00; font-size: 25px;'>Kayıt başarılı!</span><br>";
                endif;
                ?>
            </form>
        </div>

        <div class="overlay-container right-panel-active">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Tekrar hoşgeldiniz!</h1>
                    <p>Bizimle bağlantıda kalmak için lütfen kişisel bilgilerinizle giriş yapın</p>
                    <button class="ghost" id="signin">Giriş Yap</button>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>