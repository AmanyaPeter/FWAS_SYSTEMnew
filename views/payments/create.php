<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Record Payment</h2>
<form method="POST" action="/payments/create">
    <label>Supplier:</label><br>
    <select name="supplier_id" required>
        <?php foreach ($suppliers as $s): ?>
        <option value="<?php echo $s['id']; ?>"><?php echo htmlspecialchars($s['name']); ?> (TIN: <?php echo htmlspecialchars($s['tin']); ?>)</option>
        <?php endforeach; ?>
    </select><br>
    <label>Invoice Number:</label><br>
    <input type="text" name="invoice_number" required><br>
    <label>Amount:</label><br>
    <input type="number" name="amount" step="0.01" min="0.01" required><br><br>
    <button type="submit">Record Payment</button>
</form>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
