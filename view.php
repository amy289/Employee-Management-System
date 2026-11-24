<?php
session_start();
if (empty($_SESSION['logged_in'])) { header('Location: login.php'); exit; }
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$employee = ($id !== false && $id !== null) ? ($_SESSION['employees'][$id] ?? null) : null;
require __DIR__ . '/includes/header.php';
?>
<h1 class="h3 mb-4">Employee details</h1>
<?php if (!$employee): ?><div class="alert alert-warning">Employee not found.</div><?php else: ?>
<div class="card card-body"><p><strong>Employee ID:</strong> <?= (int)$id ?></p><p><strong>Name:</strong> <?= htmlspecialchars($employee['name']) ?></p><p><strong>Email:</strong> <?= htmlspecialchars($employee['email']) ?></p><p><strong>Department:</strong> <?= htmlspecialchars($employee['department']) ?></p></div>
<?php endif; ?><a class="btn btn-primary mt-3" href="index.php">Back to list</a>
<?php require __DIR__ . '/includes/footer.php'; ?>