<?php
    require 'header.php';
    require 'includes/classes/Dashboard.php';
    $functions = new Dashboard($con);
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <p class="card-category">Kayıtlı Kullanıcı</p>
                        <h3 class="card-title"> <?php $functions->getUserCount();?>
                            <small></small>
                        </h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-danger">warning</i>
                            <a href="javascript:;"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">ballot</i>
                        </div>
                        <p class="card-category">Toplam Gönderi</p>
                        <h3 class="card-title"><?php $functions->getPostCount();?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <p class="card-category">Toplam Beğeni</p>
                        <h3 class="card-title"><?php $functions->getLikeCount(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                            <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Toplam Yorum</p>
                        <h3 class="card-title"><?php $functions->getCommentCount(); ?></h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title"></span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">insert_comment</i> Son 5 Beğeni
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>

                                </tr>

                                    <?php $functions->getLastLikes(); ?>



                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Son 5 Yorum</h4>
                    <p class="card-category"></p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <tr><th>Sahibi</th>
                            <th>Yorum</th>
                        </tr></thead>
                        <tbody>
                        <?php $functions->getLastComments(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>