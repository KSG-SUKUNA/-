<?php $viewFile = __FILE__; ?>
<h1>Sales</h1>

<form method="get" class="inline-form">
    <input type="hidden" name="controller" value="sales">
    <input type="hidden" name="action" value="index">
    From: <input type="date" name="from" value="<?= $from ?>">
    To: <input type="date" name="to" value="<?= $to ?>">
    <button type="submit">Filter</button>
</form>

<div class="grid">
    <div class="card">
        <h3>New Sale</h3>
        <form method="post">
            <label>Date</label>
            <input type="date" name="sale_date" value="<?= date('Y-m-d') ?>" required>

            <label>Total Amount</label>
            <input type="number" step="0.01" name="total_amount" required>

            <label>Cash</label>
            <input type="number" step="0.01" name="cash_amount">

            <label>bKash</label>
            <input type="number" step="0.01" name="bkash_amount">

            <label>Due</label>
            <input type="number" step="0.01" name="due_amount">

            <label>Note</label>
            <textarea name="note"></textarea>

            <button type="submit">Save</button>
        </form>
    </div>

    <div class="card">
        <h3>Sales List (Total: <?= number_format($total,2) ?> ৳)</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Cash</th>
                    <th>bKash</th>
                    <th>Due</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sales as $s): ?>
                <tr>
                    <td><?= htmlspecialchars($s['sale_date']) ?></td>
                    <td><?= number_format($s['total_amount'],2) ?></td>
                    <td><?= number_format($s['cash_amount'],2) ?></td>
                    <td><?= number_format($s['bkash_amount'],2) ?></td>
                    <td><?= number_format($s['due_amount'],2) ?></td>
                    <td><?= htmlspecialchars($s['note']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
