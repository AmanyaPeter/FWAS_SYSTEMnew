<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWAS - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Mono:wght@400;500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div id="auth-screen">
    <div class="auth-card">
        <div class="auth-logo">FWAS</div>
        <div class="auth-tagline">Finance Workflow Assistance System</div>

        <?php if (isset($error)): ?>
            <div class="auth-err" style="display: block;"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" action="/login">
            <label class="auth-label">Username</label>
            <input class="auth-input" type="text" name="username" placeholder="Enter username" required>

            <label class="auth-label">Password</label>
            <input class="auth-input" type="password" name="password" placeholder="Password" required>

            <button type="submit" class="auth-btn">Sign In</button>
        </form>
    </div>
</div>
</body>
</html>
