<?php
// GitHub webhook listener

// $logFile = __DIR__ . '/github-webhook.log';
// $timestamp = date('Y-m-d H:i:s');
// $headers = getallheaders();
// $payload = file_get_contents('php://input');

// // Optionally verify GitHub signature (if you set a secret — see Step 3)
// $signature = $headers['X-Hub-Signature-256'] ?? '';
// $secret = 'f57681a6f68e8a9afc8728f34fbbbd26'; // Set this if you enable secret in GitHub webhook

// // Verify signature (optional but recommended)
// if (!empty($secret)) {
//     $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
//     if (!hash_equals($expectedSignature, $signature)) {
//         http_response_code(403);
//         echo "Invalid signature";
//         exit;
//     }
// }

// // Decode JSON payload
// $data = json_decode($payload, true);

// // Save to log
// file_put_contents($logFile, "[$timestamp]\n", FILE_APPEND);
// file_put_contents($logFile, $headers . "\n\n", FILE_APPEND);
// file_put_contents($logFile, $payload . "\n\n", FILE_APPEND);

// // send to pumble
// // Set your Pumble webhook URL
// $pumbleWebhook = 'https://api.pumble.com/workspaces/68301f17ec53e948e9b40eca/incomingWebhooks/postMessage/iW8LvDukaxyTX7g2k6LMXgss';

// // Build formatted message
// $eventType = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'unknown';
// $repo = $data['repository']['full_name'] ?? '';
// $user = $data['sender']['login'] ?? '';
// $url = $data['repository']['html_url'] ?? '';
// $summary = '';

// if ($eventType === 'push') {
//     $ref = $data['ref'];
//     $commits = $data['commits'] ?? [];
//     $summary = "**Push** to `$ref` by **$user**:\n";
//     foreach ($commits as $c) {
//         $sha = substr($c['id'],0,7);
//         $msg = $c['message'];
//         $author = $c['author']['name'];
//         $summary .= "- [`$sha`]($c[url]) $msg — _by $author_\n";
//     }
// } elseif ($eventType === 'pull_request') {
//     $pr = $data['pull_request'];
//     $action = $data['action'];
//     $summary = "**PR {$action}**: [#{$pr['number']}]({$pr['html_url']}) **{$pr['title']}**\n";
//     $summary .= "> by **{$pr['user']['login']}** ({$pr['body']})\n";
// } else {
//     $summary = "**$eventType** event received from **$repo** by **$user**";
// }

// // Optionally include link to repo
// $summary .= "\n\n*Repo*: [{$repo}]({$url})";

// // Send to Pumble
// $payloadP = json_encode(['text' => $summary]);
// $ch = curl_init($pumbleWebhook);
// curl_setopt_array($ch, [
//     CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
//     CURLOPT_POST => true,
//     CURLOPT_POSTFIELDS => $payloadP,
//     CURLOPT_RETURNTRANSFER => true,
// ]);
// $response = curl_exec($ch);
// curl_close($ch);



// // Respond to GitHub
// http_response_code(200);
// echo json_encode(['status' => 'received']);




// GitHub webhook listener

$logFile = __DIR__ . '/github-webhook.log';
$errorLogFile = __DIR__ . '/github-error.log';
$timestamp = date('Y-m-d H:i:s');
$headers = getallheaders();
$payload = file_get_contents('php://input');

function logError($message) {
    global $errorLogFile, $timestamp;
    file_put_contents($errorLogFile, "[$timestamp] $message\n", FILE_APPEND);
}

// Signature Verification
$signature = $headers['X-Hub-Signature-256'] ?? '';
$secret = 'f57681a6f68e8a9afc8728f34fbbbd26';

if (!empty($secret)) {
    $expectedSignature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($expectedSignature, $signature)) {
        logError("Invalid signature");
        http_response_code(403);
        echo "Invalid signature";
        exit;
    }
}

// Decode JSON payload
$data = json_decode($payload, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    logError("Invalid JSON payload: " . json_last_error_msg());
    http_response_code(400);
    echo "Invalid JSON";
    exit;
}

// Save to log
file_put_contents($logFile, "[$timestamp]\n", FILE_APPEND);
file_put_contents($logFile, print_r($headers, true) . "\n", FILE_APPEND);
file_put_contents($logFile, $payload . "\n\n", FILE_APPEND);

// send to pumble
// $pumbleWebhook = 'https://api.pumble.com/workspaces/.../incomingWebhooks/postMessage/...';
$pumbleWebhook = 'https://api.pumble.com/workspaces/68301f17ec53e948e9b40eca/incomingWebhooks/postMessage/iW8LvDukaxyTX7g2k6LMXgss';

$eventType = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? 'unknown';
$repo = $data['repository']['full_name'] ?? '';
$user = $data['sender']['login'] ?? '';
$url = $data['repository']['html_url'] ?? '';
$summary = '';

try {
    if ($eventType === 'push') {
        $ref = $data['ref'];
        $commits = $data['commits'] ?? [];
        $summary = "**Push** to `$ref` by **$user**:\n";
        foreach ($commits as $c) {
            $sha = substr($c['id'], 0, 7);
            $msg = $c['message'];
            // $author = $c['author']['name'];
            $author = $c['committer']['name'];
            $summary .= "- [`$sha`]({$c['url']})  \"$msg\"  — _by $author"."_ \n";
        }
    } elseif ($eventType === 'pull_request') {
        $pr = $data['pull_request'];
        $action = $data['action'];
        $summary = "**PR {$action}**: [#{$pr['number']}]({$pr['html_url']}) **{$pr['title']}**\n";
        $summary .= "> by **{$pr['user']['login']}** ({$pr['body']})\n";
    } else {
        $summary = "**$eventType** event received from **$repo** by **$user**";
    }

    $summary .= "\n*Repo*: [{$repo}]({$url})";

    $payloadP = json_encode(['text' => $summary]);
    $ch = curl_init($pumbleWebhook);
    curl_setopt_array($ch, [
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payloadP,
        CURLOPT_RETURNTRANSFER => true,
    ]);
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
        logError("cURL error sending to Pumble: $error");
    }

    curl_close($ch);
} catch (Exception $e) {
    logError("Exception: " . $e->getMessage());
}

http_response_code(200);
echo json_encode(['status' => 'received']);
