<?php
class Partner extends Model {

    public function all() {
        return $this->db->query("SELECT * FROM partners ORDER BY id")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $phone, $share, $capital) {
        $stmt = $this->db->prepare("
            INSERT INTO partners (name, phone, share_percent, starting_capital)
            VALUES (?,?,?,?)
        ");
        return $stmt->execute([$name, $phone, $share, $capital]);
    }

    public function addWithdrawal($partner_id, $date, $amount, $note) {
        $stmt = $this->db->prepare("
            INSERT INTO partner_withdrawals (partner_id, withdraw_date, amount, note)
            VALUES (?,?,?,?)
        ");
        return $stmt->execute([$partner_id, $date, $amount, $note]);
    }

    public function withdrawalsSum($partner_id) {
        $stmt = $this->db->prepare("SELECT SUM(amount) FROM partner_withdrawals WHERE partner_id = ?");
        $stmt->execute([$partner_id]);
        return (float)$stmt->fetchColumn();
    }
}
