<?php
session_start();
include 'funksiyalar.php';

if ($_SESSION['login']){

} else {
    header("Location: login.php");
    exit("Hisobga kiring");
}


if (isset($_POST['submit'])){
    $json = [
        'hujjat_nom' => $_POST['hujjat_nom'],
        'hujjat_sana' => $_POST['hujjat_sana'],
        'yaratilgan_vaqt' => time(),
        'tashkilot_nom' => $_POST['tashkilot_nom'],
        'beruvchi_ism' => $_POST['beruvchi_ism'],
        'ism' => $_POST['ism'],
        'malumot' => $_POST['malumot']
    ];
    
    fayl_qush($json);
}

?>
<html>
    <head>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <form method="post" class="forma2">
            <label for="nom">Hujjat nomi</label>
            <input type="text" name="hujjat_nom" id="nom">
            <label for="sana">Hujjat sanasi</label>
            <input type="text" name="hujjat_sana" id="sana">
            <hr>
            <label for="tashkilot_nom">Hujjat beruvchi tashkilot nomi</label>
            <input type="text" name="tashkilot_nom" id="tashkilot_nom">
            <label for="beruvchi_ism">Hujjatni beruvchi shaxs ismi</label>
            <input type="text" name="beruvchi_ism" id="beruvchi_ism">
            <label for="ism">Hujjat berilgan shaxs ismi</label>
            <input type="text" name="ism" id="ism">
            <label for="malumot">Hujjat malumotlari</label><br>
            <textarea maxlength="500" id="malumot" name="malumot">
                
            </textarea>
            <hr>
            <input type="submit" name="submit" value="Yaratish">
        </form>
    </body>
</html>