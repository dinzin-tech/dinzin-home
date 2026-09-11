<?php
// $host = 'localhost';
// $dbname = 'dinzinin_main';
// $username = 'dinzinin_main';
// $password = '9BDsbwAVYbKxHNqfbedn';

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

// Load .env file from the project root
$envFile = __DIR__ . '/../../.env';
if (!file_exists($envFile) && !empty($_SERVER['DOCUMENT_ROOT'])) {
    $envFile = rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/.env';
}

$env = parseEnv($envFile);

$host = $env['DB_HOST'] ?? '127.0.0.1';
$username = $env['DB_USERNAME'] ?? 'root';
$password = $env['DB_PASSWORD'] ?? '';
$dbname = $env['DB_DATABASE'] ?? 'dinzinin_main';

// $host = 'localhost';
// $dbname = 'dinzinin_main';
// $username = 'dinzinin_main';
// $password = '9BDsbwAVYbKxHNqfbedn';

/*DB_HOST=localhost
DB_USERNAME=dinzinin_main
DB_PASSWORD=9BDsbwAVYbKxHNqfbedn
DB_DATABASE=dinzinin_main*/

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
