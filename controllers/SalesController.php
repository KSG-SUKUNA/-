<?php
class SalesController extends Controller {

    public function index() {
        $this->requireLogin();

        $saleModel = new Sale();

        $from = $_GET['from'] ?? date('Y-m-01');
        $to   = $_GET['to']   ?? date('Y-m-d');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date   = $_POST['sale_date'];
            $total  = $_POST['total_amount'];
            $cash   = $_POST['cash_amount'] ?? 0;
            $bkash  = $_POST['bkash_amount'] ?? 0;
            $due    = $_POST['due_amount'] ?? 0;
            $note   = $_POST['note'] ?? '';

            $saleModel->create($date, $total, $cash, $bkash, $due, $note);
            $this->redirect('?controller=sales&action=index&from='.$from.'&to='.$to);
        }

        $sales = $saleModel->allByDateRange($from, $to);
        $total = $saleModel->sumByDateRange($from, $to);

        $this->view('sales/index', compact('sales','total','from','to'));
    }
}
