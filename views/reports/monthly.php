<?php $viewFile = __FILE__; ?>
<h1>Monthly Report</h1>

<form method="get" class="inline-form">
    <input type="hidden" name="controller" value="report">
    <input type="hidden" name="action" value="monthly">
    Year:
    <input type="number" name="year" value="<?= $year ?>" style="width:90px;">
    Month:
    <input type="number" name="month" value="<?= $month ?>" min="1" max="12" style="width:60px;">
    <button type="submit">Show</button>
</form>

<div class="card">
    <h3>Summary</h3>
    <p>Total Sales: <?= number_format($salesTotal,2) ?> ৳</p>
    <p>Total Expenses: <?= number_format($expenseTotal,2) ?> ৳</p>
    <p><strong>Profit: <?= number_format($profit,2) ?> ৳</strong></p>
    <p>PDF লাগলে এই পেজ ব্রাউজারে খুলে Ctrl+P করে "Save as PDF" করতে পারো। পরে চাইলে Dompdf দিয়ে অটো-পিডিএফ কোডও যোগ করা যাবে।</p>
</div>

<div class="card">
    <h3>Expenses by Category</h3>
    <table class="table">
        <thead>
        <tr>
            <th>Category</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($byCategory as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= number_format($c['total'],2) ?> ৳</td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
