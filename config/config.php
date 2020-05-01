<?php
ob_start();
session_start();

$timezone = date_default_timezone_set("Europe/Istanbul");

$con = mysqli_connect("localhost","root","","social");
$con->set_charset("utf8");

if(mysqli_connect_errno()) {
    echo "Bağlantı Hatası: " . mysqli_connect_errno();
}

?>