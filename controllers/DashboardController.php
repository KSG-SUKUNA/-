<?php
class DashboardController extends Controller {

    public function index() {
        $this->requireLogin();

        $today = date('Y-m-d');
        $weekStart = date('Y-m-d', strtotime('monday this week'));
        $monthStart = date('Y-m-01');

        $saleModel = new Sale();
        $expModel  = new Expense();
        $partnerModel = new Partner();
        $reportModel  = new Report();

        // today
        $todaySales   = $saleModel->sumByDateRange($today, $today);
        $todayExpense = $expModel->sumByDateRange($today, $today);
        $todayProfit  = $todaySales - $todayExpense;

        // month
        $monthSales   = $saleModel->sumByDateRange($monthStart, $today);
        $monthExpense = $expModel->sumByDateRange($monthStart, $today);
        $monthProfit  = $monthSales - $monthExpense;

        $totalProfit  = $reportModel->totalProfitUntilToday();
        $partners     = $partnerModel->all();

        // partner balances
        $partnerBalances = [];
        foreach ($partners as $p) {
            $shareAmount = $totalProfit * ($p['share_percent'] / 100.0);
            $withdrawn   = $partnerModel->withdrawalsSum($p['id']);
            $balance     = $shareAmount - $withdrawn;
            $partnerBalances[] = [
                'partner'  => $p,
                'share_amount' => $shareAmount,
                'withdrawn' => $withdrawn,
                'balance' => $balance
            ];
        }

        $this->view('dashboard/index', compact(
            'todaySales','todayExpense','todayProfit',
            'monthSales','monthExpense','monthProfit',
            'partnerBalances'
        ));
    }
}
