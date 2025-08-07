<?php include 'header.php'; ?>
<?php
include 'db.php';
$tasks = $conn->query("
    SELECT tasks.*, projects.name AS project_name, team_members.name AS assigned_to 
    FROM tasks 
    JOIN projects ON tasks.project_id = projects.id 
    LEFT JOIN team_members ON tasks.assigned_to = team_members.id
");
?>

<h1>All Tasks</h1>

<table class="task-list">
    <tr>
        <th>Task</th>
        <th>Project</th>
        <th>Assigned To</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while($task = $tasks->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><a href="view_task.php?id=<?= $task['id'] ?>"><?= $task['title'] ?></a></td>
        <td><?= $task['project_name'] ?></td>
        <td><?= $task['assigned_to'] ?? 'Unassigned' ?></td>
        <td><span class="status <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span></td>
        <td>
            <a href="view_task.php?id=<?= $task['id'] ?>">View</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'footer.php'; ?>