<?php
include 'header.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // print_r($_POST);exit;
    try {
        $project_id = $_POST['project_id'];
        $title = htmlspecialchars($_POST['title']);
        $description = $_POST['description'];
        $assigned_to = $_POST['assigned_to'];

        $stmt = $conn->prepare("INSERT INTO tasks (project_id, title, description, assigned_to) VALUES (?, ?, ?, ?)");
        $stmt->execute([$project_id, $title, $description, $assigned_to]);
        
        $_SESSION['message'] = "Task created successfully!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
    header("Location: add_task.php");
    exit();
}

$projects = $conn->query("SELECT * FROM projects ORDER BY name ASC")->fetchAll();
$members = $conn->query("SELECT * FROM team_members ORDER BY name ASC")->fetchAll();
$tasks = $conn->query("SELECT tasks.*, projects.name AS project_name FROM tasks JOIN projects ON tasks.project_id = projects.id ORDER BY tasks.created_at DESC LIMIT 5")->fetchAll();
?>

<div class="card">
    <h2>Create New Task</h2>
    
    <?php include 'messages.php'; ?>

    <form method="POST">
        <div class="form-group">
            <label>Project:</label>
            <select name="project_id" required>
                <option value="">Select Project</option>
                <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>"><?= htmlspecialchars($project['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="form-group">
            <label>Task Title:</label>
            <input type="text" name="title" required>
        </div>
        
        <div class="form-group">
            <label>Description:</label>
            <textarea class="text-editor" name="description" rows="4"></textarea>
        </div>
        
        <div class="form-group">
            <label>Assign To:</label>
            <select name="assigned_to" required>
                <option value="">Select Team Member</option>
                <?php foreach ($members as $member): ?>
                <option value="<?= $member['id'] ?>"><?= htmlspecialchars($member['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Create Task</button>
    </form>
</div>

<div class="card">
    <h3>Recent Tasks</h3>
    
    <table class="task-list">
        <tr>
            <th>Task</th>
            <th>Project</th>
            <th>Status</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?= htmlspecialchars($task['title']) ?></td>
            <td><?= htmlspecialchars($task['project_name']) ?></td>
            <td><span class="status <?= $task['status'] ?>"><?= ucfirst($task['status']) ?></span></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'footer.php'; ?>