<?php

$dsn = 'sqlite:back-end-soft-del.db'; 
$pdo = new PDO($dsn);

// Set PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $usersTable = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        SoftDeleted INTEGER DEFAULT 0
        );
        ";
        
    $pdo->exec($usersTable);
    
    $insertUsers = "
    INSERT INTO users (username, password) VALUES 
    ('john_doe', 'password123'),
    ('jane_smith', 'password456'),
    ('bob_jones', 'password789'),
    ('alice_williams', 'password000'),
    ('charlie_brown', '12345'),
    ('lucy_liu', 'qwerty'),
    ('mike_williams', 'admin123'),
    ('susan_lee', 'password2022'),
    ('jack_daniels', 'ilovephp'),
    ('emily_clark', 'letmein123'),
    ('george_wilson', 'george123'),
    ('mary_jones', 'supersecret'),
    ('david_miller', 'davids123'),
    ('olivia_martin', 'securepassword'),
    ('hannah_roberts', 'hannah2022');
    ";
    

    $pdo->exec($insertUsers);

    echo "Tables created and dummy data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$pdo = null;
?>
