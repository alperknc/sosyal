<?php
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array(); //Hata mesajları

if (isset($_POST['register_button'])) :
    //Ad
    $fname = strip_tags($_POST['reg_fname']);
    $fname = str_replace(' ', '', $fname);
    $fname = ucfirst(mb_strtolower($fname, 'utf8'));
    $_SESSION['reg_fname'] = $fname;
    //Soyad
    $lname = strip_tags($_POST['reg_lname']);
    $lname = str_replace(' ', '', $lname);
    $lname = ucfirst(mb_strtolower($lname, 'utf8'));
    $_SESSION['reg_lname'] = $lname;
    //E-Posta
    $em = strip_tags($_POST['reg_email']);
    $em = str_replace(' ', '', $em);
    $em = ucfirst(mb_strtolower($em, 'utf8'));
    $_SESSION['reg_email'] = $em;
    //E-Posta 2
    $em2 = strip_tags($_POST['reg_email2']);
    $em2 = str_replace(' ', '', $em2);
    $em2 = ucfirst(mb_strtolower($em2, 'utf8'));
    $_SESSION['reg_email2'] = $em2;
    //Şifre
    $password = strip_tags($_POST['reg_password']);
    //Şifre 2
    $password2 = strip_tags($_POST['reg_password2']);
    //Gün
    $date = date("Y-m-d");

    if ($em == $em2) :

        if (filter_var($em, FILTER_VALIDATE_EMAIL)) :
            $em = filter_var($em, FILTER_VALIDATE_EMAIL);
            //E-Posta Kayıtlımı
            $e_check = mysqli_query($con, "select email from users where email ='$em' ");
            //Dönen kayıt saydırma
            $num_rows = mysqli_num_rows($e_check);

            if ($num_rows > 0) :
                array_push($error_array, "E-Posta Kayıtlı<br>");
            endif; //Eposta kayıtlımı

        else :
            array_push($error_array, "E-Posta doğru formatta değil!<br>");
        endif;//E-Posta Format Kontrol

    else :
        array_push($error_array,"E-Posta Eşleşmedi<br>");
    endif;//E-Posta Eşleştirme

    if (strlen($fname) > 25 || strlen($fname) < 2) :
        array_push($error_array,"Ad 2-25 karakter arasında olmalı!<br>");
    endif; //İsim Karakter Sınırı

    if (strlen($lname) > 25 || strlen($lname) < 2) :
        array_push($error_array, "SoyAd 2-25 karakter arasında olmalı!<br>");
    endif; //Soyisim Karakter Sınırı

    if ($password != $password2) :
        array_push($error_array, "Şifreler eşleşmiyor!<br>");
    else :
        if (preg_match('/[^A-Za-z0-9]/', $password)) :
            array_push($error_array, "Şifre Türkçe Karakter İçeremez<br>");
        endif; //Şifre karakter kontrol

    endif;//Şifreler eşleşiyormu

    if (strlen($password) > 30 || strlen($password) < 5) :
        array_push($error_array, "Şifre 5-30 karakter arasında olabilir!<br>");
    endif;//Şifre karakter sayısı kontrol

    if (empty($error_array)) :
        $password = md5($password);
        //Kullanıcı Adı Üretme
        $username = mb_strtolower($fname . "_" . $lname, 'utf8');
        //Türkçe karakter temizlik
        $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
        $replace = array('c','c','g','g','i','i','o','o','s','s','u','u','-');

        $username = str_replace($search,$replace,$username);
        //Kayıtlı kullanıcı varmı kontrol
        $check_username_query = mysqli_query($con, "select username from users where username='$username'");

        $i = 0;
        //Kullanıcı varsa 1 arttır
        while(mysqli_num_rows($check_username_query) != 0) :
            $i++;
            $fusername = $username . "_" . $i;
            $check_username_query = mysqli_query($con, "select username from users where username='$fusername'");
        endwhile; // Eşsiz kullanıcı adı oluşturur
        if (isset($fusername)) :
        $username = $fusername;
        endif;

        //Profil fotoğrafı
        $rand = rand(1,2);
        if ($rand == 1) :
            $profile_pic = "assets/images/profile_pics/default/head_carrot.png";
        elseif ($rand == 2) :
            $profile_pic = "assets/images/profile_pics/default/head_sun_flower.png";
        endif; // Rasgele profil foto

        $query = mysqli_query($con, "insert into users values ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

        array_push($error_array, "<span style='color: #14CB00;'>Kayıt başırılı Giriş yap!</span><br>");
        header("Refresh: 3;");

        unset($_SESSION['reg_fname']);
        unset($_SESSION['reg_lname']);
        unset($_SESSION['reg_email']);
        unset($_SESSION['reg_email2']);
        //$_SESSION['reg_fname'] = "";
        //$_SESSION['reg_lname'] = "";
        //$_SESSION['reg_email'] = "";
        //$_SESSION['reg_email2'] = "";
    endif;//Hata yoksa çalışır

endif;//Kayıt Formu

?>