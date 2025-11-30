<?php $viewFile = __FILE__; ?>
<h1>Partners</h1>

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
        <?php foreach($rows as $row): ?>
        <tr>
            <td><?= htmlspecialchars($row['partner']['name']) ?></td>
            <td><?= $row['partner']['share_percent'] ?>%</td>
            <td><?= number_format($row['share'],2) ?></td>
            <td><?= number_format($row['withdrawn'],2) ?></td>
            <td><?= number_format($row['balance'],2) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="card">
    <h3>Add Withdrawal</h3>
    <form method="post" action="?controller=partner&action=withdraw">
        <label>Partner</label>
        <select name="partner_id">
            <?php foreach($rows as $row): ?>
            <option value="<?= $row['partner']['id'] ?>">
                <?= htmlspecialchars($row['partner']['name']) ?>
            </option>
            <?php endforeach; ?>
        </select>

        <label>Date</label>
        <input type="date" name="withdraw_date" value="<?= date('Y-m-d') ?>">

        <label>Amount</label>
        <input type="number" step="0.01" name="amount" required>

        <label>Note</label>
        <textarea name="note"></textarea>

        <button type="submit">Save</button>
    </form>
</div>
