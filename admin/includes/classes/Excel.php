<?php
require('config.php');

class Excel
{
    public function exportExcel($filename='ExportExcel', $title=array(), $data=array())
    {
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-disposition: attachment; filename='.$filename.'.xls');
        echo "\xEF\xBB\xBF";

        echo '<table border="1"> <tr>
                     <th style="background-color: #000000" colspan="12">
                           <font color="#8B8B8B">Kullanıcılar</font> 
                     </th>
                     </tr>
                     <tr>';

        foreach ($title as $v):

            echo '<th style="background-color:#FFA500">'.trim($v).'</th>';

        endforeach;

                echo '</tr> ';

                    $rowNum = count($title);

                    foreach ($data as $datas) :
                        echo '<tr>';

                            for ($i=0; $i < $rowNum; $i++) :
                                echo '<td>' . $datas[$i].'</td>';
                            endfor;

                    endforeach;
                    echo '</tr> </table>';



    }

    public function postsExcel($filename='ExportExcel', $title=array(), $data=array())
    {
        header('Content-Encoding: UTF-8');
        header('Content-Type: text/plain; charset=utf-8');
        header('Content-disposition: attachment; filename='.$filename.'.xls');
        echo "\xEF\xBB\xBF";

        echo '<table border="1"> <tr>
                     <th style="background-color: #000000" colspan="8">
                           <font color="#8B8B8B">Gönderiler</font> 
                     </th>
                     </tr>
                     <tr>';

        foreach ($title as $v):

            echo '<th style="background-color:#FFA500">'.trim($v).'</th>';

        endforeach;

        echo '</tr> ';

        $rowNum = count($title);

        foreach ($data as $datas) :
            echo '<tr>';

            for ($i=0; $i < $rowNum; $i++) :
                echo '<td>' . $datas[$i].'</td>';
            endfor;

        endforeach;
        echo '</tr> </table>';



    }

}
 ?>