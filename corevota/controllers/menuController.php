<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class MenuController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?controller=login&action=index");
            exit();
        }
        include __DIR__ . '/../views/pages/menu.php';
    }
}
