<?php
// Print your name
echo "Name: Ankit Chaudhary<br>";

// Print today's date in YYYY-MM-DD format
echo "Today's Date: " . date("Y-m-d") . "<br>";

// Get the current hour (24-hour format)
$currentHour = date("H");

// Determine whether it's morning, afternoon, or evening
if ($currentHour >= 5 && $currentHour < 12) {
    echo "It is Morning.";
} elseif ($currentHour >= 12 && $currentHour < 17) {
    echo "It is Afternoon.";
} else {
    echo "It is Evening.";
}
?>
