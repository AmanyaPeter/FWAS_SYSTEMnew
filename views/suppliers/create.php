<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Add Supplier</h2>
<form method="POST" action="/suppliers/create">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>
    <label>TIN (10 digits):</label><br>
    <input type="text" name="tin" pattern="\d{10}" required><br>
    <label>Bank Details:</label><br>
    <textarea name="bank_details" required></textarea><br><br>
    <button type="submit">Save</button>
</form>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
