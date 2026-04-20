<?php
class Document {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function findByPayment($payment_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Document WHERE payment_id = ?");
        $stmt->execute([$payment_id]);
        return $stmt->fetchAll();
    }
    public function save($payment_id, $file_path) {
        $stmt = $this->pdo->prepare("INSERT INTO Document (payment_id, file_path) VALUES (?, ?)");
        return $stmt->execute([$payment_id, $file_path]);
    }
}
?>
