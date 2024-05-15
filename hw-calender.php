<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hw-calendar</title>
<style>
    .container{
    display: flex;
    background-color: #ccc;
    width: 100%;
    height: 400px;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
}
.item{
    width: 11%;
    height: 30px;
    background-color: pink;
    margin: 0 5px;
    text-align: center;
    padding-top: 20px;
    font-size: 10px;
}
.weekend{
    color: red;
}
.workday{
    color: black;
}
</style>
</head>
<body>
    <h1>萬年曆</h1>
    <br>
<div class="container">
    <!-- weekstart -->
    <div id="weekend" class="item">Sunday</div>
    <div id="workday" class="item">Monday</div>
    <div id="workday" class="item">Tuesday</div>
    <div id="workday" class="item">Wednesday</div>
    <div id="workday" class="item">Thursday</div>
    <div id="workday" class="item">Friday</div>
    <div id="weekend" class="item">Saturday</div>
    <!-- weekend -->

<?php
$year = date("Y");
$month = date("m");
$day = date("Y-m-d");

$firstDayOfMonth = strtotime("$year-$month-01");
$daysInMonth = date("t", $firstDayOfMonth);
$dayOfWeek = date("w", $firstDayOfMonth);
// Counter for day numbers
$dayNumber = 1;


// Loop to generate the calendar
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 7; $j++) {
        if ($i == 0 && $j < $dayOfWeek) {
            echo '<div class="item"></div>'; // Empty cells before the first day of the month
        } else {
            if ($dayNumber <= $daysInMonth) {
                // Determine the class for weekend/workday
                $class = ($j == 0 || $j == 6) ? "weekend" : "workday";
                echo '<div class="item ' . $class . '">' . $dayNumber . '</div>';
                $dayNumber++;
            } else {
                echo '<div class="item"></div>'; // Empty cells after the last day of the month
            }
        }
    }
}
echo '</div>';
?>
</body>
</html>