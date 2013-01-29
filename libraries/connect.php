<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/config.php';

    try {
        $db = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }