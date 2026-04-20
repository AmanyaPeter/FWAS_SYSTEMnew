<?php
class Supplier {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function all() {
        return $this->pdo->query("SELECT * FROM Supplier ORDER BY name")->fetchAll();
    }
    public function find($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Supplier WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO Supplier (name, tin, bank_details) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['tin'], $data['bank_details']]);
    }
    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE Supplier SET name = ?, tin = ?, bank_details = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['tin'], $data['bank_details'], $id]);
    }
}
?>
