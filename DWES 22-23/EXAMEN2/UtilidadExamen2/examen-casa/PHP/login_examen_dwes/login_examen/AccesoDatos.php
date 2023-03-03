<?php

class AccesoDatos{

    const HOST = "localhost:3306";
    const USUARIO = "examen";
    const PASSWORD = "examen";
    const DBNAME = "examen";
    
    private PDO $conn;

    private static AccesoDatos $datos;

    public static function getSingletone(){
        if(!isset($datos)){
            self::$datos = new AccesoDatos();
        }
        
        return self::$datos;
    }

    private function __construct(){

        try {

            $this->conn = new PDO('mysql:host='. self::HOST .';dbname='. self::DBNAME ,self::USUARIO, self::PASSWORD);
        
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "\n";
            die();
        }
    }


    // Usuarios

    public function findUserByCorreo(string $nombre) : array{

        $usuarios = [];

        try {

            $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE nombre = :nombre');
            $stmt->execute(
                array(
                    ':nombre'=> $nombre
                )
            );
            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $usuarios = $resultado[0];
            }
        
        } catch (\Throwable $th) {
            throw $th;
        }

        return $usuarios;
    }


    public function findUserById(int $id){

        $usuarios = [];

        try {

            $stmt = $this->conn->prepare('SELECT * FROM grupos WHERE id = :id');
            $stmt->execute(
                array(
                    ':id'=> $id
                )
            );
            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $usuarios = $resultado[0];
            }
        
        } catch (\Throwable $th) {
            throw $th;
        }

        return $usuarios;
    }

    public function existEmail(string $correo) : bool{

        $usuarios = [];
        $valido = false;

        try {

            $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE correo = :correo');
        
            if($stmt->execute(
                array(
                    ':correo' => $correo
                )
            )){
                $usuarios = $stmt->fetchAll();

                $valido = !empty($usuarios);
            }else{
                //Not good
            }
        } catch (\Throwable $th) {
            throw $th;
        }

        return $valido;
    }

    public function insertUser(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                INSERT INTO usuarios(nombre,apellidos,contrasena,correo,fecha_nacimiento) 
                VALUES (:nombre,:apellidos,:contrasena,:correo,:fecha_nacimiento)"
            );

            $a = array(
                ':nombre' => $parametros['nombre'],
                ':apellidos' => $parametros['apellidos'],
                ':contrasena' => $parametros['contrasena'],
                ':correo' => $parametros['correo'],
                ':fecha_nacimiento' => $parametros['fecha_nacimiento']
            );
            $exito = $stmt->execute($a);
           
            

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function insertToken(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                INSERT INTO token(id_usuario,valor) 
                VALUES (:id_usuario,:valor)"
            );

            $a = array(
                ':id_usuario' => $parametros['id_usuario'],
                ':valor' => $parametros['valor']
            );

            $exito = $stmt->execute($a);

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function insertFoto(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                INSERT INTO foto(id_usuario,foto) 
                VALUES (:id_usuario,:foto)"
            );

            $a = array(
                ':id_usuario' => $parametros['id_usuario'],
                ':foto' => $parametros['foto']
            );

            $exito = $stmt->execute($a);

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function fotos(int $id){

        $exito = "";

        try {
        
            $stmt = $this->conn->prepare('SELECT foto from foto WHERE id_usuario = :id_usuario');
        
            $exito = $stmt->execute(
                array(
                    ':id_usuario' => $id
                )
            );

        } catch (\Throwable $th) {
            //Excapcion al hacer la consulta
        }


        return $exito;
    }

    public function fotosAll(int $id){

        $exito = [];

        try {
        
            $stmt = $this->conn->prepare('SELECT * from foto WHERE id_usuario = :id_usuario');


            if($stmt->execute(
                array(':id_usuario' => $id)
            )){
                $exito = $stmt->fetchAll();
            }else{
                //Not good
            }
        

        } catch (\Throwable $th) {
            //Excapcion al hacer la consulta
        }


        return $exito;
    }
    public function actualizarFoto(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                UPDATE foto SET foto = :foto WHERE id_usuario = :id_usuario"
            );

            $a = array(
                ':foto' => $parametros['foto'],
                ':id_usuario' => $parametros['id_usuario']
            );

            $exito = $stmt->execute($a);

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function deleteUser(int $id){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare('DELETE FROM usuarios WHERE id = :id');
        
            $exito = $stmt->execute(
                array(
                    ':id' => $id
                )
            );

        } catch (\Throwable $th) {
            //Excapcion al hacer la consulta
        }

        return $exito;
    }


    public function actualizarToken(int $id){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                UPDATE token SET expiracion = (now() + interval 7 day) WHERE id = :id"
            );

            $exito = $stmt->execute(
                array(
                    ':id' => $id
                )
            );

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function verToken(int $id){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                SELECT * FROM token WHERE id = :id
            ");

            $exito = $stmt->execute(
                array(
                    ':id' => $id
                )
            );

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function borrarToken(string $valor){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                DELETE FROM token WHERE valor = :valor
            ");

            $exito = $stmt->execute(
                array(
                    ':valor' => $valor
                )
            );

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

}
// $bd = AccesoDatos::getSingletone();

//$mP = AccesoDatos::getSingletone();

//$p = $mP->findUserById(1);

//echo "<pre>";
//var_dump($p);
//echo "</pre>";

// print_r($p[0]["foto"]);


?>