<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title><link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <?php

    $Month= date("m");
    $FDM= strtotime(date("Y-m-1"));
    $FDWM= date("w", $FDM);
    $Days= date("t", $FDM);
    echo "<table>";
    echo "<tr>";
    echo "<td colspan='7'>$Month</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>SUN</td>";
    echo "<td>MON</td>";
    echo "<td>TUE</td>";
    echo "<td>WED</td>";
    echo "<td>THU</td>";
    echo "<td>FRI</td>";
    echo "<td>SAT</td>";
    echo "</tr>";
    
    $date= 1;
    
    for($i=0; $i<6; $i++){
        echo "<tr>";
        for($j=0; $j<7; $j++){
            if($i==0 && $j<$FDWM){
                echo "<td>&nbsp</td>";
            }else{
                if($date>0 && $date <= $Days){
                    echo "<td>$date</td>";
                }else{
                    echo "<td>&nbsp</td>";
                }
                $date++; 
            }

        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>