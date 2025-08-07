<?php

// Function to parse .env file
function parseEnv($file)
{
    $content = file_get_contents($file);
    $lines = explode("\n", $content);

    $env = [];

    foreach ($lines as $line) {
        $line = trim($line);

        // Ignore comments and empty lines
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $env[$key] = $value;
    }

    return $env;
}

// Load .env file
$env = parseEnv(__DIR__ . '../.env');

$dbHost = $env['DB_HOST'];
$dbUsername = $env['DB_USERNAME'];
$dbPassword = $env['DB_PASSWORD'];
$dbName = $env['DB_DATABASE'];

// Create a connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to the database successfully";

// Close the connection
//$conn->close();

?>