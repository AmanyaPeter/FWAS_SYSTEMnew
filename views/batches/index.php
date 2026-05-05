<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <div class="page-title">Batches</div>
        <div class="page-sub">Organize payments for IFMS submission</div>
    </div>
    <a href="/batches/create" class="btn btn-primary">+ New Batch</a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Batch Number</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($batches as $b): ?>
                <tr>
                    <td class="mono"><?php echo $b['id']; ?></td>
                    <td><b><?php echo htmlspecialchars($b['batch_number']); ?></b></td>
                    <td>
                        <?php
                        $badgeClass = ($b['status'] === 'Finalized') ? 'badge-green' : 'badge-blue';
                        ?>
                        <span class="badge <?php echo $badgeClass; ?>"><?php echo $b['status']; ?></span>
                    </td>
                    <td class="mono"><?php echo $b['created_at']; ?></td>
                    <td>
                        <div class="action-row">
                            <a href="/batches/show/<?php echo $b['id']; ?>" class="icon-btn view" title="View">👁️</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($batches)): ?>
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <div class="ei">📦</div>
                            No batches found
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
