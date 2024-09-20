<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <?php
        echo "<table style='border:1px solid black; border-collapse: collapse;'>";
        for ($i = 0; $i <= 7; $i++) {
        echo "<tr>"; 
            for ($t = 0; $t <= 7; $t++) {
                $var = $t+$i;
                
                echo "<td style='border:1px solid black; padding: 5px; text-align: center; width: 30px;'>$var</td>";
        }
        echo "</tr>"; // Cierra la fila
        }
        echo "</table>"; // Cierra la tabla
    ?>


</body>
</html>