<?php

namespace UTILIDADEXAMEN;
//ENUMERADO DE EXPRESIONES REGULARES
enum ExpReg : string {

    /**
     * Expresion regular que permite letras, mayusculas, minusculas, numeros, acentos y caracteres especiales
     */
    case NOMBRE = '/^[a-zA-Z0-9À-ÖØ-öø-ÿ\s\/._-]{1,}$/';

    /**
     * Valida numeros y puedes poner si son negativos   
     */
    case NUMERO = '/^[-]?[0-9]{1,}$/';
    
    /**
     * Expresion regular que pide 9 digitos
     */
    case TELEFONO = '/^\d{9}$/';

    /**
     * Valida correos del formato "xxx@xxx.xxx" pudiendo meter letras, numeros, puntos, guiones y barras bajas
     * 
     */
    case CORREO = '/^[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,5}$/';
}

?>