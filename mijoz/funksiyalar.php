<?php
include "conf.php";

function hashlash($id){//berilgan hujjat buyicha faylning hashini qaytaradi
    global $admin_host;
    $fayl = json_decode(file_get_contents($admin_host."/xotira/$id.json"), true);
    
    $txt = '';
    foreach ($fayl as $k=>$v){
        $txt .= $k.'-'.$v.":";
    }
    
    return md5($txt);
}

function olhujjat($id){
    
}


echo microtime();
echo hashlash(1);
echo hashlash(2)."<br>";
echo microtime();