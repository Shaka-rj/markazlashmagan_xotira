<?php
///bu sahifaga doimiy surov kelib tushishi kerak.
///bu sahifa yangi hujjatlarni markaziy xotiradan import qiladi
///so'rov kelishi oralig'i hujjatlar qushilish soniga qarab
///hozirda 15 daqiqa

include "conf.php";
///admin_host o'zgaruvchisi keladi

function oxirgi_id(){//oxirgi hujjatning is raqami
    return count(scandir("xotira")) - 2;
}

/////
$oxirgi_id = oxirgi_id()+1;
for ($i=0; $i<100; $i++){
    
    $file = file_get_contents($admin_host."/xotira/$oxirgi_id.json");
    var_dump($file);
    if ($file){
        file_put_contents("xotira/$oxirgi_id.json", $file);
        $oxirgi_id++;
    } else {
        $i = 101;
    }
}
