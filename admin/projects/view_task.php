<?php
include 'header.php';
include 'db.php';

$task_id = $_GET['id'];

// Get task details
$task = $conn->prepare("
    SELECT tasks.*, projects.name AS project_name, team_members.name AS assigned_to 
    FROM tasks 
    JOIN projects ON tasks.project_id = projects.id 
    LEFT JOIN team_members ON tasks.assigned_to = team_members.id 
    WHERE tasks.id = ?
");
$task->execute([$task_id]);
$task = $task->fetch(PDO::FETCH_ASSOC);

// Get comments
$comments = $conn->prepare("
    SELECT comments.*, team_members.name AS author 
    FROM comments 
    LEFT JOIN team_members ON comments.team_member_id = team_members.id 
    WHERE task_id = ?
    ORDER BY created_at DESC
");
$comments->execute([$task_id]);
?>

<div class="card">
    <h2><?= $task['title'] ?></h2>
    <div class="task-data">
        <div class="task-description">
            <p><?= $task['description'] ?></p>
        </div>
    
        <div class="task-meta">
            <p><strong>Project:</strong> <?= $task['project_name'] ?></p>
            <p><strong>Assigned To:</strong> <?= $task['assigned_to'] ?? 'Unassigned' ?></p>
            <p><strong>Status:</strong> 
                <span class="status <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span>
            </p>
        </div>
    </div>
</div>


<style>

.task-data-1 {
    display: flex;
    justify-content: flex-start;
    gap: 15px;
}

</style>

<div class="task-data-1">

    <div class="card" style="flex-grow: 3;">
        <h3>Comments</h3>
        <form action="add_comment.php" method="POST">
            <input type="hidden" name="task_id" value="<?= $task_id ?>">
            <div class="form-group">
                <textarea name="comment" placeholder="Add a comment..." required></textarea>
            </div>
            <button type="submit">Add Comment</button>
        </form>

        <div class="comment-section">
            <?php while($comment = $comments->fetch(PDO::FETCH_ASSOC)): ?>
            <div class="comment">
                <p><strong><?= $comment['author'] ?></strong> 
                <small><?= date('M d, Y H:i', strtotime($comment['created_at'])) ?></small></p>
                <p><?= $comment['comment'] ?></p>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="card" style="flex-grow: 1;">
        <h3>Update Status</h3>
        <form action="update_status.php" method="POST">
            <input type="hidden" name="task_id" value="<?= $task_id ?>">
            <div class="form-group">
                <select name="status">
                    <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                </select>
            </div>
            <button type="submit">Update Status</button>
        </form>
    </div>

</div>

<?php include 'footer.php'; ?>