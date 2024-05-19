<?php

// Incluye la clase Auto y la clase Garage
include 'C:\xampp\htdocs\Ejercicio20\ejercicio20.php'; // Asegúrate de tener la clase Auto definida en Auto.php


// Crea algunos autos
$auto1 = new Auto("Toyota", "Rojo");
$auto2 = new Auto("Ford", "Azul");
$auto3 = new Auto("Honda", "Blanco");

// Crea un garage
$miGarage = new Garage("Mi Garage", 10.5); // Razón social y precio por hora

// Muestra los detalles del garage
echo "Detalles del Garage:<br>";
$miGarage->MostrarGarage();
echo "<br>";

// Agrega autos al garage
echo "<br>";
$miGarage->Add($auto1);
echo "<br>";
$miGarage->Add($auto2);
echo "<br>";
$miGarage->Add($auto3);
echo "<br>";
// Muestra los detalles del garage después de agregar autos
echo "<br>";
echo "Detalles del Garage después de agregar autos:<br>";
$miGarage->MostrarGarage();
echo "<br>";

// Prueba el método Equals para verificar si un auto está en el garage
echo "El auto 1 está en el garage? ";
echo $miGarage->Equals($auto1) ? "Sí" : "No";
echo "<br>";

// Remueve un auto del garage
$miGarage->Remove($auto2);

// Muestra los detalles del garage después de remover un auto
echo "Detalles del Garage después de remover un auto:<br>";
$miGarage->MostrarGarage();
echo "<br>";

// Guarda el garage en el archivo garages.csv
Garage::AltaGarage($miGarage);

// Lee los garages desde el archivo garages.csv
$garagesGuardados = Garage::LeerGarages();
echo "Garages guardados en el archivo:<br>";
foreach ($garagesGuardados as $garage) {
    $garage->MostrarGarage();
    echo "<br>";
}

?>
