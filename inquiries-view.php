<?php
$storageFile = __DIR__ . '/storage/inquiries.json';
$inquiries = [];

if (file_exists($storageFile) && filesize($storageFile) > 0) {
    $json = file_get_contents($storageFile);
    $decoded = json_decode($json, true);
    if (is_array($decoded)) {
        $inquiries = $decoded;
    }
}

$inquiries = array_reverse($inquiries);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stored Contact Inquiries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f7f7f7;
            color: #222;
        }
        h1 {
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .meta {
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }
        .meta strong {
            color: #111;
        }
        .message {
            white-space: pre-wrap;
            line-height: 1.6;
        }
        .empty {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
            padding: 15px;
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <h1>Stored Contact Inquiries</h1>

    <?php if (empty($inquiries)): ?>
        <div class="empty">No inquiries saved yet.</div>
    <?php else: ?>
        <?php foreach ($inquiries as $item): ?>
            <div class="card">
                <div class="meta"><strong>Name:</strong> <?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></div>
                <div class="meta"><strong>Email:</strong> <?php echo htmlspecialchars($item['email'] ?? 'N/A'); ?></div>
                <div class="meta"><strong>Subject:</strong> <?php echo htmlspecialchars($item['subject'] ?? 'N/A'); ?></div>
                <div class="meta"><strong>Submitted At:</strong> <?php echo htmlspecialchars($item['submitted_at'] ?? 'N/A'); ?></div>
                <div class="meta"><strong>Full Subject:</strong> <?php echo htmlspecialchars($item['full_subject'] ?? 'N/A'); ?></div>
                <div class="message"><strong>Message:</strong><br><?php echo nl2br(htmlspecialchars($item['message'] ?? '')); ?></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>
