<?php
require_once '../config.php';
$description = $_POST['description'];
$start = $_POST['start_date'] ?: null;
$end = $_POST['end_date'] ?: null;
$status = $_POST['status'];
$stmt = $pdo->prepare('INSERT INTO jobs(description, start_date, end_date, status) VALUES (?,?,?,?)');
$stmt->execute([$description, $start, $end, $status]);
?>
