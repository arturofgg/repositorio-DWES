<?php

enum Regex : string {

    /**
     * Expresion regular que permite letras, mayusculas, minusculas, numeros, acentos y caracteres especiales
     */
    case NOMBRE = '[a-zA-Z0-9À-ÖØ-öø-ÿ\s\/._-]{1,}';

    /**
     * Valida numeros y puedes poner si son negativos   
     */
    case NUMERO = '[-]?[0-9]{1,}';
    
    /**
     * Expresion regular que pide 9 digitos
     */
    case TELEFONO = '\d{9}';

    /**
     * Valida correos del formato "xxx@xxx.xxx" pudiendo meter letras, numeros, puntos, guiones y barras bajas
     * 
     */
    case CORREO = '[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})';
}