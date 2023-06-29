<?php
session_start();

include 'conf.php';

if (isset($_POST['submit'])){
    $login = $_POST['login'];
    $parol = $_POST['parol'];
    
    if ($login == $admin_login and $parol == $admin_parol and $admin_login and $admin_parol){
        $_SESSION['login'] = true;
        header("Location: https://mx.2l.uz/admin/");
    } else {
        $_SESSION['login'] = false;
        $xato_txt = "Login yoki parol noto'g'ri";
    }
}


?>
<html>
    <head>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <?php
        if ($xato_txt){
            echo "<p style='color:red'>".$xato_txt."</p><br>";
        }
        ?>
        <p>Login hamda parolni kiriting</p>
        <form method="post" class="forma1">
            <input type="text" name="login">
            <input type="password" name="parol">
            <input type="submit" name="submit" value="Kirish">
        </form>
    </body>
</html>