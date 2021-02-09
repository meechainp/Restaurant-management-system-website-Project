<?php
    $pdo = new PDO("mysql:host=localhost;dbname=mallikadata;charset=utf8", "nineo", "12345678cat");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
