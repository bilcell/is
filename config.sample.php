<?php
// Veritabanı ayarları
$db_host = 'localhost';
$db_name = 'bilcell';
$db_user = 'kullanici';
$db_pass = 'sifre';

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Veritabanı bağlantı hatası: ' . $e->getMessage());
}
?>
