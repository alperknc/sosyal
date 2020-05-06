<?php
include ("functions.php");

$functions = new Functions($con);

$functions->getUserCount();  echo "<br>";
$functions->getPostCount();  echo "<br>";
$functions->getLikeCount();  echo "<br>";
$functions->getCommentCount();  echo "<br>";

$functions->getUsers();
$functions->getUser(11);

?>