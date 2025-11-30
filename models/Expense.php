<?php
class Expense extends Model {

    public function create($date, $category_id, $amount, $note) {
        $stmt = $this->db->prepare("INSERT INTO expenses (expense_date, category_id, amount, note) VALUES (?,?,?,?)");
        return $stmt->execute([$date, $category_id, $amount, $note]);
    }

    public function allByDateRange($from, $to) {
        $stmt = $this->db->prepare("
            SELECT e.*, c.name AS category_name
            FROM expenses e
            JOIN expense_categories c ON c.id = e.category_id
            WHERE expense_date BETWEEN ? AND ?
            ORDER BY expense_date DESC, e.id DESC
        ");
        $stmt->execute([$from, $to]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sumByDateRange($from, $to) {
        $stmt = $this->db->prepare("SELECT SUM(amount) AS total FROM expenses WHERE expense_date BETWEEN ? AND ?");
        $stmt->execute([$from, $to]);
        return (float)$stmt->fetchColumn();
    }

    public function sumByCategoryForMonth($year, $month) {
        $stmt = $this->db->prepare("
            SELECT c.name, SUM(e.amount) AS total
            FROM expenses e
            JOIN expense_categories c ON c.id = e.category_id
            WHERE YEAR(expense_date) = ? AND MONTH(expense_date) = ?
            GROUP BY c.id
        ");
        $stmt->execute([$year, $month]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
