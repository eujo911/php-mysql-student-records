<?php
// Update a student's email by id
require 'db.php';
$db = new Database();
$id = (int)($_GET['id'] ?? $_POST['id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $stmt = $db->conn->prepare('UPDATE students SET email = ? WHERE id = ?');
        $stmt->bind_param('si', $email, $id);
        $stmt->execute();
        header('Location: read.php?msg=' . urlencode("Student $id updated."));
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Update Email</title></head>
<body>
<h2>Update Email for Student #<?= $id ?></h2>
<?php if (!empty($error)) echo '<p style="color:red">' . htmlspecialchars($error) . '</p>'; ?>
<form method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <label>New email: <input type="email" name="email" required></label>
    <button type="submit">Update</button>
</form>
<p><a href="read.php">Back to list</a></p>
</body>
</html>
