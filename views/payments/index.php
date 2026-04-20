<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Payments</h2>
<a href="/payments/create">Record New Payment</a><br><br>
<table border="1">
    <tr><th>ID</th><th>Supplier</th><th>TIN</th><th>Invoice No</th><th>Amount</th><th>Status</th><th>Actions</th></tr>
    <?php foreach ($payments as $p): ?>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['supplier_name']); ?></td>
        <td><?php echo htmlspecialchars($p['tin']); ?></td>
        <td><?php echo htmlspecialchars($p['invoice_number']); ?></td>
        <td><?php echo $p['amount']; ?></td>
        <td><?php echo $p['status']; ?></td>
        <td>
            <?php if ($p['status'] !== 'Batched' && $p['status'] !== 'Processed'): ?>
            <a href="/payments/edit/<?php echo $p['id']; ?>">Update Status</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
