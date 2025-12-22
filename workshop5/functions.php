<?php
// Format name: capitalize first letters
function formatName($name) {
    return ucwords(trim($name));
}

// Validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Clean skills string into array
function cleanSkills($string) {
    $skills = explode(",", $string);
    $skills = array_map('trim', $skills);
    return array_filter($skills); // remove empty entries
}

// Save student info into students.txt
function saveStudent($name, $email, $skillsArray) {
    try {
        $line = $name . "|" . $email . "|" . implode(",", $skillsArray) . PHP_EOL;
        file_put_contents("students.txt", $line, FILE_APPEND | LOCK_EX);
        return true;
    } catch (Exception $e) {
        return false;
    }
}

// Upload portfolio file
function uploadPortfolioFile($file) {
    try {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("File upload error.");
        }

        $allowed = ['pdf','jpg','jpeg','png'];
        $maxSize = 2 * 1024 * 1024; // 2MB

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            throw new Exception("Invalid file type.");
        }

        if ($file['size'] > $maxSize) {
            throw new Exception("File too large.");
        }

        $newName = uniqid("portfolio_", true) . "." . $ext;
        $target = "uploads/" . $newName;

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            throw new Exception("Failed to move uploaded file.");
        }

        return $newName;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}
?>
