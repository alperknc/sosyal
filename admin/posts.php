<?php
require 'header.php';
require 'app/classes/Post.php';
$user = new Post($con);


@$operation = $_GET["operation"];

switch ($operation) :

    //------------Yönetim---------------
    case "update":
        $user->userUpdate($con);
        break;
    case "add":
        $user->userAdd($con);
        break;
    case "close":
        $user->closeUser($con);
        break;
    case "open":
        $user->openUser($con);
        break;
    default:
        $user->loadPosts();



endswitch;
?>



