<?php require_once __DIR__ . '/../layout/header.php'; ?>
<h2>Batches</h2>
<a href="/batches/create">Create New Batch</a><br><br>
<table border="1">
    <tr><th>ID</th><th>Batch Number</th><th>Status</th><th>Created At</th><th>Actions</th></tr>
    <?php foreach ($batches as $b): ?>
    <tr>
        <td><?php echo $b['id']; ?></td>
        <td><?php echo htmlspecialchars($b['batch_number']); ?></td>
        <td><?php echo $b['status']; ?></td>
        <td><?php echo $b['created_at']; ?></td>
        <td><a href="/batches/show/<?php echo $b['id']; ?>">View Detail</a></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php require_once __DIR__ . '/../layout/footer.php'; ?>
