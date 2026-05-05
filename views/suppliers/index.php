<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <div class="page-title">Suppliers</div>
        <div class="page-sub">Manage supplier records and TIN details</div>
    </div>
    <a href="/suppliers/create" class="btn btn-primary">+ Add Supplier</a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>TIN</th>
                    <th>Bank Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $s): ?>
                <tr>
                    <td class="mono"><?php echo $s['id']; ?></td>
                    <td><b><?php echo htmlspecialchars($s['name']); ?></b></td>
                    <td class="mono"><?php echo htmlspecialchars($s['tin']); ?></td>
                    <td><?php echo htmlspecialchars($s['bank_details']); ?></td>
                    <td>
                        <div class="action-row">
                            <a href="/suppliers/edit/<?php echo $s['id']; ?>" class="icon-btn edit" title="Edit">✏️</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if (empty($suppliers)): ?>
                <tr>
                    <td colspan="5">
                        <div class="empty-state">
                            <div class="ei">🏢</div>
                            No suppliers found
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
