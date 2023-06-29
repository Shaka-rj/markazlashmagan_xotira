<?php

    include('lib/phpqrcode/qrlib.php');


    QRcode::png("https://mx.2l.uz/mijoz/rasm/yarat.php?id=".$_GET['id']);
