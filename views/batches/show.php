<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/batches" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Batches</a>
        <div class="page-title">Batch Detail</div>
    </div>
    <div style="display:flex;gap:10px;">
        <?php if ($batch['status'] === 'Open'): ?>
            <a href="/batches/finalize/<?php echo $batch['id']; ?>" class="btn btn-green">✓ Finalize Batch</a>
        <?php else: ?>
            <a href="/export/<?php echo $batch['id']; ?>" class="btn btn-primary">📊 Export to CSV</a>
        <?php endif; ?>
    </div>
</div>

<div class="batch-hero">
    <div class="batch-hero-id">Batch ID: <?php echo $batch['id']; ?> · <?php echo $batch['status']; ?></div>
    <div class="batch-hero-desc"><?php echo htmlspecialchars($batch['batch_number']); ?></div>
    <div class="batch-hero-stats">
        <div>
            <div class="bhs-val"><?php echo count($payments); ?></div>
            <div class="bhs-label">Payments</div>
        </div>
        <div>
            <div class="bhs-val">UGX <?php
                $total = array_reduce($payments, function($carry, $item) {
                    return $carry + $item['amount'];
                }, 0);
                echo number_format($total);
            ?></div>
            <div class="bhs-label">Total Amount</div>
        </div>
        <div>
            <div class="bhs-val"><?php echo $batch['created_at']; ?></div>
            <div class="bhs-label">Created At</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="section-head">
        <h3>Payments in this Batch</h3>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>TIN</th>
                    <th>Invoice No</th>
                    <th>Amount (UGX)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $p): ?>
                <tr>
                    <td class="mono"><?php echo $p['id']; ?></td>
                    <td><b><?php echo htmlspecialchars($p['supplier_name']); ?></b></td>
                    <td class="mono"><?php echo htmlspecialchars($p['tin']); ?></td>
                    <td class="mono"><?php echo htmlspecialchars($p['invoice_number']); ?></td>
                    <td class="ugx"><?php echo number_format($p['amount']); ?></td>
                    <td>
                        <span class="badge badge-blue"><?php echo $p['status']; ?></span>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($payments)): ?>
                <tr>
                    <td colspan="6">
                        <div class="empty-state">
                            <div class="ei">📄</div>
                            No payments in this batch
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
