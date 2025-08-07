<?php if (isset($_SESSION['message'])): ?>
<div class="message success">
    <?= $_SESSION['message'] ?>
    <?php unset($_SESSION['message']); ?>
</div>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<div class="message error">
    <?= $_SESSION['error'] ?>
    <?php unset($_SESSION['error']); ?>
</div>
<?php endif; ?>

<style>
.message {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>