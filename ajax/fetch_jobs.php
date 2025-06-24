<?php
require_once '../config.php';
$stmt = $pdo->query('SELECT * FROM jobs ORDER BY created_at DESC');
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($row['description']) . '</td>';
    echo '<td>' . htmlspecialchars($row['start_date']) . '</td>';
    echo '<td>' . htmlspecialchars($row['end_date']) . '</td>';
    echo '<td>' . htmlspecialchars($row['status']) . '</td>';
    echo '</tr>';
}
?>
