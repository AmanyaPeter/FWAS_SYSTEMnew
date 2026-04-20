<?php
require_once __DIR__ . '/../models/Payment.php';
require_once __DIR__ . '/../models/Supplier.php';
require_once __DIR__ . '/../models/Document.php';

class PaymentController {
    private $paymentModel;
    private $supplierModel;
    private $documentModel;
    
    public function __construct($pdo) {
        $this->paymentModel = new Payment($pdo);
        $this->supplierModel = new Supplier($pdo);
        $this->documentModel = new Document($pdo);
    }
    public function index() {
        $payments = $this->paymentModel->all();
        require_once __DIR__ . '/../views/payments/index.php';
    }
    public function create() {
        $suppliers = $this->supplierModel->all();
        require_once __DIR__ . '/../views/payments/create.php';
    }
    public function store($data) {
        if ($data['amount'] <= 0) die("Amount must be greater than 0");
        $this->paymentModel->create($data);
        header('Location: /payments');
    }
    public function edit($id) {
        $payment = $this->paymentModel->find($id);
        require_once __DIR__ . '/../views/payments/edit.php';
    }
    public function update($id, $data) {
        // Here we just update status for simplicity, or we can use another method
        $this->paymentModel->updateStatus($id, $data['status']);
        header('Location: /payments');
    }
}
?>
