<?php
include 'C:\xampp\htdocs\Ejercicio18\ejercicio18.php';


// Creamos instancias de autos
$auto1 = new Auto("Toyota", "Rojo", 20000);
$auto2 = new Auto("Honda", "Azul", 25000);
$auto3 = new Auto("Ford", "Negro", 30000);




// Creamos una instancia de Garage
$miGarage = new Garage("Mi Garage", 10); // Se establece el precio por hora en 10
// Agregamos autos al Garage
$miGarage->Add($auto1);
$miGarage->Add($auto2);
// Mostramos los detalles del Garage
echo "Detalles del Garage: <br>";
$miGarage->MostrarGarage();
echo "<br>";


// Mostramos los detalles del Garage después de agregar autos
echo "Detalles del Garage después de agregar autos: <br>";
$miGarage->MostrarGarage();
echo "<br>";

// Intentamos agregar el mismo auto al Garage nuevamente
$miGarage->Add($auto1); // Esto debería mostrar un mensaje indicando que el auto ya está en el Garage

// Removemos un auto del Garage
$miGarage->Remove($auto2);

// Mostramos los detalles del Garage después de remover un auto
echo "Detalles del Garage después de remover un auto: <br>";
$miGarage->MostrarGarage();
echo "<br>";

// Intentamos remover un auto que ya no está en el Garage
$miGarage->Remove($auto2); // Esto debería mostrar un mensaje indicando que el auto no está en el Garage

?>