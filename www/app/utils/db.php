<?php
try
{
    $db = new PDO(
        'mysql:host=db;dbname=demo;charset=utf8',
        'demo',
        'password',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}