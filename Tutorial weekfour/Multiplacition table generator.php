<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num = $_POST['number'];
    echo "<h3>Multiplication Table of $num</h3>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$num x $i = " . ($num * $i) . "<br>";
    }
}
?>
<form method="post">
    Enter a number: <input type="number" name="number" required>
    <input type="submit" value="Generate">
</form>
