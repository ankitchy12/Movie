<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    if (strpos($email, "@") !== false && strpos($email, ".") !== false && strpos($email, "@") != 0) {
        echo "Email format looks correct.";
    } else {
        echo "Email format incorrect (basic check).";
    }
}
?>
<form method="post">
    Enter Email: <input type="text" name="email" required>
    <input type="submit" value="Check">
</form>
