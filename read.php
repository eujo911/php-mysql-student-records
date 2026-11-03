<?php
//Retrieve all students and show them in an HTML table
require 'db.php';
$db = new Database();
$result = $db->conn->query('SELECT id, name, age, email FROM students ORDER BY id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Students</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px 12px; }
        th { background: #eee; }
    </style>
</head>
<body>
<h2>Student Records</h2>
<?php if (isset($_GET['msg'])): ?>
    <p><strong><?= htmlspecialchars($_GET['msg']) ?></strong></p>
<?php endif; ?>

<table>
    <tr><th>ID</th><th>Name</th><th>Age</th><th>Email</th><th>Actions</th></tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['age'] ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td>
            <a href="update.php?id=<?= $row['id'] ?>">Update email</a> |
            <a href="delete.php?id=<?= $row['id'] ?>"
               onclick="return confirm('Delete this student?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
