<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Create Batch</h2>
<form method="POST" action="/batches/create">
    <label>Batch Number:</label><br>
    <input type="text" name="batch_number" required><br><br>
    
    <h3>Select Payments to Batch:</h3>
    <?php if (empty($payments)): ?>
        <p>No draft/ready payments available to batch.</p>
    <?php else: ?>
        <table border="1">
            <tr><th>Select</th><th>ID</th><th>Supplier</th><th>Amount</th><th>Status</th></tr>
            <?php foreach ($payments as $p): ?>
            <tr>
                <td><input type="checkbox" name="payment_ids[]" value="<?php echo $p['id']; ?>"></td>
                <td><?php echo $p['id']; ?></td>
                <td><?php echo htmlspecialchars($p['supplier_name']); ?></td>
                <td><?php echo $p['amount']; ?></td>
                <td><?php echo $p['status']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table><br>
        <button type="submit">Create Batch</button>
    <?php endif; ?>
</form>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
