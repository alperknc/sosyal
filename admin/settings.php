<?php
require 'header.php';

if (isset($_POST['submit'])){
    $html = '<?php'.PHP_EOL.PHP_EOL;
    foreach ($_POST['settings'] as $key => $val){
        $html .= '$settings["' . $key . '"] = "' . $val . '";' . PHP_EOL;
    }
    file_put_contents('app/settings/fullsettings.php', $html);
    header('Location: settings.php');
}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Ayarlar</h4>
                    <p class="card-category">Tüm değişiklikleri buradan yapabilirsin</p>
                </div>
                <div class="card-body">
                    <form action="" method="post" class="form label">
                        <h3>Head Ayarları</h3>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Site Başlığı</label>
                                    <input type="text" class="form-control" name="settings[title]" value="<?=$settings["title"] ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Site Açıklaması</label>
                                    <input type="text" class="form-control" name="settings[description]" value="<?=$settings["description"]?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Site Keywords</label>
                                    <input type="text" class="form-control" name="settings[keywords]" value="<?=$settings["keywords"]?>">
                                </div>
                            </div>
                        </div>
                        <h3>Diğer</h3>
                        <input type="hidden" name="submit" value="1">
                        <button type="submit" class="btn btn-warning pull-right">Güncelle</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
