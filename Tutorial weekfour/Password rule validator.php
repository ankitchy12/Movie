<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $errors = [];

    if (strlen($password) < 8) $errors[] = "Minimum 8 characters required.";
    if (!preg_match("/[0-9]/", $password)) $errors[] = "Must include at least one number.";
    if (!preg_match("/[^a-zA-Z0-9]/", $password)) $errors[] = "Must include at least one special character.";

    if (empty($errors)) {
        echo "<span style='color:green;'>Password is valid!</span>";
    } else {
        foreach ($errors as $err) {
            echo "<span style='color:red;'>$err</span><br>";
        }
    }
}
?>
<form method="post">
    Enter Password: <input type="password" name="password" required>
    <input type="submit" value="Validate">
</form>
