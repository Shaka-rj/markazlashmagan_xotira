<?php
session_start();

if ($_SESSION['login']){

} else {
    header("Location: login.php");
    exit("Hisobga kiring");
}

$xotiralar = json_decode(file_get_contents("xotiralar.json"), true);

if (isset($_POST['submit'])){
    if (isset($_POST['x_url'])){
        $xotiralar[] = $_POST['x_url'];
        file_put_contents("xotiralar.json", json_encode($xotiralar));
    }
} elseif (isset($_GET['uchirish'])){
    $del = $_GET['uchirish'];
    $arr_id = array_search($del, $xotiralar);
    unset($xotiralar[$arr_id]);
    file_put_contents("xotiralar.json", json_encode($xotiralar));
}





?>
<html>
    <head>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <div class="bolim">
            <a href="https://mx.2l.uz/admin">Asosiy oynaga</a><br><br>
            <a href="xotira_qush.php">Xotira qo'shish</a><br><br>
            <a href="hujjat_qush.php">Xotirani tekshirish</a><br><br>
        </div>
        <hr>
        <h2>Xotiralar</h2>
        <div class="xotiralar">
            <?php
                foreach ($xotiralar as $v){
                    echo "<p>$v - <a href='xotiralar.php?uchirish=$v'>Uchirish</a></p>";
                }
            ?>
        </div>
        <form method="post" class="forma2">
            <label for="x_url">Qo'shilayotgan xotira url manzili</label>
            <input type="text" name="x_url" for="x_url">
            <input type="submit" name="submit" value="Xotira qo'shish">
        </form>
    </body>
</html>