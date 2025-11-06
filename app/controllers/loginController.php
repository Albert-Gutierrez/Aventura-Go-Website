<?php
//impotamos las dependencias
require_once __DIR__ . '/../models/login.php';

// $clave = '123';
// echo password_hash($clave, PASSWORD_DEFAULT);

//ejeciutar segun la solicitud al servisor "POST"
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    //capturamos en variables los valores enviados a travez de los name del formulario y el method POST
    $correo = $_POST['email'] ?? '';
    $clave = $_POST['contrasena'] ?? '';

    //validamos que los campos/variables no esten vacios
    if (empty($correo) || empty($clave)){
        mostrarSweetAlert('error', 'campos vacios', 'por favor completar todos los campos');
        exit();
    }
    //POO -INSTANCIAMOS LA CLASE DEL MODELO, PARA ACCEDER A UN METHOD (FUNCION) EN ESPECIFICO
    $login = new login();
    $resultado = $login->autenticar($correo, $clave);

    //verificar si el modelo devolvio un error
    if (isset($resultado['error'])) {
        mostrarSweetAlert('Error', 'Error de autenticacion', $resultado['error']);
        exit();
    }

    //si pasa esta linea el ususario es valido
    session_start();
    $_SESSION['user'] = [
        'id' => $resultado['id_usuario'],
        'nombre' => $resultado['nombre'],
        'rol' => $resultado['rol']
    ];

    mostrarSweetAlert('success', 'Bienvenido', 'inicio de sesion exitoso. Redirigiendo...', '/aventura_go/');
    exit();

} else{
    http_response_code(405);
    echo "Metodo no permitido";
    exit();
}

/**
 * Función para imprimir SweetAlert dinámico con estilo SENA
 */
function mostrarSweetAlert($tipo, $titulo, $mensaje, $redirect = null) {
    echo "
    <html>
        <head>
            <meta charset='UTF-8'>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap&#39;);

                body {
                    margin: 0;
                    height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: linear-gradient(135deg, #00304D, #007832);
                    font-family: 'Montserrat', sans-serif;
                    color: #fff;
                }

                .swal2-popup {
                    font-family: 'Montserrat', sans-serif !important;
                }

                .swal2-title {
                    color: #00304D !important;
                    font-weight: 600 !important;
                }

                .swal2-styled.swal2-confirm {
                    background-color: #007832 !important;
                    border: none !important;
                }

                .swal2-styled.swal2-confirm:hover {
                    background-color: #005d28 !important;
                }

                .swal2-styled.swal2-cancel {
                    background-color: #00304D !important;
                }
            </style>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>;
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: '$tipo',
                    title: '$titulo',
                    text: '$mensaje',
                    confirmButtonText: 'Aceptar',
                    confirmButtonColor: '#007832',
                    background: '#fff',
                    color: '#00304D'
                }).then((result) => {
                    " . ($redirect ? "window.location.href = '$redirect';" : "window.history.back();") . "
                });
            </script>
        </body>
    </html>";
}

?>