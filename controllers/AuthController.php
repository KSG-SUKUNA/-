<?php
class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && hash('sha256', $password) === $user['password']) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $this->redirect('');
            } else {
                $error = "Wrong username or password";
                $this->view('auth/login', compact('error'));
                return;
            }
        } else {
            $this->view('auth/login');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('?controller=auth&action=login');
    }
}
