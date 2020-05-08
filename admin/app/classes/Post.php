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

            $user_details_query = mysqli_query($this->con, "SELECT first_name, last_name, profile_pic FROM users WHERE username='$added_by'");
            $user_row = mysqli_fetch_array($user_details_query);
            $first_name = $user_row['first_name'];
            $last_name = $user_row['last_name'];
            $profile_pic = $user_row['profile_pic'];
            $firststr = "

            <div class='card'>
                <div class='card-header card-header-primary'>
                    <div class='row'>  
                        <div class='col s12 m4 l10'>
                            <h4 class='card-title '>Kullanıcı Listesi</h4>
                            <p class='card-category'> Tüm kullanıcılarını burada görebilirsin</p> 
                        </div> 
                        <div class='col s12 m4 l2> ' style='position: relative; left: 380px;'>
                                <a href='users.php?operation=add' class='btn'  id='addbtn' style='background-color: #fff; box-shadow: 3px 3px 4px #000; color: #8e24aa ; font-size: 18px;'>Yeni Kullanıcı<div class='ripple-container'></div></a>
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
                                <td class='text-primary'>
                                    <img src='../" . $profile_pic . "' width='44' height='44'>
                                </td>
                                <td>
                                    $user_to
                                </td>
                                <td>
                                    $likes
                                </td>
                                <td>
                                    $deleted
                                </td>
                                <td>
                                    <a href='users.php?operation=update&id=" .$id . "' class='btn '  style='background-color: #ab47bc  '>Düzenle<div class='ripple-container'></div></a>
                                </td>
                                <td>
                                    <a href='users.php?operation=" . $operation . "&id=" .$id . "' class='btn '  style='background-color: ". $color ."'> $text <div class='ripple-container'></div></a>
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
}