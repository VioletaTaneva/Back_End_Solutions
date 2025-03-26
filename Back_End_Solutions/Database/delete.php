<?php
$dsn = 'sqlite:back-end-users-exercise.db'; 
$pdo = new PDO($dsn);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['delete_id'])) {
    $userId = $_GET['delete_id'];

    try {
        // DELETE query
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $stmt->bindParam(':id', $userId);
        $stmt->execute();

        // Redirect back to the page after deleting
        header('Location: delete.php');
        exit();
    } catch (PDOException $e) {
        echo "Error deleting user: " . $e->getMessage();
    }
}

// Fetch all users from the database
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Close the database connection
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            border-radius: 8px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        button:hover {
            background-color: #c0392b;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Delete Users</h2>

    <?php if (count($users) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['username']) ?></td>
                    <td>******</td> <!-- Hide the password -->
                    <td>
                        <!-- Delete Button with X -->
                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $user['id'] ?>)">
                            <button>Delete X</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No users found in the database.</p>
    <?php endif; ?>

</div>

<script>
    // conform delete function
    function confirmDelete(userId) {
        const confirmation = confirm("Are you sure you want to delete this user?");
        if (confirmation) {
  
            window.location.href = "delete.php?delete_id=" + userId;
        }
    }
</script>

</body>
</html>
