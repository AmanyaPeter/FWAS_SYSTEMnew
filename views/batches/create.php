<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/batches" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Batches</a>
        <div class="page-title">Create Batch</div>
    </div>
</div>

<div class="card">
    <form method="POST" action="/batches/create">
        <div class="form-grid one" style="max-width: 600px; margin-bottom: 32px;">
            <div class="field">
                <label>Batch Number</label>
                <input type="text" name="batch_number" placeholder="e.g. BATCH-2025-03-A" required>
            </div>
        </div>

        <div class="section-head">
            <h3>Select Payments to Batch</h3>
        </div>

        <?php if (empty($payments)): ?>
            <div class="empty-state">
                <div class="ei">📄</div>
                No draft/ready payments available to batch.
            </div>
        <?php else: ?>
            <div class="table-wrap" style="margin-bottom: 24px;">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">Select</th>
                            <th>ID</th>
                            <th>Supplier</th>
                            <th>Amount (UGX)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $p): ?>
                        <tr>
                            <td><input type="checkbox" name="payment_ids[]" value="<?php echo $p['id']; ?>"></td>
                            <td class="mono"><?php echo $p['id']; ?></td>
                            <td><b><?php echo htmlspecialchars($p['supplier_name']); ?></b></td>
                            <td class="ugx"><?php echo number_format($p['amount']); ?></td>
                            <td>
                                <span class="badge badge-amber"><?php echo $p['status']; ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div style="display: flex; gap: 10px;">
                <button type="submit" class="btn btn-primary">Create Batch</button>
                <a href="/batches" class="btn btn-ghost">Cancel</a>
            </div>
        <?php endif; ?>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
