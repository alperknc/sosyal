<?php
require 'header.php';
require 'app/classes/User.php';
$user = new User($con);
?>


<div class="content">
    <div class="container-fluid">
        <div class="row">

         <?php   $user->userAdd($con); ?>

        </div>;
    </div>;
</div>;