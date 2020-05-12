<?php


require 'includes/classes/config.php';
require 'includes/classes/Excel.php';

$excel = new Excel();

$query = "SELECT * FROM posts";
$user = mysqli_query($con, $query);

$users = array();
$usersTitle = array(
    "İd",
    "Yazı",
    "Ekleyen",
    "Gönderilen",
    "Tarih",
    "Durum",
    "Beğeni",
    "Fotoğraf",
);

while ($row = mysqli_fetch_array($user)) :
    @$users[] = array(
        $row['id'],
        $row['body'],
        $row['added_by'],
        $row['user_to'],
        $row['date_added'],
        $row['deleted'],
        $row['likes'],
        $row['image']
    );
endwhile;

$excel->postsExcel(date("d.m.Y") . "posts", $usersTitle, $users);