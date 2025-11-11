<?php
// controlador para registrar proveedor

// Solo aceptar POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Captura de datos
    $empresa        = $_POST['nombre_empresa'] ?? null;
    $nit            = $_POST['nit_rut'] ?? null;
    $representante  = $_POST['nombre_representante'] ?? null;
    $email          = $_POST['email'] ?? null;
    $tel            = $_POST['telefono'] ?? null;
    $experiencia    = $_POST['anos_experiencia'] ?? null;
    $servicios      = $_POST['actividades'] ?? []; 
    $capacidad      = $_POST['capacidad'] ?? null;
    $descripcion    = $_POST['descripcion'] ?? null;
    $departamento   = $_POST['departamento'] ?? null;
    $ciudad         = $_POST['ciudad'] ?? null;
    $direccion      = $_POST['direccion'] ?? null;
    $cobertura      = $_POST['cobertura'] ?? null;

    // En un MVC real aquí llamarías al modelo para guardar en BD
    // Ej: $proveedorModel->registrar(...)

    // ✅ Por ahora: comprobar datos recibidos
    echo "<h2>Proveedor Registrado Correctamente ✅</h2>";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

} else {
    echo "❌ Método no permitido";
}
