<?php
require_once __DIR__ . '/../cfg/db.php';
require_once __DIR__ . '/../models/Usuario.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

class LoginController {

    public function index() {
        // Mostrar el formulario de login
        include __DIR__ . '/../views//pages/login.php';
    }

    public function auth() {
        global $conn;

        $usuarioModel = new Usuario($conn);

        $correo = $_POST['correo'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        $usuario = $usuarioModel->login($correo, $contrasena);

        if ($usuario) {
            $_SESSION['usuario'] = [
                'id'     => $usuario['idUsuario'],
                'nombre' => $usuario['pNombre'] . ' ' . $usuario['aPaterno'],
                'perfil' => $usuario['perfil'],
                'tipo'   => $usuario['tipoUsuario'],
                'correo' => $usuario['correo']
            ];
            header("Location: index.php?controller=menu&action=index");
            exit();
        } else {
            header("Location: index.php?controller=login&action=index&error=1");
            exit();
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=login&action=index");
        exit();
    }
}
