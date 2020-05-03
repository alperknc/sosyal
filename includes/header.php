<?php
require 'config/config.php';


if (isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
}
else {
    header("Location: register.php");
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

</head>
<body>

<div class="top_bar">
    <div class="logo">
        <a href="index.php">Social</a>
    </div>

    <nav>
        <a href="<?php echo $userLoggedIn ?>">
            <?php echo $user['first_name'];?>
        </a>
        <a href="index.php">
            <i class="fa fa-home"></i>
        </a>
        <a href="#">
            <i class="fa fa-envelope-o"></i>
        </a>
        <a href="#">
            <i class="fa fa-bell"></i>
        </a>
        <a href="requests.php">
            <i class="fa fa-users"></i>
        </a>
        <a href="#">
            <i class="fa fa-cog"></i>
        </a>
        <a href="includes/handlers/logout.php">
            <i class="fa fa-sign-out"></i>
        </a>
    </nav>


</div>


<div class="wrapper">