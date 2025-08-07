<?php
include 'header.php';
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        $stmt = $conn->prepare("INSERT INTO team_members (name, email) VALUES (?, ?)");
        $stmt->execute([$name, $email]);
        
        $_SESSION['message'] = "Team member added successfully!";
    } catch (PDOException $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
    }
    header("Location: add_member.php");
    exit();
}

// Get existing members
$members = $conn->query("SELECT * FROM team_members ORDER BY name ASC")->fetchAll();
?>

<div class="card">
    <h2>Add Team Member</h2>
    
    <?php include 'messages.php'; ?>

    <form method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <button type="submit">Add Member</button>
    </form>
</div>

<div class="card">
    <h3>Existing Team Members</h3>
    
    <table class="task-list">
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php foreach ($members as $member): ?>
        <tr>
            <td><?= htmlspecialchars($member['name']) ?></td>
            <td><?= htmlspecialchars($member['email']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php include 'footer.php'; ?>