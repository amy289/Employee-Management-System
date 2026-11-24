<?php
session_start();
if (empty($_SESSION['logged_in'])) { header('Location: login.php'); exit; }
$errors = []; $name = ''; $email = ''; $department = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $department = trim($_POST['department'] ?? '');
  if ($name === '') $errors[] = 'Name is required.';
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Enter a valid email address.';
  if ($department === '') $errors[] = 'Department is required.';
  if (!$errors) {
    $id = (int)(($_SESSION['next_id'] ?? 1000));
    $_SESSION['next_id'] = $id + 1;
    $_SESSION['employees'][$id] = compact('name','email','department');
    $_SESSION['flash'] = 'Employee added successfully.';
    header('Location: index.php'); exit;
  }
}
require __DIR__ . '/includes/header.php';
?>
<h1 class="h3 mb-4">Add employee</h1>
<?php if ($errors): ?><div class="alert alert-danger"><ul class="mb-0"><?php foreach ($errors as $error): ?><li><?= htmlspecialchars($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
<form method="post" class="card card-body">
 <label class="form-label" for="name">Full name</label><input class="form-control mb-3" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
 <label class="form-label" for="email">Email</label><input class="form-control mb-3" id="email" name="email" type="email" value="<?= htmlspecialchars($email) ?>" required>
 <label class="form-label" for="department">Department</label><select class="form-select mb-4" id="department" name="department" required><option value="">Choose...</option><?php foreach (['Software Engineering','Human Resources','Finance','Marketing','IT Support'] as $d): ?><option <?= $department===$d?'selected':'' ?>><?= htmlspecialchars($d) ?></option><?php endforeach; ?></select>
 <div><button class="btn btn-primary">Save employee</button> <a class="btn btn-light" href="index.php">Cancel</a></div>
</form>
<?php require __DIR__ . '/includes/footer.php'; ?>