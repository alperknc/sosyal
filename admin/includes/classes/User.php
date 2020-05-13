<?php
require 'config.php';

class User
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    private function myQuery($con, $query)
    {
        $my_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($my_query);
        return $row;
    }


    public function getUsers()
    {
         @$search = $_POST["searchbutton"];
         @$usersearch = $_POST["search"];

            if ($search):
                $my_query = mysqli_query($this->con, "select * from users where first_name LIKE '%$usersearch%' or last_name LIKE '%$usersearch%' or username LIKE '%$usersearch%' order by id desc");
                $num_rowsearch = mysqli_num_rows($my_query);
                if (!$num_rowsearch > 0):
                    $my_query = mysqli_query($this->con, "select * from users order by id desc");
                endif;
            else:
                $my_query = mysqli_query($this->con, "select * from users order by id desc");
            endif;

        $str ="";

        while ($row = mysqli_fetch_array($my_query)):
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $signup_datey = $row['signup_date'];
            $profile_pic = $row['profile_pic'];
            $num_posts = $row['num_posts'];
            $num_likes = $row['num_likes'];
            $user_closed = $row['user_closed'];
            $friend_array = $row['friend_array'];


            if ($user_closed == 'no') :
                $operation = "close";
                $color = "#ff80ab ";
                $text = "Kapat";
                $closed_text = "Açık";

            else:
                $operation = "open";
                $color = "#1de9b6";
                $text = "Aç";
                $closed_text = "Kapalı";
            endif;

            ?>



            <?php


            $firststr = "
        <div id='getusers'>
            <div class='card' id='veri'>
                <div class='card-header card-header-primary'>
                    <div class='row'>  
                        <div class='col-md-2'>
                            <h4 class='card-title '>Kullanıcı Listesi</h4>
                            <p class='card-category'> Tüm kullanıcılarını burada görebilirsin</p> 
                        </div> 
                        <div class='col-md-10'>
                            <div class='row'>
                                <form action='users.php?operation=search' method='post'>
                                    <input type = 'search' name = 'search'>
                                    <input type='submit' name='searchbutton' class='btn' value='ARA' style='background-color: #fff; box-shadow: 3px 3px 4px #000; color: #8e24aa ; font-size: 15px;'>
                                </form>
                                
                        
                                <a href='excel.php' class='btn'  id='addbtn' style='background-color: #fff; box-shadow: 3px 3px 4px #000; color: #8e24aa ; font-size: 15px; left: 400px'>Excel'e Aktar<div class='ripple-container'></div></a>
 
                                <a rel='yukleme' href='users.php?operation=add' class='btn'  id='addbtn' style='background-color: #fff; box-shadow: 3px 3px 4px #000; color: #8e24aa ; font-size: 15px; left: 400px'>Yeni Kullanıcı<div class='ripple-container'></div></a>
                            </div>
                        </div>
                    </div>   
                </div>
                               <div class='card-body'>
                    <div class='table-responsive'>
                        <table class='table'>
                            <thead class=' text-primary'>
                            <tr><th>
                                    ID
                                </th>
                                <th>
                                    Adı
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Kayıt Tarihi
                                </th>
                                <th>
                                    Profil
                                </th>
                                <th>
                                    Gönderi
                                </th>
                                <th>
                                    Beğeni
                                </th>
                                <th>
                                    Durum
                                </th>
                                <th>
                                    Düzenle
                                </th>
                                <th>
                                    Aktiflik
                                </th>
                            </tr></thead>
                            <tbody>";

            $str .= "
                            <tr>
                                <td>
                                    <a href='userdetails.php?operation=user&id=" .$id . "' >$id</a> 
                                </td>
                                <td>
                                    $first_name "." $last_name
                                </td>
                                <td>
                                    $email
                                </td>
                                <td>
                                    $signup_datey
                                </td>
                                <td class='text-primary'>
                                    <img src='../" . $profile_pic . "' width='44' height='44'>
                                </td>
                                <td>
                                    $num_posts
                                </td>
                                <td>
                                    $num_likes
                                </td>
                                <td>
                                    $closed_text
                                </td>
                                <td>
                                    <a rel='yukleme' href='users.php?operation=update&id=" .$id . "' class='btn '  style='background-color: #ab47bc  '>Düzenle<div class='ripple-container'></div></a>
                                </td>
                                <td> 
                                        
                                   <a rel='yukleme' href='users.php?operation=" . $operation . "&id=" .$id . "' class='btn ' id='btndeleted1'  style='background-color: ". $color ."'> $text <div class='ripple-container'></div></a>
                                </td>
                            </tr>
                            ";
            $secondstr = '</tbody>
                        </table>
                        
                    </div>
                </div>
            </div>  </div>';

        endwhile;
        echo $firststr . $str . $secondstr;
    }

    public function getUser($con)
    {
            $id = $_GET["id"];
            $query = mysqli_query($con, "select * from users where id = $id");
            $row = mysqli_fetch_array($query);

            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $fullname = $first_name . $last_name;
            $username = $row['username'];
            $email = $row['email'];
            $signup_date = $row['signup_date'];
            $profile_pic = $row['profile_pic'];
            $num_posts = $row['num_posts'];
            $num_likes = $row['num_likes'];
            $user_closed = $row['user_closed'];
            $friend_array = $row['friend_array'];

            $profile = "
                <div class='card-avatar'>
                        <a href='#'>
                            <img src='../" .$profile_pic. "' width='44' height='44'>
                        </a>
                    </div>
                    <div class='card-body'>
                        <h4 class='card-title'>$fullname</h4>
                        <p class='card-description'>
                            Gönderi Sayısı: $num_posts  <br>
                            Beğeni Sayısı: $num_likes
                        </p>
                        <a href='../". $username ."' class='btn btn-primary btn-round'>Profili</a>
                    </div>
            ";

            $queryposts = mysqli_query($con, "select * from posts where added_by='$username' order by id desc");

            $str = "";
            while ($rowposts = mysqli_fetch_array($queryposts)) {
                $postid = $rowposts['id'];
                $body = $rowposts['body'];
                $date = $rowposts['date_added'];
                $deleted = $rowposts['deleted'];
                $likes = $rowposts['likes'];

                $str .= "<tr>
                                                <td>
                                                    $postid
                                                </td>
                                                <td>
                                                    $body 
                                                </td>
                                                <td>
                                                    $date
                                                </td>
                                                <td>
                                                    $deleted
                                                </td>
                                                <td class='text-primary'>
                                                    $likes
                                                </td>
                                            </tr>";
            }
            echo $str;
            echo "
                </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class='col-md-4'>
                <div class='card card-profile'>

                        
            ";
            echo $profile;
    }

    public function userUpdate($con) {

        @$buton = $_POST["button"];

            $id = $_GET["id"];
            $aktar = $this->myQuery($con, "select * from users where id = $id");

        if ($buton) :
            // db işlemleri
            $id = $_POST['id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $signup_date = $_POST['signup_date'];
            $profile_pic = $aktar['profile_pic'];
            $num_posts = $_POST['num_posts'];
            $num_likes = $_POST['num_likes'];
            $user_closed = $_POST['user_closed'];
            //$friend_array = $_POST['friend_array'];

            //profil fotosu
                $uploadOk = 1;
                $imageName = $_FILES['fileToUpload']['name'];
                $errorMessage = "";

                if($imageName != "") {
                    $imageName = "assets/images/posts/" . uniqid() . basename($imageName);
                    $imageFileType = pathinfo($imageName, PATHINFO_EXTENSION);

                    if($_FILES['fileToUpload']['size'] > 10000000) {
                        $errorMessage = "Dosya çok büyük";
                        $uploadOk = 0;
                    }

                    if(strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpg") {
                        $errorMessage = "SADECE jpeg, jpg and png olabilir";
                        $uploadOk = 0;
                    }

                    if($uploadOk) {
                        $targetDir = "../" . $imageName;
                        if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $targetDir)) {
                            //yüklendi
                        }
                        else {
                            //yüklenmedi
                            $uploadOk = 0;
                        }
                    }

                }

            if ($first_name == "" || $last_name == "" || $email == "" || $signup_date == "" || $profile_pic == "" || $num_posts == "" || $num_likes == "" || $user_closed == "" ) :
               echo "Boş olamaz";

            else:
            if($imageName != "") {
            $update_query = mysqli_query($this->con, "update users set first_name = '$first_name', last_name = '$last_name', email = '$email', signup_date = '$signup_date', profile_pic = '$imageName', num_posts = '$num_posts', num_likes = '$$num_likes', user_closed = '$user_closed' where id = $id");
            header("Location: users.php");
            } else {
                $update_query = mysqli_query($this->con, "update users set first_name = '$first_name', last_name = '$last_name', email = '$email', signup_date = '$signup_date', profile_pic = '$profile_pic', num_posts = '$num_posts', num_likes = '$$num_likes', user_closed = '$user_closed' where id = $id");
            header("Location: users.php");
            }
            endif;



        endif;


            ?>

        <div class="col-md-3 text-center mx-auto mt-5 table-bordered">

        <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post" enctype="multipart/form-data">
        <?php
          echo  '
                <div class="col-md-12 table-light border-bottom"><h4>KULLANICI GÜNCELLE</h4></div>
                <div class="col-md-12 table-light">Adı<input type = "text" name = "first_name" class = "form-control mt-3" value = "'.$aktar["first_name"].'"/></div>
                <div class="col-md-12 table-light">Soyadı<input type = "text" name = "last_name" class = "form-control mt-3" value = "'.$aktar["last_name"].'"/></div>
                <div class="col-md-12 table-light">Email<input type = "email" name = "email" class = "form-control mt-3" value = "'.$aktar["email"].'"/></div>
                <div class="col-md-12 table-light">Kayıt Tarihi<input type = "text" name = "signup_date" class = "form-control mt-3" value = "'.$aktar["signup_date"].'"/></div>
                
                <div class="col-md-12 table-light">Profil Fotoğrafı
                <img src="../' .$aktar["profile_pic"]. '" width="44" height="44">
                <input type="file" name="fileToUpload" id="fileToUpload" name = "profile_pic">  
                </div>           
                
                <div class="col-md-12 table-light">Gönderi Sayısı<input type = "text" name = "num_posts" class = "form-control mt-3" value = "'.$aktar["num_posts"].'"/></div>
                <div class="col-md-12 table-light">Beğeni Sayısı<input type = "text" name = "num_likes" class = "form-control mt-3" value = "'.$aktar["num_likes"].'"/></div>
                <div class="col-md-12 table-light">Durum<input type = "text" name = "user_closed" class = "form-control mt-3" value = "'.$aktar["user_closed"].'"/></div>
                <div class="col-md-12 table-light">
                <a rel="yukleme" href="users.php" class="btn" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" >Geri Dön</a>
                <input name = "button" value = "Güncelle" type = "submit" class = "btn btn-success mt-3 mb-3" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" /></div>
                <input type = "hidden" name = "id" value = "'.$id.'"/>
            </form></div>';





        }

    public function userAdd($con) {

        @$buton = $_POST["button"];

        //echo '<div class="col-md-3 text-center mx-auto mt-5 table-bordered">';


        $error_array = array(); //Hata mesajları

        if ($buton) :
            //Ad
            $fname = strip_tags($_POST['first_name']);
            $fname = str_replace(' ', '', $fname);
            $fname = ucfirst(mb_strtolower($fname, 'utf8'));
            $_SESSION['first_name'] = $fname;
            //Soyad
            $lname = strip_tags($_POST['last_name']);
            $lname = str_replace(' ', '', $lname);
            $lname = ucfirst(mb_strtolower($lname, 'utf8'));
            $_SESSION['last_name'] = $lname;
            //E-Posta
            $em = strip_tags($_POST['email']);
            $em = str_replace(' ', '', $em);
            $em = ucfirst(mb_strtolower($em, 'utf8'));
            $_SESSION['email'] = $em;
            //Şifre
            $password = strip_tags($_POST['password']);
            //Şifre 2
            //Gün
            $date = date("Y-m-d");

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


            if (strlen($fname) > 25 || strlen($fname) < 2) :
                array_push($error_array,"Ad 2-25 karakter arasında olmalı!<br>");
            endif; //İsim Karakter Sınırı

            if (strlen($lname) > 25 || strlen($lname) < 2) :
                array_push($error_array, "SoyAd 2-25 karakter arasında olmalı!<br>");
            endif; //Soyisim Karakter Sınırı

            if (preg_match('/[^A-Za-z0-9]/', $password)) :
                array_push($error_array, "Şifre Türkçe Karakter İçeremez<br>");
            endif; //Şifre karakter kontrol


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
                $rand = rand(1,11);
                if ($rand == 1) :
                    $profile_pic = "assets/images/profile_pics/default/head_carrot.png";
                elseif ($rand == 2) :
                    $profile_pic = "assets/images/profile_pics/default/head_sun_flower.png";
                elseif ($rand == 3) :
                    $profile_pic = "assets/images/profile_pics/default/head_alizarin.png";
                elseif ($rand == 4) :
                    $profile_pic = "assets/images/profile_pics/default/head_amethyst.png";
                elseif ($rand == 5) :
                    $profile_pic = "assets/images/profile_pics/default/head_belize_hole.png";
                elseif ($rand == 6) :
                    $profile_pic = "assets/images/profile_pics/default/head_deep_blue.png";
                elseif ($rand == 7) :
                    $profile_pic = "assets/images/profile_pics/default/head_emerald.png";
                elseif ($rand == 8) :
                    $profile_pic = "assets/images/profile_pics/default/head_green_sea.png";
                elseif ($rand == 9) :
                    $profile_pic = "assets/images/profile_pics/default/head_nephritis.png";
                elseif ($rand == 10) :
                    $profile_pic = "assets/images/profile_pics/default/head_pete_river.png";
                elseif ($rand == 11) :
                    $profile_pic = "assets/images/profile_pics/default/head_pomegranate.png";
                endif; // Rasgele profil foto

                $query = mysqli_query($con, "insert into users values ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',','no')");

                array_push($error_array, "<span style='color: #14CB00; font-size: 25px;'>Kayıt başarılı!</span><br>");
                header("Refresh: 1;");

                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);
                unset($_SESSION['email']);

                header('Location: users.php');
            endif;//Hata yoksa çalışır

        endif;
        //else:
            ?>
        <div class="col-md-3 text-center mx-auto mt-5 table-bordered">

        <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post">



            <div class="col-md-12 table-light border-bottom"><h4>Kullanıcı Ekle</h4></div>
                            <div class="col-md-12 table-light">Adı<input type = "text" name = "first_name" class = "form-control mt-3" value="<?php if (isset($_SESSION['first_name'])) : echo  $_SESSION['first_name']; endif; ?>"></div>

                            <?php if (in_array("Ad 2-25 karakter arasında olmalı!<br>", $error_array)) :
                                        echo "Ad 2-25 karakter arasında olmalı!<br>";
                                   endif;
                            ?>

                            <div class="col-md-12 table-light">Soyadı<input type = "text" name = "last_name" class = "form-control mt-3" value="<?php if (isset($_SESSION['last_name'])) : echo  $_SESSION['last_name']; endif; ?>"></div>

                            <?php if (in_array("SoyAd 2-25 karakter arasında olmalı!<br>", $error_array)) :
                                    echo "SoyAd 2-25 karakter arasında olmalı!<br>";
                                endif;
                                ?>

                            <div class="col-md-12 table-light">Email<input type = "email" name = "email" class = "form-control mt-3" value="<?php if (isset($_SESSION['email'])) : echo  $_SESSION['email']; endif; ?>"></div>

                           <?php if (in_array("E-Posta Kayıtlı<br>", $error_array)) :
                                    echo "E-Posta Kayıtlı<br>";


                                elseif (in_array("<br>E-Posta doğru formatta değil!<br>", $error_array)) :
                                    echo "E-Posta doğru formatta değil!<br>";

                                endif;
                                ?>

                            <div class="col-md-12 table-light">Şifre<input type = "password" name = "password" class = "form-control mt-3"></div>

                                <?php if (in_array("Şifre Türkçe Karakter İçeremez<br>", $error_array)) :
                                            echo "Şifre Türkçe Karakter İçeremez<br>";
                                        elseif (in_array("Şifre 5-30 karakter arasında olabilir!<br>", $error_array)) :
                                            echo "Şifre 5-30 karakter arasında olabilir!<br>";
                                        endif;
                                        ?>

                            <div class="col-md-12 table-light">
                            <a rel='yukleme' href="users.php" class="btn" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" >Geri Dön</a>
                            <input name = "button" value = "Ekle" type = "submit" class = "btn btn-success mt-3 mb-3"  style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;"/></div>
                        </form>
            </div>
        <?php
    }

    public function closeUser($con) {
        $id = $_GET["id"];

        if ($id != "" && is_numeric($id)):
            mysqli_query($con, "update users set user_closed = 'yes' where id = $id");
            //header("Location: users.php");
            $this->getUsers();
        endif;
    }

    public function openUser($con) {
        $id = $_GET["id"];

        if ($id != "" && is_numeric($id)):
            mysqli_query($con, "update users set user_closed = 'no' where id = $id");
            //header("Location: users.php");
            $this->getUsers();
        endif;
    }

}