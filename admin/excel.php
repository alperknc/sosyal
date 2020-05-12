<?php
require 'includes/classes/config.php';
require 'includes/classes/Excel.php';

$excel = new Excel();

$query = "SELECT * FROM users";
$user = mysqli_query($con, $query);

$users = array();
$usersTitle = array(
    "İd",
    "Adı",
    "Soyadı",
    "Kullanıcı Adı",
    "Email",
    "Şifre",
    "Kayıt Tarihi",
    "Profil Foto",
    "Gönderi Sayısı",
    "Beğeni Sayısı",
    "Durum",
    "Arkadaşlar"
);

while($row = mysqli_fetch_array($user)) :
    @$users[]=array(
        $row['id'],
        $row['first_name'],
        $row['last_name'],
        $row['username'],
        $row['email'],
        $row['password'],
        $row['signup_date'],
        $row['profile_pic'],
        $row['num_posts'],
        $row['num_likes'],
        $row['user_closed'],
        $row['friend_array']
    );
endwhile;

$excel->exportExcel(date("d.m.Y"),$usersTitle,$users);