<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($name && $email && $pass && $confirm && $pass === $confirm) {
        $strength = (strlen($pass) >= 8 && preg_match("/[0-9]/", $pass) && preg_match("/[^a-zA-Z0-9]/", $pass)) ? "Strong" : "Weak";
        echo "<h3>Registration Preview:</h3>";
        echo "Name: $name <br>Email: $email <br>Password Strength: $strength";
    } else {
        echo "<span style='color:red;'>Validation failed. Please check inputs.</span>";
    }
}
?>
<form method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password"><br>
    Confirm Password: <input type="password" name="confirm"><br>
    <input type="submit" value="Preview">
</form>
