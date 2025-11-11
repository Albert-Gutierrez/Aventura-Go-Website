<?php
require_once __DIR__ . '/../../config/database.php';

class login {
    private $conexion;

    public function __construct() {
        $db = new conexion();
        $this->conexion = $db->getConexion();
    }

    //creamos la funcion
    public function autenticar($correo, $clave) {
        try{
            $consultar = "SELECT * FROM usuario WHERE email = :correo AND estado = 'activo' LIMIT 1";

            $resultado = $this->conexion->prepare($consultar);
            $resultado->bindParam(':correo', $correo); //tema de seguridad, evita sql inyection
            $resultado->execute();

            $user = $resultado->fetch(); //se utiliza el fetch para separar por tildes y comas para poderlos manipular ya que el string o la  cadena los datos vienen juntos

            if (!$user){
                return['error' => 'Usuario no encontrado o inactivo'];
            }

            //verificar la contrseña encriptada
            if (!password_verify($clave, $user['clave'])) { //se verifica la contraseña encriptada
                return ['error' => 'Contraseña incorrecta'];
            }

            return [
                'id_usuario' => $user['id_usuario'],
                'rol' => $user['rol'],
                'nombre' => $user['nombre'],
                'correo' => $user['email']
            ];

        } catch (PDOException $e) {
            error_log("Error en el modelo login: " . $e->getMessage());
            return['Error' => 'Error interno del servidor'];
        }
    }
}

?>