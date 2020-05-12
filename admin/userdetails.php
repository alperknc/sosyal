<?php
require 'header.php';
require 'includes/classes/User.php';
$user = new User($con);




?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Kullanıcı Gönderileri</h4>
                        <p class="card-category">Seçili kullanıcıya ait gönderiler</p>
                    </div>
                    <div class="card-body">


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            ID
                                        </th>
                                        <th>
                                            Yazı
                                        </th>
                                        <th>
                                            Tarih
                                        </th>
                                        <th>
                                            Durum
                                        </th>
                                        <th>
                                            Beğeni
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                        <?php

                                        @$operation = $_GET["operation"];

                                        switch ($operation) :

                                        //------------Yönetim---------------
                                        case "user":
                                        $user->getUser($con);
                                        break;
                                        endswitch;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
