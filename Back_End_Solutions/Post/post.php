<?php
// Set predefined username and password
$username = 'potato';
$password = '12345';

// Initialize message variables
$message = '';
$messageClass = ''; // Class to style message

// Arrays for random messages
$welcomeMessages = [
    '✨ Why hello there!✨',
    '🎉 YEY! You\'re back! 🎉',
    '🌟 Halloo, nice to see you again. 🌟'
];

$errorMessages = [
    '❌ Wrong credentials Try again. Don\'t worry, I\'ll be here forever.',
    '😞 Invalid credentials. Don\'t give up!',
    '🚫 Hope you remeber your credentials. We don\'t have a reset system'
];

$noFieldMessages = [
    '⚠️ You missed a field, mate.',
    '🙃 Oops, you forgot to fill out one or both fields.',
    '😅 Did you fill everything, mate?'
];

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if username and password match
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $inputUsername = $_POST['username'];
        $inputPassword = $_POST['password'];

        // what happens if the username and password match (or don't)
        if ($inputUsername === $username && $inputPassword === $password) {
            $message = $welcomeMessages[array_rand($welcomeMessages)];
            $messageClass = 'success';
        } else {
            $message = $errorMessages[array_rand($errorMessages)];
            $messageClass = 'error';
        }
    } else {
        $message = $noFieldMessages[array_rand($noFieldMessages)];
        $messageClass = 'error';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        h2 {
            color: #333;
        }

        .input-group {
            margin: 10px 0;
            text-align: left;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .error {
            color: #d9534f;
            background: #f8d7da;
            border: 1px solid #d9534f;
        }

        .success {
            color: #155724;
            background: #d4edda;
            border: 1px solid #155724;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <!-- Login Form -->
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>

            <button type="submit" name="submit">Login</button>
        </form>

        <!-- Display Message -->
        <?php if (!empty($message)): ?>
            <div class="message <?= $messageClass; ?>">
                <?= $message; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>