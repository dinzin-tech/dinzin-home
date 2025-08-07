<?php
include 'header.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = htmlspecialchars($_POST['name']);
        $description = htmlspecialchars($_POST['description']);

        $stmt = $conn->prepare("INSERT INTO projects (name, description) VALUES (?, ?)");
        $stmt->execute([$name, $description]);
        
        $_SESSION['message'] = "Project created successfully!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
    header("Location: create_project.php");
    exit();
}

$projects = $conn->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();
?>

<div class="card">
    <h2>Create New Project</h2>
    
    <?php include 'messages.php'; ?>

    <form method="POST">
        <div class="form-group">
            <label>Project Name:</label>
            <input type="text" name="name" required>
        </div>
        
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" rows="4"></textarea>
        </div>

        <button type="submit">Create Project</button>
    </form>
</div>

<div class="card">
    <h3>Existing Projects</h3>
    
    <table class="task-list">
        <tr>
            <th>Project Name</th>
            <th>Description</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($projects as $project): ?>
        <tr>
            <td><?= htmlspecialchars($project['name']) ?></td>
            <td><?= htmlspecialchars($project['description']) ?></td>
            <td><?= date('M d, Y', strtotime($project['created_at'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'footer.php'; ?>