<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $age = trim($_POST['age']);
    $contact = trim($_POST['contact']);

    if ($name && $age && $contact) {
        echo "<h3>User Info Preview</h3>";
        echo "Name: $name <br> Age: $age <br> Favorite Language: $contact";
    } else {
        echo "<span style='color:red;'>All fields are required!</span>";
    }
}
?>
<form method="post">
    Name: <input type="text" name="name"><br>
    Age: <input type="number" name="age"><br>
    contact: <input type="integer" name="contact"><br>
    <input type="submit" value="Preview">
</form>
