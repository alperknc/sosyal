<?php
require 'header.php';
require 'includes/classes/Post.php';
$user = new Post($con);


@$operation = $_GET["operation"];

switch ($operation) :

    //------------Yönetim---------------
    case "search":
        $user->loadPosts($con);
        break;
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

<script type="text/javascript">
    $(function(){
        $('a[rel="yukleme"]').click(function(e){
            pageurl = $(this).attr('href');
            $.ajax({url:pageurl,success: function(data){
                    $('body').html(data).find("body").html();
                }});
            if(pageurl!=window.location){
                window.history.pushState({path:pageurl},'',pageurl);
            }
            return false;
        });
    });
    $(window).bind('popstate', function() {
        $.ajax({url:location.pathname,success: function(data){
                $('body').html(data).find("body").html();
            }});
    });
</script>

