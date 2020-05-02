<?php
include("../../config/config.php");
include("../classes/User.php");
include("../classes/Post.php");

$limit = 10; //Post sınırı

$posts = new Post($con, $_REQUEST['userLoggedIn']);
$posts->loadPostsFirends($_REQUEST, $limit);
?>