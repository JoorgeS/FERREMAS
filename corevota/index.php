<?php
session_start();

// Detectar controlador y acción desde la URL
$controller = $_GET['controller'] ?? 'login';
$action     = $_GET['action'] ?? 'index';

// Armar nombre del archivo y clase
$controllerFile = __DIR__ . "/controllers/" . ucfirst($controller) . "Controller.php";
$controllerClass = ucfirst($controller) . "Controller";

// Validar que el controlador exista
if (file_exists($controllerFile)) {
    require_once $controllerFile;

    if (class_exists($controllerClass)) {
        $ctrl = new $controllerClass();

        if (method_exists($ctrl, $action)) {
            $ctrl->$action();
        } else {
            http_response_code(404);
            echo "Error 404: Acción '$action' no encontrada en $controllerClass.";
        }
    } else {
        http_response_code(500);
        echo "Error: clase '$controllerClass' no definida en $controllerFile.";
    }
} else {
    http_response_code(404);
    echo "Error 404: Controlador '$controller' no encontrado.";
}
