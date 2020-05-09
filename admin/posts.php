<?php
require 'header.php';
require 'app/classes/Post.php';
$user = new Post($con);


@$operation = $_GET["operation"];

switch ($operation) :

    //------------Yönetim---------------
    case "update":
        $user->updatePost($con);
        break;
    case "add":
        $user->postAdd($con);
        break;
    case "close":
        $user->closePost($con);
        break;
    case "open":
        $user->openPost($con);
        break;
    default:
        $user->loadPosts();



endswitch;
?>



