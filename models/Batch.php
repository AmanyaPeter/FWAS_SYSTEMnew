<?php
class Batch {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function all() {
        return $this->pdo->query("SELECT * FROM Batch ORDER BY created_at DESC")->fetchAll();
    }
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Batch WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO Batch (batch_number, status) VALUES (?, 'Open')");
        $stmt->execute([$data['batch_number']]);
        return $this->pdo->lastInsertId();
    }
    public function updateStatus($id, $status) {
        $stmt = $this->pdo->prepare("UPDATE Batch SET status = ? WHERE id = ?");
        $stmt->execute([$status, $id]);
        $this->logEvent($id, "Batch finalized");
    }
    public function logEvent($batch_id, $event) {
        $stmt = $this->pdo->prepare("INSERT INTO BatchAuditLog (batch_id, event) VALUES (?, ?)");
        $stmt->execute([$batch_id, $event]);
    }
    public function getLogs($batch_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM BatchAuditLog WHERE batch_id = ? ORDER BY created_at DESC");
        $stmt->execute([$batch_id]);
        return $stmt->fetchAll();
    }
}
?>
