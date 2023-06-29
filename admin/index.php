<?php
session_start();

if ($_SESSION['login']){

} else {
    header("Location: login.php");
    exit("Hisobga kiring");
}

echo "Sertifikatlar<br>";


echo "Ishtirokchi qushish<br>";

echo "Hamma ishtirokchilar ruyxati<br><br>";

$ishtirokchilar = json_decode(file_get_contents("ishtirokchilar.json"));

foreach ($ishtirokchilar as $v){
    
}

?>
<html>
    <head>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <div class="bolim">
            <a href="hujjat_qush.php">Hujjat qo'shish</a><br><br>
            <a href="xotiralar.php">Xotiralar</a><br><br>
        </div>
        <hr>
    </body>
</html>