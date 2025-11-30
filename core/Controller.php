<?php
// core/Controller.php
abstract class Controller {

    protected function view($view, $data = []) {
        extract($data);
        $viewFile = __DIR__ . '/../views/' . $view . '.php';
        include __DIR__ . '/../views/layout.php';
    }

    protected function redirect($path) {
        header('Location: ' . BASE_URL . $path);
        exit;
    }

    protected function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    protected function requireLogin() {
        if (!$this->isLoggedIn()) {
            $this->redirect('?controller=auth&action=login');
        }
    }
}
