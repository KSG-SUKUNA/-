<?php
class Category extends Model {

    public function allActive() {
        return $this->db->query("SELECT * FROM expense_categories WHERE is_active = 1 ORDER BY name")
                        ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function all() {
        return $this->db->query("SELECT * FROM expense_categories ORDER BY is_active DESC, name")
                        ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name) {
        $stmt = $this->db->prepare("INSERT INTO expense_categories (name) VALUES (?)");
        return $stmt->execute([$name]);
    }

    public function toggle($id) {
        $stmt = $this->db->prepare("UPDATE expense_categories SET is_active = 1 - is_active WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
