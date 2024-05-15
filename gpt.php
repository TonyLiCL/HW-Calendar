<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>萬年曆</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1 class="h1">萬年曆</h1>

    <?php
    // Get selected month and year from the form, or use the current month and year as default
    $selectedYear = isset($_GET['year']) ? (int)$_GET['year'] : date('Y');
    $selectedMonth = isset($_GET['month']) ? (int)$_GET['month'] : date('m');

    // Generate the first day of the selected month
    $FDM = strtotime("$selectedYear-$selectedMonth-01");
    $FDWM = date("w", $FDM);
    $Days = date("t", $FDM);

    // List of months for the dropdown
    $months = [
        1 => "January", 2 => "February", 3 => "March",
        4 => "April", 5 => "May", 6 => "June",
        7 => "July", 8 => "August", 9 => "September",
        10 => "October", 11 => "November", 12 => "December"
    ];

    // Create the form
    echo "<form action='' method='GET'>";
    echo "<label for='month'>Select Month: </label>";
    echo "<select name='month' id='month'>";
    foreach ($months as $key => $value) {
        $selected = ($key == $selectedMonth) ? "selected" : "";
        echo "<option value='$key' $selected>$value</option>";
    }
    echo "</select>";

    echo "<label for='year'>Select Year: </label>";
    echo "<input type='number' name='year' id='year' value='$selectedYear' min='1900' max='2100'>";

    echo "<input type='submit' value='Generate'>";
    echo "</form>";

    // Create the calendar table
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><td colspan='7'>" . $months[$selectedMonth] . " $selectedYear</td></tr>";
    echo "<tr>";
    echo "<td>SUN</td>";
    echo "<td>MON</td>";
    echo "<td>TUE</td>";
    echo "<td>WED</td>";
    echo "<td>THU</td>";
    echo "<td>FRI</td>";
    echo "<td>SAT</td>";
    echo "</tr>";

    $date = 1;

    for ($i = 0; $i < 6; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 7; $j++) {
            if ($i == 0 && $j < $FDWM) {
                echo "<td>&nbsp;</td>";
            } else {
                if ($date > 0 && $date <= $Days) {
                    echo "<td>$date</td>";
                } else {
                    echo "<td>&nbsp;</td>";
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