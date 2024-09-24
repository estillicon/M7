<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Juego</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td {
            border: 1px solid black;
            text-align: center;
            width: 30px;
            padding: 5px;
        }
        .numeros {
            font-weight: bold;
            text-align: center;
            background-color: black;
            color: white;
        }
        .letter {
            text-align: center;
            font-weight: bold;
            background-color: black;
            color: white;
        }
        .barco {
            background-color: red;
            color: white; 
        }
    </style>
</head>
<body>

<table>
<?php
// Imprimir la primera fila con los números del 1 al 10
echo "<tr><td class='numeros'></td>"; // Primera celda vacía
for ($i = 1; $i <= 10; $i++) {
    echo "<td class='numeros'>$i</td>";  // Celdas con los números
}
echo "</tr>";
// Crear el tablero vacío
$tablero = array();
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $tablero[$i][$j] = " "; // Inicializar todas las celdas vacías
    }
}

// Crear la matriz de posiciones disponibles(el objetivo es verificar las posiciones libres en el tablero)
$matrizPosicion = array();
for ($x = 0; $x < 10; $x++) {
    for ($y = 0; $y < 10; $y++) {
        $matrizPosicion[] = array($x, $y);
    }
}

// Lógica para colocar barcos en el tablero
$barcos = array(1,2,3,4); 

foreach ($barcos as $longitud) {
    while (true) {//bucle para determinar posicion ideal
        // Elegir una posición inicial aleatoria
        $randomIndex = array_rand($matrizPosicion);
        $bX = $matrizPosicion[$randomIndex][0];
        $bY = $matrizPosicion[$randomIndex][1];

        // Elegir aleatoriamente la dirección (0 = Horizontal, 1 = Vertical)
        $direccion = rand(0, 1);

        $valido = true;

        // Verificar si hay espacio disponible para colocar el barco
        for ($i = 0; $i < $longitud; $i++) {//se calcula la longitud del barco
            if ($direccion == 0) { // Horizontal
                $posX = $bX + $i;//la posicion sera la x aleatoria + toda la longitud
                //en el condicional primero mira que no se salga del tablero y segundo que no este la posicion cogida de la matriz gemela $matrizPosicion
                if ($posX >= 10 || !in_array([$posX, $bY], $matrizPosicion)) {
                    $valido = false; // Posición no disponible se reinicia la busqueda de posicion aleatoria
                    break;
                }
            } else { // Vertical
                $posY = $bY + $i;
                if ($posY >= 10 || !in_array([$bX, $posY], $matrizPosicion)) {
                    $valido = false; // Posición no disponible se reinicia la busqueda de posicion aleatoria
                    break;
                }
            }
        }

        if ($valido) {//si la posicion es valida
            // Determinar letra barco segun longitud
            $caracterBarco = ""; // Variable para letra barco
            //letra para diferenciar barcos
            if ($longitud == 1) {
                $caracterBarco = "F"; //Fragata 1
            } elseif ($longitud == 2) {
                $caracterBarco = "S"; //Submarino 2
            } elseif ($longitud == 3) {
                $caracterBarco = "A"; //Acorazado 3
            } elseif ($longitud == 4) {
                $caracterBarco = "P"; //Portabiones 4
            }
        
            // Colocar el barco en el tablero y eliminar posiciones
            for ($i = 0; $i < $longitud; $i++) {
                if ($direccion == 0) { // Horizontal
                    $posX = $bX + $i;//se carcula la posicion del barco segun su longitud
                    $tablero[$posX][$bY] = $caracterBarco; // Marcar en el tablero con el carácter correspondiente
                    // Eliminar de matrizPosicion(es posible que no sea necesario pero es mas eficaz seguro)
                    foreach ($matrizPosicion as $index => $posicion) {//utilizamos el index para eliminar la posicion ocupada
                        if ($posicion[0] == $posX && $posicion[1] == $bY) {
                            unset($matrizPosicion[$index]);
                        }
                    }
                } else { // Vertical
                    $posY = $bY + $i;
                    $tablero[$bX][$posY] = $caracterBarco; // Marcar en el tablero con el carácter correspondiente
                    // Eliminar de matrizPosicion
                    foreach ($matrizPosicion as $index => $posicion) {
                        if ($posicion[0] == $bX && $posicion[1] == $posY) {
                            unset($matrizPosicion[$index]);
                        }
                    }
                }
            }
        
            // Reindexar la matrizPosicion 
            $matrizPosicion = array_values($matrizPosicion);
            break; 
        }
    }
}


// Generar la tabla
for ($i = 0; $i <10; $i++) {
    $letter = chr(65 + $i); // Variable para las letras

    // Crear una nueva fila
    echo "<tr>";
    echo "<td class='letter'>$letter</td>"; // Primera columna con las letras

    for ($j = 0; $j <10; $j++) {
        $colorClass = $tablero[$i][$j] !== " " ? "barco" : ""; // Asignar clase 'barco' si hay barco
        // Obtener el valor de la matriz y colocarlo en la celda correspondiente
        echo "<td class='$colorClass'>".$tablero[$i][$j]."</td>";
    }

    echo "</tr>";
}

?>
</table>

</body>
</html>
