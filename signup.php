<?php
require_once __DIR__ . '/config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($name) || empty($email) || empty($password)) {
        $error = 'All fields are required. Please fill in your name, email, and password.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    } else {
        try {
            $pdo = Database::getInstance();

            // Check if email already exists (case-insensitive)
            $stmt = $pdo->prepare("SELECT id FROM users WHERE LOWER(email) = LOWER(:email) LIMIT 1");
            $stmt->execute([':email' => $email]);
            if ($stmt->fetch()) {
                $error = 'An account with this email already exists. Please log in instead.';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $insertStmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
                $insertStmt->execute([
                    ':name' => $name,
                    ':email' => $email,
                    ':password' => $hashedPassword
                ]);

                header("Location: login.php?success=registered");
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
  <title>Mythology | Sign Up</title>

  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="static/style.css">
  <link rel="stylesheet" href="static/chatbot.css">

  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Inter', sans-serif; background: #000; color: #fff; }
    .container { display: flex; min-height: 100vh; }
    .image-section { flex: 1.2; background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('static/god.jpg') center/cover no-repeat; }
    .form-section { flex: 1; padding: 60px 80px; background: #0b0b0b; display: flex; flex-direction: column; justify-content: center; max-width: 580px; }
    .logo { color: #d4af37; margin-bottom: 25px; letter-spacing: 2px; font-family: 'Cinzel', serif; font-weight: 700; font-size: 18px; cursor: pointer; }
    h1 { font-family: 'Cinzel', serif; font-size: 38px; margin-bottom: 8px; color: #fff; }
    .subtitle { color: #aaa; margin-bottom: 30px; font-size: 14px; }
    .alert-box { padding: 12px 16px; border-radius: 8px; margin-bottom: 25px; font-size: 13.5px; display: flex; align-items: center; gap: 10px; }
    .alert-danger { background: rgba(255, 71, 87, 0.15); border: 1px solid rgba(255, 71, 87, 0.4); color: #ff4757; }
    form { width: 100%; }
    label { font-size: 12px; color: #ccc; margin-bottom: 6px; display: block; font-weight: 500; letter-spacing: 0.5px; }
    .input-wrapper { position: relative; margin-bottom: 18px; }
    input { width: 100%; padding: 14px 16px; background: #141414; border: 1px solid #2e2e2e; color: #fff; border-radius: 8px; font-size: 14px; outline: none; transition: all 0.25s; }
    input:focus { border-color: #d4af37; box-shadow: 0 0 12px rgba(212, 175, 55, 0.25); }
    .primary-btn { width: 100%; padding: 14px; background: linear-gradient(135deg, #d4af37, #b8860b); border: none; border-radius: 8px; font-weight: 700; font-size: 14px; color: #000; cursor: pointer; margin-top: 10px; letter-spacing: 1px; transition: all 0.25s; }
    .primary-btn:hover { background: linear-gradient(135deg, #f1d46b, #d4af37); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(212, 175, 55, 0.35); }
    .switch { margin-top: 30px; font-size: 13.5px; color: #888; text-align: center; }
    .switch a { color: #d4af37; text-decoration: none; font-weight: 600; }
    @media (max-width: 868px) { .image-section { display: none; } .form-section { max-width: 100%; padding: 40px 25px; } }
  </style>
</head>

<body>
<div class="container">
  <div class="image-section"></div>

  <div class="form-section">
    <div class="logo" onclick="window.location.href='home.php'">✦ MYTHOLOGY SCIENCE</div>

    <h1>Begin Your Journey</h1>
    <p class="subtitle">Create an explorer account to track stories & quiz marks</p>

    <?php if (!empty($error)): ?>
      <div class="alert-box alert-danger">
        <span>⚠️</span> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form action="signup.php" method="POST">
      <div class="input-wrapper">
        <label>Full Name</label>
        <input type="text" name="name" placeholder="Arjun Sharma" required autocomplete="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
      </div>

      <div class="input-wrapper">
        <label>Email Address</label>
        <input type="email" name="email" placeholder="arjun@example.com" required autocomplete="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
      </div>

      <div class="input-wrapper">
        <label>Password</label>
        <input type="password" name="password" placeholder="••••••••" minlength="4" required autocomplete="new-password">
      </div>

      <button type="submit" class="primary-btn" a href="stories.php">CREATE ACCOUNT →</button>
    </form>

    <p class="switch">
      Already have an account?
      <a href="login.php">Sign in</a>
    </p>

    <p style="text-align:center; margin-top:20px;">
      <a href="home.php" style="color:#666; font-size:12.5px; text-decoration:none;">← Return to Home</a>
    </p>
  </div>
</div>

<script src="static/chatbot.js"></script>
</body>
</html>
