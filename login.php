<?php
session_start();
if (!empty($_SESSION['logged_in'])) { header('Location: index.php'); exit; }
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';
  // Classroom demo credentials only. Replace with a database and password_hash() in production.
  if ($username === 'admin' && $password === 'Lab9Demo!') {
    session_regenerate_id(true); $_SESSION['logged_in'] = true; $_SESSION['username'] = $username;
    $_SESSION['employees'] ??= [1001 => ['name'=>'Ayesha Khan','email'=>'ayesha@example.com','department'=>'Software Engineering'], 1002 => ['name'=>'Ali Raza','email'=>'ali@example.com','department'=>'IT Support']];
    $_SESSION['next_id'] ??= 1003; header('Location: index.php'); exit;
  } else { $error = 'Incorrect demo username or password.'; }
}
require __DIR__ . '/includes/header.php';
?>
<div class="row justify-content-center"><div class="col-md-6 col-lg-5"><div class="card card-body">
<h1 class="h3 mb-3">Admin login</h1><p class="text-muted">Sign in to open the employee dashboard.</p>
<?php if ($error): ?><div class="alert alert-danger"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post"><label class="form-label">Username</label><input class="form-control mb-3" name="username" required><label class="form-label">Password</label><input class="form-control mb-3" name="password" type="password" required><button class="btn btn-primary w-100">Login</button></form>
<div class="small text-muted mt-3">Demo: <code>admin</code> / <code>Lab9Demo!</code></div>
</div></div></div>
<?php require __DIR__ . '/includes/footer.php'; ?>