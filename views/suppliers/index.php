<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Suppliers</h2>
<a href="/suppliers/create">Add New Supplier</a><br><br>
<table border="1">
    <tr><th>ID</th><th>Name</th><th>TIN</th><th>Bank Details</th><th>Actions</th></tr>
    <?php foreach ($suppliers as $s): ?>
    <tr>
        <td><?php echo $s['id']; ?></td>
        <td><?php echo htmlspecialchars($s['name']); ?></td>
        <td><?php echo htmlspecialchars($s['tin']); ?></td>
        <td><?php echo htmlspecialchars($s['bank_details']); ?></td>
        <td><a href="/suppliers/edit/<?php echo $s['id']; ?>">Edit</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
