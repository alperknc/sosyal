<?php
ob_start();

$con = mysqli_connect("localhost", "root", "", "social");
$con->set_charset("utf8");