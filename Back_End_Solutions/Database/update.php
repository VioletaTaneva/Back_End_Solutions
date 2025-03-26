<?php
// Database connection
$dsn = 'sqlite:back-end-users-exercise.db'; // SQLite database file
$pdo = new PDO($dsn);

// Set PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    // Check if an update request is made
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare an update query
        $updateQuery = "UPDATE users SET username = :username, password = :password WHERE id = :id";
        $stmt = $pdo->prepare($updateQuery);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        
        // Execute the update query
        $stmt->execute();

        echo "User updated successfully!";
    }

    // Retrieve all users from the database
    $selectQuery = "SELECT * FROM users";
    $stmt = $pdo->query($selectQuery);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>User Dashboard</h2>";
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>";

    // Display each user in an editable row
    foreach ($users as $user) {
        echo "<tr>
                <form method='POST'>
                    <td><input type='text' name='id' value='{$user['id']}' readonly></td>
                    <td><input type='text' name='username' value='{$user['username']}'></td>
                    <td><input type='text' name='password' value='{$user['password']}'></td>
                    <td><input type='submit' name='update' value='Update'></td>
                </form>
            </tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$pdo = null;
?>
