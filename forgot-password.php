<?php
require_once __DIR__ . '/config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        $error = 'Please fill in all required fields.';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'The new passwords do not match. Please try again.';
    } else {
        try {
            $pdo = Database::getInstance();
            $stmt = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(:email) LIMIT 1");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if (!$user) {
                $error = 'No account was found with this email address.';
            } else {
                $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
                $updateStmt = $pdo->prepare("UPDATE users SET password = :password WHERE id = :uid");
                $updateStmt->execute([
                    ':password' => $hashed,
                    ':uid' => $user['id']
                ]);

                header("Location: login.php?success=password_reset");
                exit;
            }
        } catch (Exception $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mythology | Reset Password</title>

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Playfair+Display:wght@500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #000; color: #fff; }
    .container { display: flex; min-height: 100vh; }
    .image-section { flex: 1.2; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('static/god.jpg') center/cover no-repeat; }
    .login-section { flex: 1; padding: 60px 80px; background: #0b0b0b; display: flex; flex-direction: column; justify-content: center; max-width: 580px; }
    .logo { color: #d4af37; margin-bottom: 25px; letter-spacing: 2px; font-family: 'Cinzel', serif; font-weight: 700; font-size: 18px; cursor: pointer; }
    h1 { font-family: 'Cinzel', 'Playfair Display', serif; font-size: 36px; margin-bottom: 8px; color: #fff; }
    .subtitle { color: #aaa; margin-bottom: 30px; font-size: 14px; }
    .alert-box { padding: 12px 16px; border-radius: 8px; margin-bottom: 25px; font-size: 13.5px; display: flex; align-items: center; gap: 10px; }
    .alert-danger { background: rgba(255, 71, 87, 0.15); border: 1px solid rgba(255, 71, 87, 0.4); color: #ff4757; }
    .alert-success { background: rgba(46, 213, 115, 0.15); border: 1px solid rgba(46, 213, 115, 0.4); color: #2ed573; }
    form { width: 100%; }
    label { font-size: 12px; color: #ccc; margin-bottom: 6px; display: block; font-weight: 500; letter-spacing: 0.5px; }
    .input-wrapper { position: relative; margin-bottom: 20px; }
    input { width: 100%; padding: 14px 16px; background: #141414; border: 1px solid #2e2e2e; color: #fff; border-radius: 8px; font-size: 14px; outline: none; transition: all 0.25s; }
    input:focus { border-color: #d4af37; box-shadow: 0 0 12px rgba(212, 175, 55, 0.25); }
    .signin-btn { width: 100%; padding: 14px; background: linear-gradient(135deg, #d4af37, #b8860b); border: none; border-radius: 8px; font-weight: 700; font-size: 14px; color: #000; cursor: pointer; margin-top: 10px; letter-spacing: 1px; transition: all 0.25s; }
    .signin-btn:hover { background: linear-gradient(135deg, #f1d46b, #d4af37); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(212, 175, 55, 0.35); }
    .signup-text { margin-top: 30px; font-size: 13.5px; color: #888; text-align: center; }
    .signup-text a { color: #d4af37; text-decoration: none; font-weight: 600; }
    .signup-text a:hover { text-decoration: underline; }
    @media (max-width: 868px) { .image-section { display: none; } .login-section { max-width: 100%; padding: 40px 25px; } }
  </style>
</head>

<body>
<div class="container">
  <div class="image-section"></div>

  <div class="login-section">
    <div class="logo" onclick="window.location.href='home.php'">✦ MYTHOLOGY SCIENCE</div>

    <h1>Reset Password</h1>
    <p class="subtitle">Enter your registered email and choose a new password</p>

    <?php if (!empty($error)): ?>
      <div class="alert-box alert-danger"><span>⚠️</span> <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="forgot-password.php">
      <div class="input-wrapper">
        <label>Registered Email Address</label>
        <input type="email" name="email" placeholder="name@example.com" required autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </div>

      <div class="input-wrapper">
        <label>New Password</label>
        <input type="password" name="new_password" placeholder="••••••••" minlength="4" required autocomplete="new-password">
      </div>

      <div class="input-wrapper">
        <label>Confirm New Password</label>
        <input type="password" name="confirm_password" placeholder="••••••••" minlength="4" required autocomplete="new-password">
      </div>

      <button type="submit" class="signin-btn">RESET PASSWORD →</button>
    </form>

    <p class="signup-text">
      Remembered your password?
      <a href="login.php">Back to Sign In</a>
    </p>

    <p style="text-align:center; margin-top:20px;">
      <a href="home.php" style="color:#666; font-size:12.5px; text-decoration:none;">← Return to Home</a>
    </p>
  </div>
</div>

<script src="static/chatbot.js"></script>
</body>
</html>
