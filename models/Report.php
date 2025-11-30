<?php
class Report extends Model {

    public function totalProfitUntilToday() {
        // sales - expenses (all time)
        $sales = $this->db->query("SELECT SUM(total_amount) FROM sales")->fetchColumn();
        $exp   = $this->db->query("SELECT SUM(amount) FROM expenses")->fetchColumn();
        return (float)$sales - (float)$exp;
    }
}
