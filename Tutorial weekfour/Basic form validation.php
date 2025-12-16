<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['fullname']);
    $email = trim($_POST['email']);

    if (empty($fullName) || empty($email)) {
        echo "<span style='color:red;'>Error: All fields are required!</span>";
    } else {
        echo "<span style='color:green;'>All good!</span>";
    }
}
?>
<form method="post">
    Full Name: <input type="text" name="fullname"><br>
    Email: <input type="email" name="email"><br>
    <input type="submit" value="Submit">
</form>
