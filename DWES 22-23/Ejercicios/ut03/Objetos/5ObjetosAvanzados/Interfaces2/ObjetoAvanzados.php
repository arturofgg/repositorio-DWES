<?php
/*Ejercicio completo

Estás creando el juego de clases para un videojuego

En el futuro esperas que otros jugadores-programadores creen muchos tipos de personajes, así que decides crear un Intefaz personaje con los métodos atacar y defender.

Vas a implementar un personaje Humano que escribirá "puñetazo" cuando ataque y "bloqueo" cuando defiende.

También vas a implemetnar un persnaje Mago. Todos los magos se dienden diciendo "hechizo protector" pero hay dos tipos de magos. Los personajes MagosBlancos que atacan escribiendo "ataque de luz", y los MagosOscuros que atacan escribiendo "ataque de sombra" (Mago es una clase abstracta)

Dentro del juego también tendrás una clase Edificio, que tiene una altura y un método para escribir la altura, una descripción y un método para obtener la descripción.

Dentro del juego también hay Objetos que tienen un peso y un método para mostrar el peso, y una descripción y un método para obtener la descripción.

Tanto los edificios como los objetos tienen una descripción y un método setter y getter para ella. ¡Podemos usar un trait!

Tanto los personajes, los edificios y los objetos tienen una posición en el mapa: x y z. Estas posiciones tienen sus métodos getters y setters.*/

interface videojuegoF{
    public function atacar();
    public function defender();
}
?>