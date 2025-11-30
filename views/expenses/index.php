<?php $viewFile = __FILE__; ?>
<h1>Expenses</h1>

<form method="get" class="inline-form">
    <input type="hidden" name="controller" value="expense">
    <input type="hidden" name="action" value="index">
    From: <input type="date" name="from" value="<?= $from ?>">
    To: <input type="date" name="to" value="<?= $to ?>">
    <button type="submit">Filter</button>
</form>

<div class="grid">
    <div class="card">
        <h3>New Expense</h3>
        <form method="post">
            <label>Date</label>
            <input type="date" name="expense_date" value="<?= date('Y-m-d') ?>" required>

            <label>Category</label>
            <select name="category_id" required>
                <?php foreach($categories as $c): ?>
                    <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                <?php endforeach; ?>
            </select>

            <label>Amount</label>
            <input type="number" step="0.01" name="amount" required>

            <label>Note</label>
            <textarea name="note"></textarea>

            <button type="submit">Save</button>
        </form>
    </div>

    <div class="card">
        <h3>Expense List (Total: <?= number_format($total,2) ?> ৳)</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Amount</th>
                    <th>Note</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($expenses as $e): ?>
                <tr>
                    <td><?= htmlspecialchars($e['expense_date']) ?></td>
                    <td><?= htmlspecialchars($e['category_name']) ?></td>
                    <td><?= number_format($e['amount'],2) ?></td>
                    <td><?= htmlspecialchars($e['note']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
