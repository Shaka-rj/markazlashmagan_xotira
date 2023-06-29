<?php
include "conf.php";
$id = $_GET['id'];

if (isset($_GET['id'])){
    $forma = false;
    $xotiralar = json_decode(file_get_contents("$admin_host/xotiralar.json"), true);

    foreach ($xotiralar as $l){
        $l = $l."/xotira/$id.json";
        $v = json_decode(file_get_contents($l), true);
        $hujj['hujjat_nom'] = $v['hujjat_nom'];
        $hujj['hujjat_sana'] = $v['hujjat_sana'];
        $hujj['yaratilgan_vaqt'] = $v['yaratilgan_vaqt'];
        $hujj['tashkilot_nom'] = $v['tashkilot_nom'];
        $hujj['beruvchi_ism'] = $v['beruvchi_ism'];
        $hujj['ism'] = $v['ism'];
        $hujj['malumot'] = $v['malumot'];
        $hujj['oldin_hash'] = $v['oldin_hash'];
        $son++;
    }
    
} else {
    $forma = true;
}

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Sertifikat qidiruvchi</title>
        <link rel="icon" type="image/x-icon" href="rasm/favicon.ico">
    </head>
    <body>
        <h1>Hujjat tekshiruvchi</h1>
        <h4>Hujjat haqiqiyligini tekshiruvchi</h4>
        <br>
        <?php
        if ($forma){
            ?>
            
        <div class="forma">
            <p>Qidirish uchun hujjat id raqamini kiriting</p>
            <form method="get">
                <input type="text" name="id" placeholder="hujjat id">
                <button type="submit"><img src="rasm/qidiruv.png"></button>
            </form>
        </div>
            
            <?php
        } else {
            ?>
        <div class="hujjat">
            <div class="bosh_malumot">
                <p>id: <?=$_GET['id']?></p>
                <p>vaqt: <?=$hujj['yaratilgan_vaqt']?></p>
                <p>oldingi hash: <?=$hujj['oldin_hash']?></p>
            </div>        
            <div class="tana_malumot">
                <p>Hujjat nomi: <?=$hujj['hujjat_nom']?></p>
                <p>Hujjat beruvchi tashkilot: <?=$hujj['tashkilot_nom']?></p>
                <p>Hujjat berilgan shaxs: <?=$hujj['ism']?></p>
                <p>Ma'lumot: <?=$hujj['malumot']?></p>
            </div>
            <div class="past_malumot">
                <p>Berilgan sana: <?=$hujj['hujjat_sana']?></p>
                <p>Hujjat beruvchi shaxs: <?=$hujj['beruvchi_ism']?></p>
            </div>
        </div>
        <div class="haqiqiylik_malumotlari">
            <p>Tekshirilgan xotiralar soni: <?=$son?></p>
            <p>Haqiqiylik darjasi: 100%</p>
        </div>
        <div class="yuklash">
            <a href="https://mx.2l.uz/mijoz/rasm/yarat.php?id=<?=$id?>">Yuklab olish</a>
        </div>
            <?php
        }
        ?>
        <div class="logo">
            <img src="rasm/bulut.png">
        </div>
    </body>
</html>