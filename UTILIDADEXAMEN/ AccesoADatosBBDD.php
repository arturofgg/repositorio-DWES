<?php 

namespace ValidarUsuario\src\data;

use Exception;
use PDO;
use PlantillaFormulario\Utilidades\Fecha;
use ValidarUsuario\src\Usuario\Estudios;
use ValidarUsuario\src\Usuario\Idioma;
use ValidarUsuario\src\Usuario\Sexo;
use ValidarUsuario\src\Usuario\Usuario;

class AccesoADatosBBDD {

/* Defining the database connection parameters. */
    private const HOST = "localhost:3306";
    private const DB_NAME = "administracion_usuarios";
    private const USUARIO = "root";
    private const CLAVE = "123abc";

    private PDO $conn;
    
    private static AccesoADatosBBDD $accesoADatos;

    private function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME,
                self::USUARIO,
                self::CLAVE
            );
    
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<h1>Error al conectar con la base de datos</h1>";
            echo $e->getMessage();
            die();
        }
    }

    public static function getSingletone() : AccesoADatosBBDD {
        if (!isset(self::$accesoADatos)) {
            self::$accesoADatos = new AccesoADatosBBDD ();
        }
        return self::$accesoADatos;
    }

    public function existeUsuario(Usuario $usuario) : bool{     
        $retorno = false;

        try {
            $statement = $this->conn->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
            $statement->execute(
                array(
                    ":usuario" => $usuario->getUsuario()
                )
            );

            $resultados = $statement->fetchAll();

            $retorno = !empty($resultados);
        }
        catch (Exception $e) {
            echo "No va";
        }

        return $retorno;
    }

    public function insertarUsuario(Usuario $usuario) : string {
        $retorno = "";
        if (!$this->existeUsuario($usuario)) {
            try {
                $this->conn->beginTransaction();
                $queryInsertUsuario = "INSERT INTO usuario(usuario, pass, sexo, edad, estudios, fecha_contratacion)
                    VALUES (:usuario, :pass, :sexo, :edad, :estudios, :fecha_contratacion)";

                $arrayUsuario = array(
                    ":usuario" => $usuario->getUsuario(), 
                    ":pass" => $usuario->getClave(),
                    ":sexo" => $usuario->getSexo()->value, 
                    ":edad" => $usuario->getEdad(),
                    ":estudios" => $usuario->getEstudios()->value,
                    ":fecha_contratacion" => $usuario->getFechaContratacion()->toYYYYMMDD()
                );

                $queryInsertIdiomas = "INSERT INTO usuario_idioma(usuario, id_idioma) VALUES ";

                $arrayIdiomas = [
                    ":usuario" => $usuario->getUsuario()
                ];

                $idiomas = $this->getIdiomas();

                for ($i=0; $i < count($usuario->getIdiomas()); $i++) { 
                    $queryInsertIdiomas .= (($i == 0) ? "": ", ") ."(:usuario, :id$i)";
                    $arrayIdiomas[":id$i"] = $idiomas[$usuario->getIdiomas()[$i]->value];
                }

                
                $statementUsuario = $this->conn->prepare($queryInsertUsuario);
                $statementUsuario->execute($arrayUsuario);
                
            
                $statementIdiomas = $this->conn->prepare($queryInsertIdiomas);
                $statementIdiomas->execute($arrayIdiomas);
                

                $this->conn->commit();
                $retorno = "Exito"; 

            }
            catch (Exception $e) {
                $this->conn->rollBack();
                $retorno = "Error interno";
            }
        }
        else {
            $retorno = "El usuario ya existe";
        }

        return $retorno;

    }

    public function getIdiomas() : array {
        $retorno = [];
        try {
            $query = "SELECT * FROM idioma";
            
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $idiomas = $statement->fetchAll();
            
            foreach ($idiomas as $fila) {
                $retorno[$fila["nombre"]] = $fila["id"];
            }
        }
        catch (Exception $e) {

        }

        return $retorno;
    }

    public function recogerUsuarios() : array {
        $retorno = [];
        
        try {
            $statement = $this->conn->prepare(
                "SELECT usuario.*, GROUP_CONCAT(idioma.nombre SEPARATOR ';') AS idiomas from usuario, usuario_idioma, idioma where
                    usuario_idioma.usuario = usuario.usuario AND
                    usuario_idioma.id_idioma = idioma.id
                    GROUP BY usuario.usuario"
            );
            $statement->execute();
            $usuarios = $statement->fetchAll();

            // echo "<pre>";
            //     print_r(json_encode($usuarios, JSON_PRETTY_PRINT));
            // echo "</pre>";
            
            foreach($usuarios as $usuario) {

                $usu = new Usuario (
                    usuario: $usuario[Usuario::NOMBRE_NAME],
                    clave: $usuario[Usuario::CLAVE_NAME],
                    sexo: Sexo::from($usuario[Usuario::SEXO_NAME]),
                    edad: intval($usuario[Usuario::EDAD_NAME]),
                    estudios: Estudios::from($usuario[Usuario::ESTUDIOS_NAME]),
                    fechaContratacion: Fecha::fromYYYYMMDD($usuario[Usuario::FECHA_CONTRATACION_NAME], "-")
                );

                $idiomas = explode(";", $usuario[Usuario::IDIOMAS_NAME]);
                
                array_walk($idiomas, function(string $idioma) use ($usu) {
                    $usu->addIdioma(Idioma::from($idioma));
                });

                $retorno[] = $usu;
            }

        } catch (Exception $e) {
            
        }

        return $retorno;

    }

    public function recogerUsuariosJSON() :string {
        return json_encode($this->recogerUsuarios());
    }

    
}