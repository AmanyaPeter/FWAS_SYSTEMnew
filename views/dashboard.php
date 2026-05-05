<?php require_once __DIR__ . '/layout/header.php'; ?>

<div class="topbar">
    <div>
        <div class="page-title">Dashboard</div>
        <div class="page-sub">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?></div>
    </div>
    <div style="display:flex;gap:10px;">
        <a href="/payments/create" class="btn btn-ghost">+ New Payment</a>
        <a href="/batches/create" class="btn btn-primary">+ New Batch</a>
    </div>
</div>

<div class="stat-grid">
    <div class="stat-card blue">
        <div class="stat-icon">📄</div>
        <div class="stat-val"><?php echo count($payments); ?></div>
        <div class="stat-label">Total Payments</div>
    </div>
    <!-- Additional stats could be added here if provided by controller -->
</div>

<div class="card">
    <div class="section-head">
        <h3>Recent Payments</h3>
        <a href="/payments" class="btn btn-ghost btn-sm">View all</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Supplier</th>
                    <th>Invoice</th>
                    <th>Amount (UGX)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $p): ?>
                <tr>
                    <td class="mono"><?php echo $p['id']; ?></td>
                    <td><b><?php echo htmlspecialchars($p['supplier_name']); ?></b></td>
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
                </tr>
                <?php endforeach; ?>
                <?php if (empty($payments)): ?>
                <tr>
                    <td colspan="5">
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

<?php require_once __DIR__ . '/layout/footer.php'; ?>
