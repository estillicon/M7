<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="border:1px solid black; border-collapse: collapse;">

    
        <?php
        echo "<tr><td style='border:1px solid black;'> </td>";
            for($i=0; $i<=7; $i++) {

                echo "<td style='border:1px solid black;'>$i</td>";

            }
            echo "</tr>";
        ?>
   
        <?php
            $var = 10;
            
            for($i=0; $i<=7; $i++) {
                $var =chr(65+$i);
                echo "<tr>"; 

                echo "<tr><td style='border:1px solid black; border-collapse: collapse;'> $var</td>";
                 

                for($t=0; $t<=7; $t++) {
                    echo "<td style='border:1px solid black; border-collapse: collapse;'> </td>";

                }
                echo "</tr>";

            }
        ?>
    
    
    </table>
    
</body>
</html>