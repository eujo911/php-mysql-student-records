<?php
// delete a student by id
require 'db.php';
$db = new Database();
$id = (int)($_GET['id'] ?? 0);

$stmt = $db->conn->prepare('DELETE FROM students WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();

$msg = $stmt->affected_rows > 0 ? "Student $id deleted." : "No student found with id $id.";
header('Location: read.php?msg=' . urlencode($msg));
exit;
