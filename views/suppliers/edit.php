<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Edit Supplier</h2>
<form method="POST" action="/suppliers/edit/<?php echo $supplier['id']; ?>">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?php echo htmlspecialchars($supplier['name']); ?>" required><br>
    <label>TIN (10 digits):</label><br>
    <input type="text" name="tin" value="<?php echo htmlspecialchars($supplier['tin']); ?>" pattern="\d{10}" required><br>
    <label>Bank Details:</label><br>
    <textarea name="bank_details" required><?php echo htmlspecialchars($supplier['bank_details']); ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
