<?php
require 'header.php';
require 'includes/classes/User.php';
$user = new User($con);

?>



</head>
<body>

<script type="text/javascript">
    $(function(){
        $('a[rel="yukleme"][rel="yukleme"]').click(function(e){
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


<div id="sonuc"></div>

<?php

            @$operation = $_GET["operation"];

            switch ($operation) :

                //------------Yönetim---------------
                case "user":
                    $user->getUser($con);
                    break;
                case "search":
                    $user->getUsers();
                    break;
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
                    $user->getUsers();



            endswitch;
            ?>



