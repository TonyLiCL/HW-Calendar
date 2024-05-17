<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title><link rel="stylesheet" href="./css/style.css">
</head>
<body>


<div>
    <?php
    // Find the year and month
    $Year=date("Y");
    $Month= date("F");
    // Find the first day of a month
    $FDM= strtotime(date("Y-m-1"));
    // Find the days of a week
    $FDWM= date("w", $FDM);
    // Find the days of a month
    $Days= date("t", $FDM);
    // Set up the heading
    echo '<div class="Top">';
    echo $Month;
    echo "&nbsp";
    echo "&nbsp";
    echo "&nbsp";
    echo "&nbsp";
    echo "&nbsp";
    echo "&nbsp";
    echo $Year;
    echo '</div>';
    echo "<br>";
    echo "<br>";
    // Set up the table
    echo "<table>";
    echo "<tr>";
    echo "<td>SUN</td>";
    echo "<td>MON</td>";
    echo "<td>TUE</td>";
    echo "<td>WED</td>";
    echo "<td>THU</td>";
    echo "<td>FRI</td>";
    echo "<td>SAT</td>";
    echo "</tr>";
    // Run if formula
    // Set the date from the begining "1"
    $date= 1;
    
    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if ($i == 0 && $j < $FDWM) {
                echo "<td>&nbsp</td>";
            } else {
                if ($date > 0 && $date <= $Days) {
                    // Check if the day is a holiday
                    if ($j == 0 || $j == 6) { // Check if Sunday (0) or Saturday (6)
                        echo "<td class='holiday'>$date</td>"; // Add holiday class
                    } else {
                        echo "<td>$date</td>";
                    }
                    $date++;
                } else {
                    echo "<td>&nbsp</td>";
                }
            }
        }
        echo "</tr>";
    }
    
    echo "</table>";
    ?>
</div>

</body>
</html>