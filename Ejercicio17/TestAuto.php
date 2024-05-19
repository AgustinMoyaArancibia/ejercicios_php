
<?php

include 'C:\xampp\htdocs\Ejercicio17\ejercicio17.php';

$auto1 = new Auto("Toyota", "Azul");
$auto2 = new Auto("Toyota", "Azul");
$auto3 = new Auto("Toyota", "Rojo", 20000);
$auto4 = new Auto("Toyota", "Rojo", 25000, new DateTime('now'));
$auto5 = new Auto("Toyota", "Rojo", 30000, new DateTime('now'));


//se llama asi porque es una funcion normal ->
$auto3 -> AgregarImpuestos(1500);
$auto4 -> AgregarImpuestos(1500);
$auto5 -> AgregarImpuestos(1500);

//se llama asi porque es una funcion estatica ::
echo "Importe sumado del primer auto más el segundo: " . Auto::Add($auto3, $auto4) . "<br>";

echo "Comparación del primer auto con el segundo: ";
echo $auto1->Equals($auto2) ? "Son iguales<br>" : "No son iguales<br>";

echo "Comparación del primer auto con el quinto: ";
echo $auto1->Equals($auto5) ? "Son iguales<br>" : "No son iguales<br>";

echo "<br>Mostrando los autos impares:<br>";
Auto::MostrarAuto($auto1);
echo "<br>";
Auto::MostrarAuto($auto3);
echo "<br>";
Auto::MostrarAuto($auto5);




?>