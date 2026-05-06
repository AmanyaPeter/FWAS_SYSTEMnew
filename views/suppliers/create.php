<?php require_once __DIR__ . '/../layout/header.php'; ?>

<div class="topbar">
    <div>
        <a href="/suppliers" class="btn btn-ghost btn-sm" style="margin-bottom:10px;">← Back to Suppliers</a>
        <div class="page-title">Add Supplier</div>
    </div>
</div>

<div class="card" style="max-width: 600px;">
    <form method="POST" action="/suppliers/create">
        <div class="form-grid one">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="e.g. Mbarara Tech Supplies" required>
            </div>
            <div class="field">
                <label>TIN (10 digits)</label>
                <input type="text" name="tin" pattern="\d{10}" placeholder="1234567890" required>
            </div>
            <div class="field">
                <label>Bank Details</label>
                <textarea name="bank_details" placeholder="Bank Name, Account Number, Branch" required></textarea>
            </div>
        </div>
        <div style="margin-top: 24px; display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Save Supplier</button>
            <a href="/suppliers" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<?php require_once __DIR__ . '/../layout/footer.php'; ?>
