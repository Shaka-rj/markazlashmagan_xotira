<?php

function oxirgi_id(){//oxirgi hujjatning is raqami
    return count(scandir("xotira")) - 2;
}

function hashlash($id){//berilgan hujjat buyicha faylning hashini qaytaradi
    $fayl = json_decode(file_get_contents("xotira/$id.json"), true);
    
    $txt = '';
    foreach ($fayl as $k=>$v){
        $txt .= $k.'-'.$v.":";
    }
    
    return md5($txt);
}

function fayl_qush($arr){//arrayni qushadi
    $yangi_id = oxirgi_id() + 1;
    $arr['oldin_hash'] = hashlash($yangi_id - 1);
    return file_put_contents("xotira/$yangi_id.json", json_encode($arr));
}