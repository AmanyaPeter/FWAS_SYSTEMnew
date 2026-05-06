<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/payments" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Payments</a>
        <div class="page-title">Update Payment Status</div>
    </div>
</div>

<div class="card" style="max-width: 600px;">
    <div style="margin-bottom: 24px;">
        <div class="batch-hero-id">Payment ID: <?php echo $payment['id']; ?></div>
        <div style="font-size: 18px; font-weight: 600; margin-bottom: 4px;">Invoice: <?php echo htmlspecialchars($payment['invoice_number']); ?></div>
        <div class="ugx" style="font-size: 20px; font-weight: 700;">Amount: <?php echo number_format($payment['amount']); ?> UGX</div>
    </div>

    <form method="POST" action="/payments/edit/<?php echo $payment['id']; ?>">
        <div class="form-grid one">
            <div class="field">
                <label>Status</label>
                <select name="status" required>
                    <option value="Draft" <?php echo $payment['status'] === 'Draft' ? 'selected' : ''; ?>>Draft</option>
                    <option value="Ready" <?php echo $payment['status'] === 'Ready' ? 'selected' : ''; ?>>Ready</option>
                </select>
            </div>
        </div>
        <div style="margin-top: 24px; display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Update Status</button>
            <a href="/payments" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
