<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <table style="border:1px solid black; border-collapse: collapse;">

        <TR>
            

            <?php
                $var = 10;

                

                for($i=0; $i<=7; $i++) {
                    $var =chr(65+$i);
                    

                    echo "<td style='border:1px solid black;'> $var</td>";


                }

        
            ?>

        </TR>


        <TR>


            <?php

                for($i=0; $i<=7; $i++) {

                    echo "<td style='border:1px solid black;'>$i</td>";

                }
            
            
            ?>





        </TR>



    </table>

</body>
</html>