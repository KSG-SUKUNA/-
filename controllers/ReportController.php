<?php
class ReportController extends Controller {

    public function monthly() {
        $this->requireLogin();

        $year  = $_GET['year']  ?? date('Y');
        $month = $_GET['month'] ?? date('m');

        $saleModel = new Sale();
        $expModel  = new Expense();

        $from = "$year-$month-01";
        $to   = date('Y-m-t', strtotime($from));

        $salesTotal   = $saleModel->sumByDateRange($from, $to);
        $expenseTotal = $expModel->sumByDateRange($from, $to);
        $profit       = $salesTotal - $expenseTotal;

        $byCategory   = $expModel->sumByCategoryForMonth($year, $month);

        $this->view('reports/monthly', compact(
            'year','month','salesTotal','expenseTotal','profit','byCategory'
        ));
    }
}
