<?php
include 'includes/classes/config.php';
include 'includes/settings/menu.php';
include 'includes/settings/fullsettings.php';

require 'includes/classes/Login.php';
$login =  new Login($con);
$login->check();


$route = array_filter(explode('/', $_SERVER['REQUEST_URI']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        <?php echo $settings["title"] ?>
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class="logo">
            <a href="#" class="simple-text logo-normal">
                <span> Hoşgeldin: <b><?php echo $login->getName(); ?></b> </span>
            </a>
            <a href="http://localhost/social/" class="simple-text logo-normal">
                <span> Siteye Git </span>
            </a>

        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">


                <?php foreach ($menus as $mainUrl => $menu): ?>
                    <li class="nav-item <?=$route[3] == $mainUrl || isset($menu['submenu'][$route[3]]) ? 'active' : null?>">
                        <a class="nav-link" href="<?=$mainUrl?>">
                            <i class="material-icons"><?= $menu['icon'] ?></i>

                        <p><?= $menu['title'] ?></p>
                        </a>
                        <?php if (isset($menu['submenus'])): ?>
                            <ul class="sub-menu">
                                <?php foreach ($menu['submenu'] as $url => $title): ?>
                                    <li class="nav-link" class="nav-item>
                                        <a href="<?=$url?>">
                                            <?=$title?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>


                <li class="nav-item active-pro ">
                    <a class="nav-link" href="logout.php">
                        <i class="material-icons">unarchive</i>
                        <p>ÇIKIŞ</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">

            </div>
        </nav>
        <!-- End Navbar -->
