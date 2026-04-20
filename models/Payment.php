<?php
class Payment {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function all() {
        return $this->pdo->query("SELECT p.*, s.name as supplier_name, s.tin FROM Payment p JOIN Supplier s ON p.supplier_id = s.id")->fetchAll();
    }
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Payment WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO Payment (supplier_id, invoice_number, amount, status) VALUES (?, ?, ?, 'Draft')");
        return $stmt->execute([$data['supplier_id'], $data['invoice_number'], $data['amount']]);
    }
    public function updateStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE Payment SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }
    public function getByBatch($batch_id) {
        $stmt = $this->pdo->prepare("SELECT p.*, s.name as supplier_name, s.tin FROM Payment p JOIN Supplier s ON p.supplier_id = s.id WHERE p.batch_id = ?");
        $stmt->execute([$batch_id]);
        return $stmt->fetchAll();
    }
    public function getUnbatched() {
        return $this->pdo->query("SELECT p.*, s.name as supplier_name FROM Payment p JOIN Supplier s ON p.supplier_id = s.id WHERE p.batch_id IS NULL AND p.status IN ('Draft', 'Ready')")->fetchAll();
    }
    public function addToBatch($payment_id, $batch_id) {
        $stmt = $this->pdo->prepare("UPDATE Payment SET batch_id = ?, status = 'Batched' WHERE id = ?");
        return $stmt->execute([$batch_id, $payment_id]);
    }
}
?>
