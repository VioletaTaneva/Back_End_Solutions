<?php

$db = "spotify.sqlite";
$dsn = "sqlite:$db";

try {
    // Establish connection
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all tables from the database
    $tables = fetchAllTables($pdo);

    // Check if a table is selected from the URL
    $selectedTable = isset($_GET['table']) ? $_GET['table'] : '';

    // If a table is selected, fetch its columns and data
    if ($selectedTable) {
        $columns = getColumnsForTable($pdo, $selectedTable);
        $data = fetchDataForTable($pdo, $selectedTable);
    }

    closeSqliteDbConnection($pdo);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

function fetchAllTables($pdo)
{
    $query = "SELECT name FROM sqlite_master WHERE type='table';";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function fetchDataForTable($pdo, $tableName)
{
    $query = "SELECT * FROM $tableName";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getColumnsForTable($pdo, $tableName)
{
    $query = "PRAGMA table_info($tableName)";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function closeSqliteDbConnection(&$pdo)
{
    $pdo = null;
}


// 1 OR 1=1; DROP TABLE customers drop deletes the table customers 1 or 1=1 is alwys true so it'll always delete the table customers preform the action

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/global.css">
    <link rel="stylesheet" type="text/css" href="/css/directory.css">
    <link rel="stylesheet" type="text/css" href="/css/facade.css">
    <style>
        /* Basic Table Styling */
        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
            text-align: left;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        h1,
        h2,
        p {
            text-align: center;
        }

        /* Initially hide everything below the dropdown */
        .content {
            display: none;
        }
    </style>
</head>

<body>

    <h1>Databases: Connection</h1>

    <h2>Select a Table</h2>

    <!-- Dropdown to select a table -->
    <form method="get" action="">
        <select name="table" onchange="this.form.submit()">
            <option value="">Select a Table</option>
            <?php foreach ($tables as $table): ?>
                <option value="<?= htmlspecialchars($table['name']) ?>" <?= $selectedTable == $table['name'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($table['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- This div will hold all the content (columns and data) -->
    <div class="content" id="table-content">

        <?php if ($selectedTable): ?>
            <h2>Columns and Data for "<?= htmlspecialchars($selectedTable) ?>" Table</h2>

            <h3>Columns:</h3>
            <ul>
                <?php foreach ($columns as $column): ?>
                    <li><?= htmlspecialchars($column['name']) ?></li>
                <?php endforeach; ?>
            </ul>
            
            <h3>Data:</h3>


            <h3>URL:</h3>
            <input type="text" value="<?= htmlspecialchars("http://domain.com/?table=$selectedTable") ?>" readonly>

            <table>
                <tr>
                    <?php
                    // Display the headers based on the columns
                    foreach ($columns as $column) {
                        echo "<th>" . htmlspecialchars($column['name']) . "</th>";
                    }
                    ?>
                </tr>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <?php foreach ($columns as $column): ?>
                            <td><?= htmlspecialchars($row[$column['name']] ?? 'N/A') ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>

        <?php else: ?>
            <!-- If no table is selected, display this message -->
            <p>No table selected.</p>
        <?php endif; ?>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the selected table from the URL parameters
            const selectedTable = new URLSearchParams(window.location.search).get('table');
            const content = document.getElementById('table-content');

            // Show content if a table is selected
            if (selectedTable) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });
    </script>

</body>

</html>

