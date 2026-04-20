<?php
require_once __DIR__ . '/../models/Supplier.php';

class SupplierController {
    private $supplierModel;
    public function __construct($pdo) {
        $this->supplierModel = new Supplier($pdo);
    }
    public function index() {
        $suppliers = $this->supplierModel->all();
        require_once __DIR__ . '/../views/suppliers/index.php';
    }
    public function create() {
        require_once __DIR__ . '/../views/suppliers/create.php';
    }
    public function store($data) {
        if (strlen($data['tin']) !== 10) {
            die("TIN must be exactly 10 digits");
        }
        $this->supplierModel->create($data);
        header('Location: /suppliers');
    }
    public function edit($id) {
        $supplier = $this->supplierModel->find($id);
        require_once __DIR__ . '/../views/suppliers/edit.php';
    }
    public function update($id, $data) {
        if (strlen($data['tin']) !== 10) {
            die("TIN must be exactly 10 digits");
        }
        $this->supplierModel->update($id, $data);
        header('Location: /suppliers');
    }
}
?>
