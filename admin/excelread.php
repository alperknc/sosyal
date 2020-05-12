<?php
require 'includes/classes/config.php';
require 'header.php';

require 'includes/classes/SimpleXLSX.php';

?>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class='card'>
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Excel'den Oku</h4>
                        <p class="card-category">XLSX Dosyanı Yükle ve İçerisini Okut</p>
                    </div>

                        <div class='card-body'>

                        <div class='table-responsive'>
                            <table class='table'>
                                <thead class=' text-primary'>




<?php

if(isset($_FILES['dosya'])){
    $boyut=$_FILES['dosya']['size'];
    if($boyut>1024*1024*2){
        echo "dosya izin verilenden büyük";
    }
    else{
        echo "<br>";
        echo $tur=$_FILES['dosya']['type'];
        $dosyaadi=$_FILES['dosya']['name'];
        $uzanti=explode('.',$dosyaadi); //// resim1.res.jpg  /// jpg:2. eleman /// uzunluk:3
        echo "<br>";
        echo $uzanti=$uzanti[count($uzanti)-1];  ///uzanti bu satır çalıştığında artık değişken
        if($tur!='image/jpeg' OR $uzanti!='jpg'){

            $dosya=$_FILES['dosya']['tmp_name'];
            copy($dosya,'files/'.$_FILES['dosya']['name']);
            /// vt resimler tablosuna ürün id ve dosy adı ile kayıt yapacağım
            echo "tamamlandı";

            if ( $xlsx = SimpleXLSX::parse('files/' . $dosyaadi) ) {
                //echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
                foreach( $xlsx->rows() as $r ) {
                    echo '<tr><td>'.implode('</td><td>', $r ).'</td></tr>';
                }
                echo '</table>';
                // or $xlsx->toHTML();
            } else {
                echo SimpleXLSX::parseError();
            }


        }
    }
}
else{
    ?>
    <form enctype="multipart/form-data" action="excelread.php"  method="POST">

        <table border="1" cellpadding="4" align="center">
            <tr>
                <td>Dosya seçiniz:</td>
                <td><input type="FILE" name="dosya"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Yükle"></td>
            </tr>
        </table>
    </form>
    <?php
}
