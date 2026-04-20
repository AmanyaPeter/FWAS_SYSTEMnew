<?php
require_once __DIR__ . '/../models/Payment.php';

class DashboardController {
    private $paymentModel;
    public function __construct($pdo) {
        $this->paymentModel = new Payment($pdo);
    }
    public function index() {
        $payments = $this->paymentModel->all();
        require_once __DIR__ . '/../views/dashboard.php';
    }
}
?>
