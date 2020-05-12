<?php
require 'includes/classes/config.php';
require 'header.php';

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        $row=1;
        $num=0;
        $date = date("Y-m-d");
        if(($dosya=fopen("$fileName","r"))!= FALSE){
            while(($veri=fgetcsv($dosya,1000,","))!= FALSE){
                $col=count($veri);
                $row++;
                for ($i=0;$i<$col;$i++){
                    $name = $veri[0];
                    $lname = $veri[1];
                    $username = $veri[2];
                    $email = $veri[3];
                    $password = $veri[4];
                    $profile_pic = "assets/images/profile_pics/default/head_pomegranate.png";
                }
                $e_check = mysqli_query($con, "select username, email from users where username='$username' or email ='$email' ");
                //Dönen kayıt saydırma
                $num_rows = mysqli_num_rows($e_check);

                if (!$num_rows > 0) :
                    $query = mysqli_query($con, "insert into users values ('', '$name', '$lname', '$username', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',', 'no')");

                    $firststr = "<div class='table-responsive'>
                        <table class='table'>
                            <thead class=' text-primary'>
                            <tr>
                                <th>
                                    Adı
                                </th>
                                <th>
                                    Kullanıcı Adı
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Profil
                                </th>
                                <th>
                                    Şifre
                                </th>
                            </tr></thead>
                            <tbody>";

            @$str .= "
                            <tr>
                                <td>
                                    $name "." $lname
                                </td>
                                <td>
                                    $username
                                </td>
                                <td>
                                    $email
                                </td>
                                <td class='text-primary'>
                                    <img src='../" . $profile_pic . "' width='44' height='44'>
                                </td>
                                <td>
                                    $password
                                </td>
                            </tr>
                            ";

                else:
                    $firststr1 = "<div class='table-responsive'>
                        <table class='table'>
                            <thead class=' text-primary'>
                            <tr>
                                <th>
                                    Adı
                                </th>
                                <th>
                                    Kullanıcı Adı
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Profil
                                </th>
                                <th>
                                    Şifre
                                </th>
                            </tr></thead>
                            <tbody>";

                    @$str1 .= "
                            <tr>
                                <td>
                                    $name "." $lname
                                </td>
                                <td>
                                    $username
                                </td>
                                <td>
                                    $email
                                </td>
                                <td class='text-primary'>
                                    <img src='../" . $profile_pic . "' width='44' height='44'>
                                </td>
                                <td>
                                    $password
                                </td>
                            </tr>
                            ";
                endif;

            }
            fclose($dosya);

        }
    }
}





?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#frmCSVImport").on("submit", function () {

            $("#response").attr("class", "");
            $("#response").html("");
            var fileType = ".csv";
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
            if (!regex.test($("#file").val().toLowerCase())) {
                $("#response").addClass("error");
                $("#response").addClass("display-block");
                $("#response").html("Geçersiz : <b>" + fileType + "</b> Dosya.");
                return false;
            }
            return true;
        });
    });
</script>

<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">CSV Yükle </h4>
                    <p class="card-category">CSV ile Yeni Üye Verileri Girebilirsin</p>
                </div>
                <div class="card-body">

                    <form class="form-horizontal" action="" method="post"
                          name="frmCSVImport" id="frmCSVImport"
                          enctype="multipart/form-data">
                        <div class="input-row">
                            <label class="col-md-4 control-label">CSV Seç
                                </label> <input type="file" name="file"
                                                    id="file" accept=".csv">
                            <button type="submit" id="submit" name="import"
                                    class="btn-submit">Yükle</button>
                            <br />

                        </div>

                    </form>

                    <?php
                        if (isset($str)) {
                            echo '<br><h3>Eklenenler</h3> <hr>';
                            echo $firststr . $str;
                            echo'</tbody>
                        </table>
                    </div>';
                        }

                        if (isset($str1)) {
                            echo '<br><h3>Eklenmeyenler</h3> <hr>';

                            echo $firststr1 . $str1;

                            echo'</tbody>
                        </table>
                    </div>';
                        }
                    ?>

            </div>
        </div>
    </div>
</div>