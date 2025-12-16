<?php
// Initialize variables
$name = $email = "";
$errors = [
    "name" => "",
    "email" => "",
    "password" => "",
    "confirm_password" => "",
    "file" => ""
];
$successMessage = "";

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Collect form data safely
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // -----------------------------
    // 1. VALIDATION
    // -----------------------------

    // Name validation
    if (empty($name)) {
        $errors["name"] = "Name is required.";
    }

    // Email validation
    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    // Password validation
    if (empty($password)) {
        $errors["password"] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors["password"] = "Password must be at least 6 characters.";
    } elseif (!preg_match("/[!@#$%^&*]/", $password)) {
        $errors["password"] = "Password must contain at least one special character.";
    }

    // Confirm password validation
    if (empty($confirm_password)) {
        $errors["confirm_password"] = "Please confirm your password.";
    } elseif ($password !== $confirm_password) {
        $errors["confirm_password"] = "Passwords do not match.";
    }

    // Check if any errors exist
    $hasErrors = false;
    foreach ($errors as $e) {
        if (!empty($e)) {
            $hasErrors = true;
            break;
        }
    }

    // -----------------------------
    // 2. PROCESS VALID DATA
    // -----------------------------
    if (!$hasErrors) {

        $filePath = "users.json";

        // Ensure JSON file exists
        if (!file_exists($filePath)) {
            file_put_contents($filePath, "[]");
        }

        // Read JSON file
        $jsonData = file_get_contents($filePath);
        $users = json_decode($jsonData, true);

        if ($users === null) {
            $errors["file"] = "Error reading user database.";
        } else {

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Create new user entry
            $newUser = [
                "name" => $name,
                "email" => $email,
                "password" => $hashedPassword
            ];

            // Add to array
            $users[] = $newUser;

            // Write back to JSON
            if (file_put_contents($filePath, json_encode($users, JSON_PRETTY_PRINT))) {
                $successMessage = "Registration successful!";
                // Clear form fields
                $name = $email = "";
            } else {
                $errors["file"] = "Error saving user data.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <style>
        .error { color: red; font-size: 14px; }
        .success { color: green; font-size: 16px; margin-bottom: 10px; }
        form { width: 350px; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; }
    </style>
</head>
<body>

<h2>User Registration</h2>

<?php if (!empty($successMessage)): ?>
    <div class="success"><?= $successMessage ?></div>
<?php endif; ?>

<form method="POST" action="">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">
    <div class="error"><?= $errors["name"] ?></div>

    <label>Email:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
    <div class="error"><?= $errors["email"] ?></div>

    <label>Password:</label>
    <input type="password" name="password">
    <div class="error"><?= $errors["password"] ?></div>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password">
    <div class="error"><?= $errors["confirm_password"] ?></div>

    <div class="error"><?= $errors["file"] ?></div>

    <br>
    <button type="submit">Register</button>
</form>

</body>
</html>
