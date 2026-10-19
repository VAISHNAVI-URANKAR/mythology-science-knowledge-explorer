<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Logged Out | Mythology</title>
<meta http-equiv="refresh" content="3;url=login.php">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="static/style.css">

<style>
body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: #000;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center;
}

.box {
    background: #0b0b0b;
    padding: 50px 40px;
    border-radius: 12px;
    border: 1px solid #222;
    max-width: 450px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.6);
}

h1 {
    font-family: 'Cinzel', serif;
    color: #d4af37;
    font-size: 28px;
    margin-bottom: 12px;
}

p {
    color: #aaa;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 20px;
}
</style>

</head>
<body>

<div class="box">
    <h1>Thank You for Exploring</h1>
    <p>You have been logged out successfully.</p>
    <p style="color:#666; font-size:12.5px;">Redirecting to login page in 3 seconds...</p>
    <a href="login.php" class="nav-btn" style="display:inline-block; margin-top:10px;">Login Now</a>
</div>

</body>
</html>
