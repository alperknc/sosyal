<?php
require 'config/config.php';

if (isset($_SESSION['username'])):
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "select * from users where username = '$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
else :
    header("Location: register.php");
endif;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sosyal</title>
    
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css"> -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <script src="../assets/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     -->
</head>
<body>

<!-- Example single danger button -->
<!-- <div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Separated link</a>
    </div>
</div> -->

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
            <a href="#">
                <i class="fa fa-users"></i>
            </a>
            <a href="#">
                <i class="fa fa-cog"></i>
            </a>
        </nav>
    </div>

<div class="wrapper">