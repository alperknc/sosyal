<?php
require 'config.php';

class Post
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



    public function loadPosts() {
        $operation = "";
        $str ="";
        $my_query = mysqli_query($this->con, "select * from posts order by id desc");

        while ($row = mysqli_fetch_array($my_query)):
            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_added'];
            $user_to = $row['user_to'];
            $deleted = $row['deleted'];
            $likes = $row['likes'];
            $imagePath = $row['image'];

            if ($deleted == 'no') :
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

            $firststr = "

            <div class='card'>
                <div class='card-header card-header-primary'>
                    <div class='row'>  
                        <div class='col s12 m4 l10'>
                            <h4 class='card-title '>Gönderi Listesi</h4>
                            <p class='card-category'> Tüm gönderileri burada görebilirsin</p> 
                        </div> 
                        <div class='col s12 m4 l2> ' style='position: relative; left: 380px;'>
                                <a href='posts.php?operation=add' class='btn'  id='addbtn' style='background-color: #fff; box-shadow: 3px 3px 4px #000; color: #8e24aa ; font-size: 18px;'>Yeni Gönderi<div class='ripple-container'></div></a>
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
                                    Yazı
                                </th>
                                <th>
                                    Ekleyen
                                </th>
                                <th>
                                    Tarihi
                                </th>
                                <th>
                                    Kime
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
                                    $id
                                </td>
                                <td>
                                    $body
                                </td>
                                <td>
                                    $added_by
                                </td>
                                <td>
                                    $date_time
                                </td>
                                
                                <td>
                                    $user_to
                                </td>
                                <td>
                                    $likes
                                </td>
                                <td>
                                    $closed_text
                                </td>
                                <td>
                                    <a href='posts.php?operation=update&id=" .$id . "' class='btn '  style='background-color: #ab47bc  '>Düzenle<div class='ripple-container'></div></a>
                                </td>
                                <td>
                                    <a href='posts.php?operation=" . $operation . "&id=" .$id . "' class='btn '  style='background-color: ". $color ."'> $text <div class='ripple-container'></div></a>
                                </td>
                            </tr>
                            ";
            $secondstr = '</tbody>
                        </table>
                    </div>
                </div>
            </div>>';

        endwhile;
        echo $firststr . $str . $secondstr;
}

    public function postAdd() {
        @$buton = $_POST["button"];


        if ($buton) :
            // db işlemleri
            $body = $_POST['body'];
            $added_by = $_POST['added_by'];
            $user_to = $_POST['user_to'];
            $date = date("Y-m-d");


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

            //Kullanıcı varmı kontrol edilecek**

            if ($body == "" || $added_by == "" || $user_to == "") :
                echo "Boş olamaz";

            else:
                if ($imageName != "") {
                    $query = mysqli_query($this->con, "insert into posts values ('', '$body', '$added_by', '$user_to', '$date','no', 'no', '0', '$imageName')");
                    header("Location: posts.php");
                } else {
                    $query = mysqli_query($this->con, "insert into posts values ('', '$body', '$added_by', '$user_to', '$date','no', 'no', '0', '')");
                    header("Location: posts.php");
                }
            endif;



        endif;


        ?>

        <div class="col-md-3 text-center mx-auto mt-5 table-bordered">

        <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post" enctype="multipart/form-data">
        <?php
        echo  '
                <div class="col-md-12 table-light border-bottom"><h4>KULLANICI GÜNCELLE</h4></div>
                <div class="col-md-12 table-light">Yazı<input type = "text" name = "body" class = "form-control mt-3" value = ""/></div>
                <div class="col-md-12 table-light">Ekleyen<input type = "text" name = "added_by" class = "form-control mt-3" value = ""/></div>
                <div class="col-md-12 table-light">Kime<input type = "text" name = "user_to" class = "form-control mt-3" value = ""/></div>
                <div class="col-md-12 table-light">Gönderi foto
                <input type="file" name="fileToUpload" id="fileToUpload" name = "image">  
                </div> 
                
                <div class="col-md-12 table-light">
                <a href="posts.php" class="btn" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" >Geri Dön</a>
                <input name = "button" value = "Güncelle" type = "submit" class = "btn btn-success mt-3 mb-3" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" /></div>
            </form></div>';
    }

    public function updatePost(){
        @$buton = $_POST["button"];

        $id = $_GET["id"];
        $aktar = $this->myQuery($this->con, "select * from posts where id = $id");

        if ($buton) :
            // db işlemleri
            $id = $_POST['id'];
            $body = $_POST['body'];
            $added_by = $_POST['added_by'];
            $user_to = $_POST['user_to'];
            $date_added = $_POST['date_added'];
            $deleted = $aktar['deleted'];
            $likes = $_POST['likes'];
            $image = $aktar['image'];

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

            //kullanıcı varmı kontrol edilecek*****

            if ($body == "" || $added_by == "" || $user_to == "" || $date_added == "" || $deleted == "" || $likes == "") :
                echo "Boş olamaz";

            else:
                if($imageName != "") {
                    $update_query = mysqli_query($this->con, "update posts set body = '$body', added_by = '$added_by', user_to = '$user_to', date_added = '$date_added', deleted = '$deleted', likes = '$likes', image = '$imageName' where id = $id");
                    header("Location: posts.php");
                } else {
                    $update_query = mysqli_query($this->con, "update posts set body = '$body', added_by = '$added_by', user_to = '$user_to', date_added = '$date_added', deleted = '$deleted', likes = '$likes', image = '$image' where id = $id");
                    header("Location: posts.php");
                }
            endif;



        endif;


        ?>

        <div class="col-md-3 text-center mx-auto mt-5 table-bordered">

    <form action = "<?php $_SERVER['PHP_SELF'] ?>" method = "post" enctype="multipart/form-data">
        <?php
        echo  '
                <div class="col-md-12 table-light border-bottom"><h4>KULLANICI GÜNCELLE</h4></div>
                <div class="col-md-12 table-light">Yazı<input type = "text" name = "body" class = "form-control mt-3" value = "'.$aktar["body"].'"/></div>
                <div class="col-md-12 table-light">Ekleyen<input type = "text" name = "added_by" class = "form-control mt-3" value = "'.$aktar["added_by"].'"/></div>
                <div class="col-md-12 table-light">Kime<input type = "text" name = "user_to" class = "form-control mt-3" value = "'.$aktar["user_to"].'"/></div>
                <div class="col-md-12 table-light">Tarihi<input type = "text" name = "date_added" class = "form-control mt-3" value = "'.$aktar["date_added"].'"/></div>
                <div class="col-md-12 table-light">Durum<input type = "text" name = "deleted" class = "form-control mt-3" value = "'.$aktar["deleted"].'"/></div>
                <div class="col-md-12 table-light">Beğeni<input type = "text" name = "likes" class = "form-control mt-3" value = "'.$aktar["likes"].'"/></div>
                
                <div class="col-md-12 table-light">Gönderi foto
                <img src="../' .$aktar["image"]. '" width="44" height="44">
                <input type="file" name="fileToUpload" id="fileToUpload" name = "image">  
                </div> 
                
                <div class="col-md-12 table-light">
                <a href="posts.php" class="btn" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" >Geri Dön</a>
                <input name = "button" value = "Güncelle" type = "submit" class = "btn btn-success mt-3 mb-3" style="background-color: #8e24aa ; box-shadow: 3px 3px 4px #000;" /></div>
                <input type = "hidden" name = "id" value = "'.$id.'"/>
            </form></div>';
    }

    public function closePost() {
        $id = $_GET["id"];

        if ($id != "" && is_numeric($id)):
            mysqli_query($this->con, "update posts set deleted = 'yes' where id = $id");
            header("Location: posts.php");
        endif;
    }

    public function openPost() {
        $id = $_GET["id"];

        if ($id != "" && is_numeric($id)):
            mysqli_query($this->con, "update posts set deleted = 'no' where id = $id");
            header("Location: posts.php");
        endif;
    }
}