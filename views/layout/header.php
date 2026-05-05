<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWAS — Finance Workflow Assistance System</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Mono:wght@400;500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div id="app">
    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">FW<span>AS</span></div>
        <div class="nav-section">Main</div>
        <a href="/dashboard" class="nav-item <?php echo (isset($controller) && $controller === 'dashboard') ? 'active' : ''; ?>">
            <span class="nav-icon">🏠</span> Dashboard
        </a>
        <a href="/suppliers" class="nav-item <?php echo (isset($controller) && $controller === 'suppliers') ? 'active' : ''; ?>">
            <span class="nav-icon">🏢</span> Suppliers
        </a>
        <a href="/payments" class="nav-item <?php echo (isset($controller) && $controller === 'payments') ? 'active' : ''; ?>">
            <span class="nav-icon">📄</span> Payments
        </a>
        <a href="/batches" class="nav-item <?php echo (isset($controller) && $controller === 'batches') ? 'active' : ''; ?>">
            <span class="nav-icon">📦</span> Batches
        </a>

        <div class="sidebar-spacer"></div>
        <div class="sidebar-user">
            <div class="user-avatar">
                <?php
                $nameParts = explode(' ', $_SESSION['username']);
                echo strtoupper(substr($nameParts[0], 0, 1) . (isset($nameParts[1]) ? substr($nameParts[1], 0, 1) : ''));
                ?>
            </div>
            <div class="user-info">
                <div class="user-name"><?php echo htmlspecialchars($_SESSION['username']); ?></div>
                <div class="user-role"><?php echo htmlspecialchars($_SESSION['role'] ?? 'User'); ?></div>
            </div>
            <a href="/logout" class="logout-btn" title="Logout">⏻</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
