<?php
include "../conf.php";

header('Content-type: image/jpeg');
$jpg_image = imagecreatefromjpeg('rasm_shablon.jpg');
$rang = imagecolorallocate($jpg_image, 0, 0, 0);
$font1 = './arial.ttf';
$font2 = './consola.ttf';


$h_id = $_GET['id'];
$fayl = json_decode(file_get_contents($admin_host."/xotira/$h_id.json"), true);

$id = $h_id;
$vaqt = $fayl['yaratilgan_vaqt'];
$oldin_hash = $fayl['oldin_hash'];
$hujjat_nomi = $fayl['hujjat_nom'];
$hujjat_beruvchi_tashkilot = $fayl['tashkilot_nom'];
$hujjat_berilgan_shaxs = $fayl['ism'];
$malumot = $fayl['malumot'];
$sana = $fayl['hujjat_sana'];
$hujjat_beruvchi_shaxs = $fayl['beruvchi_ism'];

$uzunlik = strlen($malumot);
if ($uzunlik > 76){
    $uzun = floor($uzunlik/76)+1;
    for ($i=0;$i<$uzun;$i++){
        if ($i==0){
            $m = substr($malumot, $i*76, 76);
        } else {
            $m = $m."-\n".substr($malumot, $i*76, 76);
        }
    }
    $malumot = $m;
}


imagettftext($jpg_image, 24, 0, 772, 256, $rang, $font2, $id);
imagettftext($jpg_image, 24, 0, 772, 310, $rang, $font2, $vaqt);
imagettftext($jpg_image, 24, 0, 772, 368, $rang, $font2, $oldin_hash);
imagettftext($jpg_image, 24, 0, 150, 530, $rang, $font1, $hujjat_nomi);
imagettftext($jpg_image, 24, 0, 150, 706, $rang, $font1, $hujjat_beruvchi_tashkilot);
imagettftext($jpg_image, 24, 0, 150, 880, $rang, $font1, $hujjat_berilgan_shaxs);
imagettftext($jpg_image, 24, 0, 150, 1150, $rang, $font1, $malumot);
imagettftext($jpg_image, 24, 0, 150, 1820, $rang, $font1, $sana);
imagettftext($jpg_image, 24, 0, 500, 1820, $rang, $font1, $hujjat_beruvchi_shaxs);

$image_2 = imagecreatefrompng('https://mx.2l.uz/mijoz/qr.php?id='.$id);
imagealphablending($jpg_image, true);
    imagesavealpha($jpg_image, true);
    imagecopy($jpg_image, $image_2, 1300, 1900, 0, 0, 400, 400);

imagejpeg($jpg_image);
imagedestroy($jpg_image);
?>