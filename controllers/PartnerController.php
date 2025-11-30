<?php
class PartnerController extends Controller {

    public function index() {
        $this->requireLogin();
        $partnerModel = new Partner();
        $reportModel  = new Report();

        $partners = $partnerModel->all();
        $totalProfit = $reportModel->totalProfitUntilToday();

        $rows = [];
        foreach ($partners as $p) {
            $share = $totalProfit * ($p['share_percent'] / 100.0);
            $withdrawn = $partnerModel->withdrawalsSum($p['id']);
            $balance = $share - $withdrawn;
            $rows[] = [
                'partner' => $p,
                'share'   => $share,
                'withdrawn' => $withdrawn,
                'balance' => $balance
            ];
        }

        $this->view('partners/index', ['rows' => $rows]);
    }

    public function withdraw() {
        $this->requireLogin();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner_id = $_POST['partner_id'];
            $date       = $_POST['withdraw_date'];
            $amount     = $_POST['amount'];
            $note       = $_POST['note'] ?? '';

            $partnerModel = new Partner();
            $partnerModel->addWithdrawal($partner_id, $date, $amount, $note);

            $this->redirect('?controller=partner&action=index');
        }
    }
}
