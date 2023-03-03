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



    const LONG_TOKEN = 32;

    function getToken() {
        return bin2hex(openssl_random_pseudo_bytes(self::LONG_TOKEN));
    }

    // Usuarios

    public function Ptoken(string $token) : array{

        $usuarios = [];

        try {

            $stmt = $this->conn->prepare('SELECT * FROM auth_tokens WHERE token = :token');
            $stmt->execute(
                array(
                    ':token'=> $token
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

    public function findUserByCorreo(string $correo) : array{

        $usuario = [];

        try {

            $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE correo = :correo');
            $stmt->execute(
                array(
                    ':correo'=> $correo
                )
            );
            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $usuario = $resultado[0];
            }
        
        } catch (\Throwable $th) {
            throw $th;
        }

        return $usuario;
    }



    public function findUserById(int $id){

        $usuarios = [];

        try {
        
            $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE id = :id');

            $stmt->execute(
                array(':id' => $id)
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



    public function insertUser(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                INSERT INTO usuarios(nombre,passwd,correo) 
                VALUES (:nombre,:passwd,:correo)"
            );

            $a = array(
                ':nombre' => $parametros['nombre'],
                ':passwd' => $parametros['passwd'],
                ':correo' => $parametros['correo']
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
                INSERT INTO tokens(id_usuario,valor) 
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

    public function foto(int $id){

        $usuarios = [];

        try {
        
            $stmt = $this->conn->prepare('SELECT * FROM usuarios WHERE id = :id');

            $stmt->execute(
                array(':id' => $id)
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

    public function actualizarFoto(array $parametros){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                UPDATE usuarios SET img = :img WHERE id= :id"
            );

            $a = array(
                ':img' => $parametros['img'],
                ':id' => $parametros['id']
            );

            $exito = $stmt->execute($a);

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

   


    public function actualizarToken(array $tk){

        $exito = false;

        try {
        
            $stmt = $this->conn->prepare("
                UPDATE token SET expiracion = (now() + interval 7 day) WHERE valor = :valor"
            );

            $exito = $stmt->execute(
                array(
                    ':valor' => $tk
                )
            );

        } catch (\Throwable $th) {
            throw $th;
        }

        return $exito;
    }

    public function pillarToken(string $tk){

        $token = [];

        try {
        
            $stmt = $this->conn->prepare("SELECT * FROM tokens WHERE valor = :valor");


            if($stmt->execute(
                array(
                    ':valor' => $tk
                )
            )){
                $token = $stmt->fetchAll();
            }else{
                //Not good
            }
        

        }catch (\Throwable $th) {
            throw $th;
        }

        return $token;
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
                DELETE FROM tokens WHERE valor = :valor
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

// $mP = AccesoDatos::getSingletone();

// $p = $mP->fotosAll(25);

// $usu = $mP->findUserByCorreo("dd@gmail.com");
// echo "<pre>";
// var_dump($usu);
// echo "</pre>";

// echo "<br>";
// echo $usu["passwd"]. "<br>";

// echo (password_verify("1234",$usu["passwd"])) ? "Si" : "Una mierda";


?>