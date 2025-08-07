<?php include 'header.php'; ?>
<h1>Project Dashboard</h1>

<div class="card">
    <h2>Quick Stats</h2>
    <?php
    include 'db.php';
    $projects = $conn->query("SELECT COUNT(*) FROM projects")->fetchColumn();
    $tasks = $conn->query("SELECT COUNT(*) FROM tasks")->fetchColumn();
    $members = $conn->query("SELECT COUNT(*) FROM team_members")->fetchColumn();
    $tasks_completed = $conn->query("SELECT COUNT(*) FROM tasks WHERE status='completed'")->fetchColumn();
    ?>
    <div style="display: flex; gap: 20px;">
        <div class="stat">
            <h3>Projects</h3>
            <p><?= $projects ?></p>
        </div>
        <div class="stat">
            <h3>Tasks</h3>
            <p><?= $tasks ?></p>
        </div>
        <div class="stat">
            <h3>Team Members</h3>
            <p><?= $members ?></p>
        </div>
        <div class="stat">
            <h3>Completed Tasks</h3>
            <p><?= $tasks_completed ?></p>
        </div>
    </div>
</div>
<style>
    .container .nav { display: none; }
</style>
<?php include 'view_tasks.php'; ?>
<?php include 'footer.php'; ?>