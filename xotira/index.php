<?php
function oxirgi_id(){//oxirgi hujjatning is raqami
    return count(scandir("xotira")) - 2;
}

echo "Mavjud hujjatlar soni: ".oxirgi_id()."<br>";

echo "kerakli hujjatni id buyicha olish uchun: berhujjat?id=id - ko'rinishida junating";