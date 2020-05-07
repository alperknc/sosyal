<?php
require 'config/config.php';
include("includes/classes/User.php");
include("includes/classes/Post.php");
include("includes/classes/Message.php");


if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

$message_obj = new Message($con, $userLoggedIn);

//Okunmamış mesajlar
$num_messages = $message_obj->getUnreadNumber();

?>

<html>
<head>
    <title>Your Welcome</title>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/js/jquery.jcrop.js"></script>
    <script src="assets/js/jcrop_bits.js"></script>


    <!-- CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

    <link rel="stylesheet" href="http://localhost/pixel/apps/default/main/static/css/libs/bs3/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/pixel/apps/default/main/static/css/styles.master.css">
    <link rel="stylesheet" href="http://localhost/pixel/apps/default/main/static/css/bootstrap-select.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <nav id="header_nav" class="navbar navbar-default navbar-fixed-top nav_up">
        <div class="container container-home container-home-header" id="header_">

            <div id="navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="logo">
                        <a href="http://localhost/pixel">
                           <!-- Logo -->
                        </a>
                    </li>
                    <li class="pp_front_menu active" id="home_nav">
                        <a href="index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-home"><defs xmlns="http://www.w3.org/2000/svg"><linearGradient x1="19.28%" y1="86.72%" x2="88.05%" y2="12.24%" id="home"><stop stop-color="#5cb933" offset="0%"></stop><stop stop-color="#459522" offset="49.5%"></stop><stop stop-color="#41991a" offset="100%"></stop></linearGradient></defs><path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" fill="url(#home)"></path></svg> <span>Anasayfa</span>
                        </a>
                    </li>
                    <li class="pp_front_menu exp_menu" id="explore_nav">
                        <a href="http://localhost/pixel/explore" data-ajax="ajax_loading.php?app=explore&amp;apph=explore">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#66757f" class="feather feather-compass"><path d="M7,17L10.2,10.2L17,7L13.8,13.8L7,17M12,11.1A0.9,0.9 0 0,0 11.1,12A0.9,0.9 0 0,0 12,12.9A0.9,0.9 0 0,0 12.9,12A0.9,0.9 0 0,0 12,11.1M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z"></path></svg> <span>Keşfet</span>
                        </a>
                    </li>

                    <li>
                        <form class="form navbar-search">
                            <div class="input">
                                <input type="text" class="form-control" placeholder="Search.." id="search-users">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                <div class="pp_head_search_loader" id="pp_loader"><div class="speeding_wheel"></div></div>
                            </div>
                            <div class="search-result"></div>
                        </form>
                    </li>
                </ul>
                <!-- ayarla -->

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo $userLoggedIn; ?>" class="mode_button">
                        <p><?php echo $user['first_name']; ?></p>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown notifications-list" id="get-notifications">
                            <span class="dropdown-toggle pointer" data-toggle="dropdown">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>


                            </span>
                            <div class="dropdown-menu zoom">
                                <div class="header">Mesajlar
                                    <a href="messages.php">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                    </a>
                                </div>
                                <ul id="notifications__list">
                                    <div class="loaded_conversations">
                                        <div class='kucult'>
                                            <?php echo $message_obj->getConvos(); ?>
                                        </div>
                                    </div>
                                </ul>
                                <div class="preloader hidden">
                                    <div id="pp_loader"><div class="speeding_wheel"></div></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>

                    </li>
                    <!--
                    <li class="hide_head_link" title="Admin panel">
                        <a href="http://localhost/pixel/admin-panel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                        </a>
                     -->

                    <li class="hide_head_link " id="messages_nav">

                        <a href="requests.php" class="_messages">
                            <img src="http://localhost/pixel/media/img/d-avatar.jpg" width="24px" height="24px" class="img-circle">
                        </a>
                    </li>

                    </li>
                    <li class="hide_head_link ">
                        <a href="includes/handlers/logout.php" style="margin-top: 3px">
                            <i class="fa fa-sign-out fa-lg" ></i>
                        </a>
                    </li>
                </ul>
                <!-- ayarla -->
            </div>

        </div>
    </nav>


</head>

<body>





<script>
    var userLoggedIn = '<?php echo $userLoggedIn; ?>';

    $(document).ready(function() {

        $('.dropdown_data_window').scroll(function() {
            var inner_height = $('.dropdown_data_window').innerHeight(); //Div containing data
            var scroll_top = $('.dropdown_data_window').scrollTop();
            var page = $('.dropdown_data_window').find('.nextPageDropdownData').val();
            var noMoreData = $('.dropdown_data_window').find('.noMoreDropdownData').val();

            if ((scroll_top + inner_height >= $('.dropdown_data_window')[0].scrollHeight) && noMoreData == 'false') {

                var pageName; //Holds name of page to send ajax request to
                var type = $('#dropdown_data_type').val();


                if(type == 'notification')
                    pageName = "ajax_load_notifications.php";
                else if(type = 'message')
                    pageName = "ajax_load_messages.php"


                var ajaxReq = $.ajax({
                    url: "includes/handlers/" + pageName,
                    type: "POST",
                    data: "page=" + page + "&userLoggedIn=" + userLoggedIn,
                    cache:false,

                    success: function(response) {
                        $('.dropdown_data_window').find('.nextPageDropdownData').remove(); //Removes current .nextpage
                        $('.dropdown_data_window').find('.noMoreDropdownData').remove(); //Removes current .nextpage


                        $('.dropdown_data_window').append(response);
                    }
                });

            } //End if

            return false;

        }); //End (window).scroll(function())


    });

</script>


<div class="wrapper">

    <div id="mask">
        <div id="Circle3"></div>
    </div>

    <script type="text/javascript">
        $(window).load(function() { // makes sure the whole site is loaded
            var preloader=$('#mask div');
            preloader.fadeOut(); // will first fade out the loading animation
            $('#mask').delay(350).fadeOut('slow');
// will fade out the white DIV that covers the website.
            $('body').delay(350).css({'overflow':'visible'});
        })
    </script>

