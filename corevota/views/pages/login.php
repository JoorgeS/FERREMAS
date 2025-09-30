<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['usuario'])) {
    header("Location: ../index.php?controller=menu&action=index");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - CORE Valparaíso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
  <!-- Logo izquierda -->
  <div class="me-5">
    <img src="/corevota/public/img/logoCore1.png" alt="CORE Valparaíso" style="max-width:300px;">

  </div>

  <!-- Tarjeta de login -->
  <div class="login-card shadow p-4 rounded">
    <div class="text-center mb-3">
      <img src="/corevota/public/img/out.png" alt="icono login" style="width:50px;">
    </div>
    <h5 class="text-center mb-4 fw-bold">
      Plataforma Gestión Documental<br>Consejo Regional de Valparaíso
    </h5>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger text-center py-2">
        Usuario o contraseña incorrectos
      </div>
    <?php endif; ?>

    <form method="POST" action="/corevota/index.php?controller=login&action=auth">

      <div class="mb-3">
        <label for="correo" class="form-label fw-bold">USUARIO</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
      </div>

      <div class="mb-3">
        <label for="contrasena" class="form-label fw-bold">CONTRASEÑA</label>
        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
      </div>

      <div class="mb-3 text-end">
        <a href="#" class="small text-decoration-none">RECUPERAR CONTRASEÑA</a>
      </div>

      <button type="submit" class="btn btn-success w-100">INGRESAR</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
