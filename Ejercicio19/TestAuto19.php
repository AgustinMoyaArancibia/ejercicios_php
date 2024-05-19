<?php
include 'C:\xampp\htdocs\Ejercicio19\ejercicio19.php';


// Crear un nuevo auto
$auto = new Auto("Toyota", "Rojo", 20000, new DateTime());

// Agregar impuestos
$auto->AgregarImpuestos(1000);

// Mostrar los detalles del auto
echo "<br>";
Auto::MostrarAuto($auto);
echo "<br>";


// Agregar el auto al archivo autos.csv
Auto::AltaAuto($auto);

Auto::AltaAuto2($auto);

// Leer los autos desde el archivo autos.csv
$autosGuardados = Auto::LeerAutos();
foreach ($autosGuardados as $autoGuardado) {

    Auto::MostrarAuto($autoGuardado);
    echo "<br>";
}

?>