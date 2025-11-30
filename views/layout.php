<?php
// $viewFile comes from Controller::view
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ফুচকা মুচকা - Management</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>
<div class="wrapper">
    <aside class="sidebar">
        <div class="logo">
            <img src="<?= BASE_URL ?>public/assets/logo.png" alt="logo">
            <h2>ফুচকা মুচকা</h2>
        </div>
        <?php if(isset($_SESSION['user_id'])): ?>
        <nav>
            <a href="<?= BASE_URL ?>">Dashboard</a>
            <a href="?controller=sales&action=index">Sales</a>
            <a href="?controller=expense&action=index">Expenses</a>
            <a href="?controller=partner&action=index">Partners</a>
            <a href="?controller=report&action=monthly">Monthly Report</a>
            <a href="?controller=auth&action=logout">Logout (<?= htmlspecialchars($_SESSION['username']) ?>)</a>
        </nav>
        <?php endif; ?>
    </aside>
    <main class="content">
        <?php include $viewFile; ?>
    </main>
</div>
</body>
</html>
