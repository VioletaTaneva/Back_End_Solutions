<?php

$dsn = 'sqlite:back-end-users-exercise.db'; 
$pdo = new PDO($dsn);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$usernameError = '';
$passwordError = '';
$successMessage = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username)) {
        $usernameError = 'Username cannot be empty.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->fetch()) {
            $usernameError = 'Username is already taken.';
        }
    }

    if (empty($password)) {
        $passwordError = 'Password cannot be empty.';
    } elseif (strlen($password) < 8) {
        $passwordError = 'Password must be at least 8 characters long.';
    } elseif (!preg_match('/[!?@_]/', $password)) {
        $passwordError = 'Password must contain at least one special character: ! ? @ _';
    }

    if (empty($usernameError) && empty($passwordError)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Insert user into the database
            $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();

            $successMessage = "User registered successfully!";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Close the database connection
$pdo = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
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
            padding: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            border-radius: 8px;

        }

        h2 {
            text-align: center;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color:rgb(21, 138, 247);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color:rgb(31, 176, 233);
        }

        .error {
            color: red;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .message {
            color: green;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register User</h2>

    <?php if ($successMessage): ?>
        <div class="message"><?= $successMessage ?></div>
    <?php endif; ?>

    <form method="POST">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required value="<?= isset($username) ? htmlspecialchars($username) : '' ?>">

        <?php if ($usernameError): ?>
            <div class="error"><?= $usernameError ?></div>
        <?php endif; ?>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>

        <?php if ($passwordError): ?>
            <div class="error"><?= $passwordError ?></div>
        <?php endif; ?>

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>
