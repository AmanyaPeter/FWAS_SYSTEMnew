<?php
class User {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }
    public function findByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch();
    }
}
?>
