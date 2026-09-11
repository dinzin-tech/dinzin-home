<?php
require_once "./authHelper.php";
require_once "../server/autoload.php";

use classes\Table;

$jobApplicationsTable = new Table('job_applications');
$applications = $jobApplicationsTable->selectAllRecords();
if ($applications === false) {
    $applications = [];
}

$applications = array_reverse($applications);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Job Applications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #1f2937;
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 24px;
        }
        h2 {
            margin-top: 0;
        }
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #0f172a;
            color: #fff;
            border-radius: 8px;
            text-decoration: none;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            border: 1px solid #e5e7eb;
            padding: 10px 12px;
            vertical-align: top;
            text-align: left;
        }
        th {
            background: #f8fafc;
        }
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
        }
        .status.pending {
            background: #fff7ed;
            color: #c2410c;
        }
        .status.accepted {
            background: #ecfdf5;
            color: #047857;
        }
        .status.rejected {
            background: #fef2f2;
            color: #b91c1c;
        }
        .empty {
            padding: 20px;
            background: #fff7ed;
            border: 1px solid #fed7aa;
            color: #9a5b00;
            border-radius: 8px;
        }
        a.link {
            color: #2563eb;
            text-decoration: none;
        }
        .meta {
            color: #6b7280;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <h2>Job Applications</h2>
            <a class="btn" href="dashboard.php">Back to Dashboard</a>
        </div>

        <?php if (empty($applications)): ?>
            <div class="empty">No job applications submitted yet.</div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Applicant</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Qualification</th>
                        <th>Year</th>
                        <th>Referred By</th>
                        <th>Resume</th>
                        <th>Status</th>
                        <th>Submitted</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app): ?>
                        <tr>
                            <td><?php echo (int)($app['id'] ?? 0); ?></td>
                            <td><?php echo htmlspecialchars($app['full_name'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['email'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['phone'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['position'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['qualification'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['year_passing'] ?? 'N/A'); ?></td>
                            <td><?php echo htmlspecialchars($app['refered_by'] ?? 'N/A'); ?></td>
                            <td>
                                <?php if (!empty($app['resume_url'])): ?>
                                    <a class="link" href="<?php echo htmlspecialchars($app['resume_url']); ?>" target="_blank">View Resume</a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php
                                    $status = 'pending';
                                    $value = (int)($app['response'] ?? 0);
                                    if ($value === 1) {
                                        $status = 'accepted';
                                    } elseif ($value === 2) {
                                        $status = 'rejected';
                                    }
                                ?>
                                <span class="status <?php echo $status; ?>"><?php echo ucfirst($status); ?></span>
                            </td>
                            <td>
                                <span class="meta"><?php echo htmlspecialchars($app['date_time'] ?? 'N/A'); ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
