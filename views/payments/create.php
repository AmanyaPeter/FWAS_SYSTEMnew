<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/payments" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Payments</a>
        <div class="page-title">Record Payment</div>
    </div>
</div>

<div class="card" style="max-width: 600px;">
    <form method="POST" action="/payments/create">
        <div class="form-grid one">
            <div class="field">
                <label>Supplier</label>
                <select name="supplier_id" required>
                    <?php foreach ($suppliers as $s): ?>
                    <option value="<?php echo $s['id']; ?>"><?php echo htmlspecialchars($s['name']); ?> (TIN: <?php echo htmlspecialchars($s['tin']); ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="field">
                <label>Invoice Number</label>
                <input type="text" name="invoice_number" placeholder="e.g. INV-001" required>
            </div>
            <div class="field">
                <label>Amount (UGX)</label>
                <input type="number" name="amount" step="0.01" min="0.01" placeholder="0.00" required>
            </div>
        </div>
        <div style="margin-top: 24px; display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Record Payment</button>
            <a href="/payments" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
