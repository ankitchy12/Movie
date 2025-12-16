<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op = $_POST['operation'];

    switch ($op) {
        case "add": echo "Result: " . ($num1 + $num2); break;
        case "subtract": echo "Result: " . ($num1 - $num2); break;
        case "multiply": echo "Result: " . ($num1 * $num2); break;
        case "divide": 
            echo $num2 != 0 ? "Result: " . ($num1 / $num2) : "Cannot divide by zero!";
            break;
        default: echo "Invalid operation.";
    }
}
?>
<form method="post">
    Number 1: <input type="number" name="num1"><br>
    Number 2: <input type="number" name="num2"><br>
    Operation: 
    <select name="operation">
        <option value="add">Add</option>
        <option value="subtract">Subtract</option>
        <option value="multiply">Multiply</option>
        <option value="divide">Divide</option>
    </select><br>
    <input type="submit" value="Calculate">
</form>
