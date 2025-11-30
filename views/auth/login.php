<?php $viewFile = __FILE__; ?>
<div class="card">
    <h2>Login</h2>
    <?php if (!empty($error)): ?>
        <div class="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Log in</button>
    </form>
</div>
