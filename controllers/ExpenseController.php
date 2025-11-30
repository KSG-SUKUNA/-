<?php
class ExpenseController extends Controller {

    public function index() {
        $this->requireLogin();

        $categoryModel = new Category();
        $expenseModel  = new Expense();

        $from = $_GET['from'] ?? date('Y-m-01');
        $to   = $_GET['to']   ?? date('Y-m-d');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $date   = $_POST['expense_date'];
            $cat_id = $_POST['category_id'];
            $amount = $_POST['amount'];
            $note   = $_POST['note'] ?? '';

            $expenseModel->create($date, $cat_id, $amount, $note);
            $this->redirect('?controller=expense&action=index&from='.$from.'&to='.$to);
        }

        $expenses = $expenseModel->allByDateRange($from, $to);
        $total    = $expenseModel->sumByDateRange($from, $to);
        $categories = $categoryModel->allActive();

        $this->view('expenses/index', compact('expenses','total','categories','from','to'));
    }
}
