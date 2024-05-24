<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">
    <?php
    // Get the current month and year from URL parameters, if available
    if (isset($_GET['year']) && isset($_GET['month'])) {
        $Year = $_GET['year'];
        $Month = $_GET['month'];
    } else {
        $Year = date("Y");
        $Month = date("n"); // Use numeric representation of month
    }

    // Adjust the month and year based on user action
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "Last Month") {
            $Month--;
            if ($Month < 1) {
                $Month = 12;
                $Year--;
            }
        } elseif ($_GET['action'] == "Next Month") {
            $Month++;
            if ($Month > 12) {
                $Month = 1;
                $Year++;
            }
        }
    }

    // Find the first day of the month
    $FDM = strtotime("$Year-$Month-1");
    // Find the day of the week for the first day of the month
    $FDWM = date("w", $FDM);
    // Find the number of days in the month
    $Days = date("t", $FDM);
    // Convert month number to month name
    $MonthName = date("F", $FDM);

    echo '<div class="aside">';
    // Set up the heading
    echo '<div class="aside-header">';
    echo $MonthName . "&nbsp;&nbsp;&nbsp;" . $Year;
    echo '</div>';
    // Set up the footer
    echo '<div class="aside-footer">';
    echo '<form class=form action="" method="GET">';
    echo '<input type="hidden" name="year" value="' . $Year . '">';
    echo '<input type="hidden" name="month" value="' . $Month . '">';
    echo '<input type="submit" name="action" value="Last Month">';
    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    echo '<input type="submit" name="action" value="Next Month">';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    // Set up the table
    echo '<div class="calendar">';
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

    // Set the date from the beginning "1"
    $date = 1;

    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if ($i == 0 && $j < $FDWM) {
                echo "<td>&nbsp;</td>";
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
                    echo "<td>&nbsp;</td>";
                }
            }
        }
        echo "</tr>";
    }

    echo "</table>";
    echo '</div>';
    ?>
</div>

</body>
</html>
