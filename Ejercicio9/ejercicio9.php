<?php

$lapicera1 = array(
'color' => '',
'marca' => '',
'trazo' => '',
'precio' => 0

);
$lapicera2 = array(
'color' => '',
'marca' => '',
'trazo' => '',
'precio' => 0
    
);
 $lapicera3 = array(
'color' => '',
'marca' => '',
'trazo' => '',
'precio' => 0
        
 );

 $lapicera1['color'] = 'Azul';
 $lapicera1['marca'] = 'BIC';
 $lapicera1['trazo'] = 'Fino';
 $lapicera1['precio'] = 1.5;
 

 $lapicera2['color'] = 'Negro';
 $lapicera2['marca'] = 'BIC';
 $lapicera2['trazo'] = 'Fino';
 $lapicera2['precio'] = 1.5;

 $lapicera3['color'] = 'ROjo';
 $lapicera3['marca'] = 'BIC';
 $lapicera3['trazo'] = 'Fino';
 $lapicera3['precio'] = 1.5;


 echo "lapicera 1 <br><br> ";

foreach($lapicera1 as $clave => $valor )
{
    echo "$clave : $valor <br>";
}



 echo "<br>lapicera 2 <br> ";

 foreach($lapicera2 as $clave => $valor )
{
    echo "$clave : $valor <br>";
}
 echo "<br>lapicera 3 <br> ";

 foreach($lapicera3 as $clave => $valor )
{
    echo "$clave : $valor <br>";
}
 





?>