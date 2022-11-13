<?php
use hhtpmethod;
use Regex;
use Fecha;

class validaciones2{

    private array $peticion;

    //constructor que define peticion como GET o POST en base al httpmethod
    public function __construct(httpmethod $metodo){
        switch($metodo) {
            case httpmethod::GET:
                $this->peticion = $_GET;
                break;
            case httpmethod::POST:
                $this->peticion = $_POST;
                break;
            default:
            throw new Exception("Metodo no soportado");
        }
    }

    //validaciones generales
    private function validarGeneral(Regex $regex, string $campo) : bool{
        return isset($this->peticion[$campo]) && preg_match($regex->value, $this->peticion[$campo]);
    }
   
    private function validar2(string $campo) : bool{
        return isset($this->peticion[$campo]);
    }

    private function validarGenero(Genero $genero, string $campo) : bool{
        return isset($this->peticion[$campo]) && preg_match($genero->value, $this->peticion[$campo]);
    }

    //validaciones especificas
    public function validarSubmit($campoSubmit) : bool{
        return $this->validar2($campoSubmit);
    }

    public function validarNombre(string $campoNombre) : bool{
        return $this->validarGeneral(Regex::NOMBRE, $campoNombre);
    }

    public function validarNumero(string $campoNumero) : bool{
        return $this->validarGeneral(Regex::NUMERO, $campoNumero);
    }

    public function validarEmail(string $campoEmail) : bool{
        return $this->validarGeneral(Regex::CORREO, $campoEmail);
    }

    public function validarFecha(string $campoFecha) : bool{
        return  (Fecha::fromDDMMYYYY($this->peticion[$campoFecha]))->despuesDeHoy();  
    }

    public function validarRadio(string $campoRadio) : bool{
        return ($this->validarGenero(Genero::HOMBRE, $campoRadio) || $this->validarGenero(Genero::MUJER, $campoRadio) || $this->validarGenero(Genero::OTRO, $campoRadio));
    }

    /*CHECKBOX 
        public static function validarGeneroPelicula(){
            $correcto=true;
            $cont=0;
            if(!empty($_POST["genero[]"])){
                for($i=0; $i<count($_POST["genero[]"]) && $correcto; $i++){
                    if(Genero::fromValue($_POST["genero[".$i."]"]) == Genero::NONE){
                        $errores["genero"] = "Genero no valido";
                        $correcto=false;
                    }else $genero[$cont++] = $_POST["genero[".$i."]"];  
                }
            }else $errores["genero[]"] = "No ha introducido ningun genero";
        }
    */

}

    $this->validarSubmit($this->peticion["Enviar"]);
    $this->validarNombre($this->peticion["Nombre"]);
    $this->validarNumero($this->peticion["Numero"]);
    $this->validarEmail($this->peticion["Email"]);
    $this->validarFecha($this->peticion["Fecha"]);
    


?>