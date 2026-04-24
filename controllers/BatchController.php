<?php
require_once __DIR__ . '/../models/Batch.php';
require_once __DIR__ . '/../models/Payment.php';

class BatchController {
    private $batchModel;
    private $paymentModel;
    
    public function __construct($pdo) {
        $this->batchModel = new Batch($pdo);
        $this->paymentModel = new Payment($pdo);
    }
    public function index() {
        $batches = $this->batchModel->all();
        require_once __DIR__ . '/../views/batches/index.php';
    }
    public function create() {
        $payments = $this->paymentModel->getUnbatched();
        require_once __DIR__ . '/../views/batches/create.php';
    }
    public function store($data) {
        $batch_id = $this->batchModel->create(['batch_number' => $data['batch_number']]);
        if (!empty($data['payment_ids'])) {
            foreach ($data['payment_ids'] as $payment_id) {
                $this->paymentModel->addToBatch($payment_id, $batch_id);
            }
        }
        header('Location: /batches');
        exit;
    }
    public function show($id) {
        $batch = $this->batchModel->find($id);
        $payments = $this->paymentModel->getByBatch($id);
        require_once __DIR__ . '/../views/batches/show.php';
    }
    public function finalize($id) {
        $this->batchModel->updateStatus($id, 'Finalized');
        header('Location: /batches/show/' . $id);
    }
}
?>
