<?php
class Sale extends Model {

    public function create($date, $total, $cash, $bkash, $due, $note) {
        $stmt = $this->db->prepare("
            INSERT INTO sales (sale_date, total_amount, cash_amount, bkash_amount, due_amount, note)
            VALUES (?,?,?,?,?,?)
        ");
        return $stmt->execute([$date, $total, $cash, $bkash, $due, $note]);
    }

    public function allByDateRange($from, $to) {
        $stmt = $this->db->prepare("SELECT * FROM sales WHERE sale_date BETWEEN ? AND ? ORDER BY sale_date DESC, id DESC");
        $stmt->execute([$from, $to]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sumByDateRange($from, $to) {
        $stmt = $this->db->prepare("SELECT SUM(total_amount) AS total FROM sales WHERE sale_date BETWEEN ? AND ?");
        $stmt->execute([$from, $to]);
        return (float)$stmt->fetchColumn();
    }
}
