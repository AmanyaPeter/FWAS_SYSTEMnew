<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/suppliers" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Suppliers</a>
        <div class="page-title">Edit Supplier</div>
    </div>
</div>

<div class="card" style="max-width: 600px;">
    <form method="POST" action="/suppliers/edit/<?php echo $supplier['id']; ?>">
        <div class="form-grid one">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($supplier['name']); ?>" required>
            </div>
            <div class="field">
                <label>TIN (10 digits)</label>
                <input type="text" name="tin" value="<?php echo htmlspecialchars($supplier['tin']); ?>" pattern="\d{10}" required>
            </div>
            <div class="field">
                <label>Bank Details</label>
                <textarea name="bank_details" required><?php echo htmlspecialchars($supplier['bank_details']); ?></textarea>
            </div>
        </div>
        <div style="margin-top: 24px; display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Update Supplier</button>
            <a href="/suppliers" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
