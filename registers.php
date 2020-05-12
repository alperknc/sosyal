<html>
<head>

    <title>Başlık</title>

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
                <input type="email" name="log_email" placeholder="E-Posta" value="" required>
                <input type="password" name="log_password" placeholder="Şifre" required>

                <br>

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
                <input type="text" name="reg_fname" placeholder="Ad" value="" required>

                <input type="text" name="reg_lname" placeholder="Soyad" value="" required>

                <input type="email" name="reg_email" placeholder="E-Posta" value="" required>

                <input type="password" name="reg_password" placeholder="Şifre" required>

                <input type="hidden" name="register_button" value="Kayıt Ol">
                <button>Kayıt Ol</button>

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