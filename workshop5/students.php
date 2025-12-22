<?php 
include("header.php"); 
include("functions.php");

if (file_exists("students.txt")) {
    $lines = file("students.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<h2>Registered Students</h2>";
    echo "<ul>";
    foreach ($lines as $line) {
        list($name, $email, $skills) = explode("|", $line);
        $skillsArray = explode(",", $skills);
        echo "<li><strong>$name</strong> ($email)<br>Skills: " . implode(", ", $skillsArray) . "</li><br>";
    }
    echo "</ul>";
} else {
    echo "<p>No students found.</p>";
}

include("footer.php"); 
?>
