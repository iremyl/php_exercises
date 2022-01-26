<?php

try {

    $db = new PDO("mysql:host=localhost; dbname=uyelik_sistemi; charset=utf8", 'root', '');
    //echo "bağlantı başarılı";
} catch (PDOException $e) {
    echo $e->getMessage();
}
