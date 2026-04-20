<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;
    public function __construct($pdo) {
        $this->userModel = new User($pdo);
    }
    public function showLogin() {
        require_once __DIR__ . '/../views/login.php';
    }
    public function login($username, $password) {
        $user = $this->userModel->findByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header('Location: /dashboard');
            exit;
        } else {
            $error = "Invalid credentials";
            require_once __DIR__ . '/../views/login.php';
        }
    }
    public function logout() {
        session_destroy();
        header('Location: /login');
        exit;
    }
}
?>
