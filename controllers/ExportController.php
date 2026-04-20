<?php
class ExportController {
    private $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function exportBatch($batch_id) {
        $stmt = $this->pdo->prepare("SELECT p.invoice_number, p.amount, s.name, s.tin, s.bank_details FROM Payment p JOIN Supplier s ON p.supplier_id = s.id WHERE p.batch_id = ?");
        $stmt->execute([$batch_id]);
        $payments = $stmt->fetchAll();
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="batch_export_' . $batch_id . '.csv"');
        
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Invoice Number', 'Amount', 'Supplier Name', 'TIN', 'Bank Details']);
        
        foreach ($payments as $payment) {
            fputcsv($output, $payment);
        }
        fclose($output);
        exit;
    }
}
?>
