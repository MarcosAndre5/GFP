<?php
    $DB = 'mysql:host=127.0.0.1;dbname=GFP';
    $usuarioDB = 'root';
    $senhaDB = '';

    $pdo = new PDO($DB, $usuarioDB, $senhaDB);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
