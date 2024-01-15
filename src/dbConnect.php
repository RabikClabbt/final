<?php
    const SERVER = 'mysql217.phy.lolipop.lan';
    const DBNAME = 'LAA1517467-final';
    const USER = 'LAA1517467';
    const PASS = 'pass0121';
    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
    $pdo = new PDO($connect, USER, PASS);
?>