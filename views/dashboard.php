<?php require_once __DIR__ . '/layout/header.php'; ?>
<h2>Dashboard</h2>
<p>Welcome to FWAS, <?php echo htmlspecialchars($_SESSION['username']); ?>.</p>
<h3>Recent Payments</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Supplier</th>
        <th>Invoice</th>
        <th>Amount</th>
        <th>Status</th>
    </tr>
    <?php foreach ($payments as $p): ?>
    <tr>
        <td><?php echo $p['id']; ?></td>
        <td><?php echo htmlspecialchars($p['supplier_name']); ?></td>
        <td><?php echo htmlspecialchars($p['invoice_number']); ?></td>
        <td><?php echo $p['amount']; ?></td>
        <td><?php echo $p['status']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/layout/footer.php'; ?>
