<?php
session_start();
if (empty($_SESSION['logged_in'])) { header('Location: login.php'); exit; }
$employees = $_SESSION['employees'] ?? [];
require __DIR__ . '/includes/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
  <div><h1 class="h3 mb-1">Employee Management</h1><p class="text-muted mb-0">PHP sessions • Server-side forms</p></div>
  <a class="btn btn-primary" href="create.php">+ Add employee</a>
</div>
<?php if (!empty($_SESSION['flash'])): ?><div class="alert alert-success"><?= htmlspecialchars($_SESSION['flash']); unset($_SESSION['flash']); ?></div><?php endif; ?>
<div class="card"><div class="card-body">
  <div class="table-responsive"><table class="table align-middle">
    <thead><tr><th>#</th><th>Name</th><th>Email</th><th>Department</th><th>Action</th></tr></thead>
    <tbody>
    <?php if (!$employees): ?><tr><td colspan="5" class="text-center text-muted py-4">No employees yet. Add your first record.</td></tr><?php endif; ?>
    <?php foreach ($employees as $id => $e): ?>
      <tr><td><?= (int)$id ?></td><td><?= htmlspecialchars($e['name']) ?></td><td><?= htmlspecialchars($e['email']) ?></td><td><?= htmlspecialchars($e['department']) ?></td><td><a class="btn btn-sm btn-outline-primary" href="view.php?id=<?= (int)$id ?>">View</a></td></tr>
    <?php endforeach; ?>
    </tbody>
  </table></div>
</div></div>
<?php require __DIR__ . '/includes/footer.php'; ?>