<?php $viewFile = __FILE__; ?>
<h1>Dashboard</h1>

<div class="grid">
    <div class="card stat">
        <h3>আজকের সেল</h3>
        <p><?= number_format($todaySales, 2) ?> ৳</p>
    </div>
    <div class="card stat">
        <h3>আজকের খরচ</h3>
        <p><?= number_format($todayExpense, 2) ?> ৳</p>
    </div>
    <div class="card stat">
        <h3>আজকের লাভ</h3>
        <p><?= number_format($todayProfit, 2) ?> ৳</p>
    </div>
    <div class="card stat">
        <h3>এ মাসের লাভ</h3>
        <p><?= number_format($monthProfit, 2) ?> ৳</p>
    </div>
</div>

<h2>Partners Summary</h2>
<table class="table">
    <thead>
        <tr>
            <th>Partner</th>
            <th>Share %</th>
            <th>Total Share</th>
            <th>Withdrawn</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($partnerBalances as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['partner']['name']) ?></td>
            <td><?= $row['partner']['share_percent'] ?>%</td>
            
            <!-- FIXED: changed from $row['share'] to $row['share_amount'] -->
            <td><?= number_format($row['share_amount'], 2) ?></td>

            <td><?= number_format($row['withdrawn'], 2) ?></td>
            <td><?= number_format($row['balance'], 2) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
