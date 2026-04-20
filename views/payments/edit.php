<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Update Payment Status</h2>
<form method="POST" action="/payments/edit/<?php echo $payment['id']; ?>">
    <p>Payment ID: <?php echo $payment['id']; ?><br>
    Invoice: <?php echo htmlspecialchars($payment['invoice_number']); ?><br>
    Amount: <?php echo $payment['amount']; ?></p>
    
    <label>Status:</label><br>
    <select name="status" required>
        <option value="Draft" <?php echo $payment['status'] === 'Draft' ? 'selected' : ''; ?>>Draft</option>
        <option value="Ready" <?php echo $payment['status'] === 'Ready' ? 'selected' : ''; ?>>Ready</option>
    </select><br><br>
    <button type="submit">Update Status</button>
</form>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
