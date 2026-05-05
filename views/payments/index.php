<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <div class="page-title">Payments</div>
        <div class="page-sub">Record and manage payment entries</div>
    </div>
    <a href="/payments/create" class="btn btn-primary">+ Record Payment</a>
</div>

<div class="card">
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
                    <th>Actions</th>
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
                        <?php
                        $badgeClass = 'badge-grey';
                        if ($p['status'] === 'Ready') $badgeClass = 'badge-amber';
                        if ($p['status'] === 'Batched') $badgeClass = 'badge-blue';
                        if ($p['status'] === 'Processed') $badgeClass = 'badge-green';
                        ?>
                        <span class="badge <?php echo $badgeClass; ?>"><?php echo $p['status']; ?></span>
                    </td>
                    <td>
                        <?php if ($p['status'] !== 'Batched' && $p['status'] !== 'Processed'): ?>
                        <div class="action-row">
                            <a href="/payments/edit/<?php echo $p['id']; ?>" class="icon-btn edit" title="Edit">✏️</a>
                        </div>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($payments)): ?>
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <div class="ei">📄</div>
                            No payments found
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
