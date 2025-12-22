<?php 
include("header.php"); 
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = formatName($_POST['name']);
    $email = $_POST['email'];
    $skills = $_POST['skills'];

    if (!validateEmail($email)) {
        echo "<p style='color:red;'>Invalid email address.</p>";
    } else {
        $skillsArray = cleanSkills($skills);
        if (saveStudent($name, $email, $skillsArray)) {
            echo "<p style='color:green;'>Student saved successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error saving student.</p>";
        }
    }
}
?>

<form method="post">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Skills (comma-separated): <input type="text" name="skills" required><br><br>
    <input type="submit" value="Save Student">
</form>

<?php include("footer.php"); ?>
