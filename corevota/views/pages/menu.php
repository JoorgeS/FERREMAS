<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Definir las páginas que se pueden cargar
$pages = [
    "crearMinuta" => "crearMinuta.php",
    "pendientes"  => "minutasPendientes.php",
    "aprobadas"   => "minutasAprobadas.php",
    "calendario"  => "calendario.php",
    "historial"   => "historial.php",
    "comisiones"  => "comisiones.php",
    "votaciones"  => "votaciones.php",
    "docs"        => "documentacion.php",
    "config"      => "configuracion.php"
];

$page = $_GET['page'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CORE Vota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm px-3">
      <div class="container-fluid">
        <!-- Texto fijo -->
        <span class="navbar-brand mb-0 h5">
          Plataforma Gestión Documental Consejo Regional de Valparaíso
        </span>

        <!-- Datos dinámicos -->
        <div class="d-flex align-items-center">
          <span class="me-3">Perfil: <?php echo $_SESSION['usuario']['perfil']; ?></span>
          <strong><?php echo $_SESSION['usuario']['nombre']; ?></strong>

          <!-- Dropdown -->
          <div class="dropdown ms-2">
            <a href="#" class="dropdown-toggle text-dark text-decoration-none" id="dropdownUser"
               data-bs-toggle="dropdown" aria-expanded="false"></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
              <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
              <li><a class="dropdown-item" href="#">Configuración</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../controllers/LogoutController.php">Cerrar sesión</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- Wrapper -->
    <div class="content-wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <h6 class="text-muted">Menú</h6>
            <ul class="nav flex-column">
                <li><a class="nav-link" href="menu.php?page=crearMinuta">Crear Minuta</a></li>
                <li><a class="nav-link" href="menu.php?page=pendientes">Minutas Pendientes</a></li>
                <li><a class="nav-link" href="menu.php?page=aprobadas">Minutas Aprobadas</a></li>
                <li><a class="nav-link" href="menu.php?page=calendario">Calendario</a></li>
                <li><a class="nav-link" href="menu.php?page=historial">Historial</a></li>
                <li><a class="nav-link" href="menu.php?page=comisiones">Comisiones</a></li>
                <li><a class="nav-link" href="menu.php?page=votaciones">Votaciones</a></li>
                <li><a class="nav-link" href="menu.php?page=docs">Documentación</a></li>
                <li><a class="nav-link" href="menu.php?page=config">Configuración</a></li>
            </ul>
        </div>

        <!-- Contenido principal -->
        <div class="main-content">
            <?php
            if ($page && array_key_exists($page, $pages)) {
                include "pages/" . $pages[$page];
            } else {
                echo "<h3>Bienvenido, {$_SESSION['usuario']['nombre']}</h3>
                      <p>Selecciona una opción del menú para comenzar.</p>";
            }
            ?>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
