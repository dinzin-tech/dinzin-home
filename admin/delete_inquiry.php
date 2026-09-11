<?php
$storageFile = __DIR__ . '/../storage/inquiries.json';

if (!file_exists($storageFile)) {
    http_response_code(404);
    echo 'No inquiries file found.';
    exit;
}

$id = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if ($id === null || $id === '') {
    http_response_code(400);
    echo 'Missing inquiry id.';
    exit;
}

$id = (int) $id;

$json = file_get_contents($storageFile);
$data = json_decode($json, true);

if (!is_array($data)) {
    http_response_code(500);
    echo 'Invalid inquiry data.';
    exit;
}

if ($id < 0 || $id >= count($data)) {
    http_response_code(404);
    echo 'Inquiry not found.';
    exit;
}

array_splice($data, $id, 1);

file_put_contents($storageFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header('Content-Type: application/json');
echo json_encode(['success' => true]);
