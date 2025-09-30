<?php
class Usuario {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($correo, $contrasena) {
        $sql = "SELECT * FROM t_usuario WHERE correo = ? LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario = $result->fetch_assoc();

        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            return $usuario;
        }
        return false;
    }

}
?>