<?php
spl_autoload_register(function ($class) {
    $classPath = "./";
    echo "Autoload llamado";
    // en nuestros proyectos
    // ../src/
    // o la ruta a la raíz del proyecto
    require("$classPath${class}.php");
});
?>