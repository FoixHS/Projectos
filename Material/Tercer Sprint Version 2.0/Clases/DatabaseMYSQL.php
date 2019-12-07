<?php
include_once 'Database.php';
class DatabaseMYSQL extends Database
 {

    public $conexion;

    public function __construct(){
        $dsn = 'mysql:host=localhost;dbname=redanimal';
        $nombre_usuario = 'root';
        $contrasenia = '';
        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        $this->conexion = new PDO($dsn, $nombre_usuario, $contrasenia, $opciones);
    }

    public function guardarUsuario(Usuario $usuario){
        $consulta = $this->conexion->prepare("INSERT INTO usuarios (id,nombre,apellido,email,pass,avatar)
        VALUES (null,'".$usuario->nombre."','".$usuario->apellido."','".$usuario->email."','".$usuario->pass."','".$usuario->avatar."'  )");
        $consulta->execute();

        return $this->conexion->lastInsertId();
    }

    public function traerUsuario($id){
        $consulta = $this->conexion->query("SELECT * FROM usuarios WHERE id = ".$id);
        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        return $usuario;
    }

		public function borrarUsuario(){

		}

    public function actualizarUsuario($nombre,$email){
        $consulta = $this->conexion->prepare("UPDATE usuarios SET nombre = '".$nombre."' , email = '".$email."' WHERE id = ".$_SESSION["user_id"]);
        $consulta->execute();
    }

}
?>
