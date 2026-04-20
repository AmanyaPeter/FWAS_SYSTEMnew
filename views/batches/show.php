<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Batch Detail: <?php echo htmlspecialchars($batch['batch_number']); ?></h2>
<p>Status: <strong><?php echo $batch['status']; ?></strong></p>

<?php if ($batch['status'] === 'Open'): ?>
    <a href="/batches/finalize/<?php echo $batch['id']; ?>">Finalize Batch</a>
<?php else: ?>
    <a href="/export/<?php echo $batch['id']; ?>">Export to CSV</a>
<?php endif; ?>
<br><br>

<h3>Payments in this Batch</h3>
<table border="1">
    <tr><th>ID</th><th>Supplier</th><th>TIN</th><th>Invoice No</th><th>Amount</th><th>Status</th></tr>
    <?php foreach ($payments as $p): ?>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['supplier_name']); ?></td>
        <td><?php echo htmlspecialchars($p['tin']); ?></td>
        <td><?php echo htmlspecialchars($p['invoice_number']); ?></td>
        <td><?php echo $p['amount']; ?></td>
        <td><?php echo $p['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
