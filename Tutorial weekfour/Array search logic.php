<?php
$users = [
  ["email" => "ram@gmail.com"],
  ["email" => "sita@gmail.com"],
  ["email" => "hari@gmail.com"]
];

$newEmail = "sita@gmail.com"; // test value

$exists = false;
foreach ($users as $user) {
    if ($user["email"] === $newEmail) {
        $exists = true;
        break;
    }
}

echo $exists ? "Email already exists" : "Email available";
?>
