<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST['word'];
    $reversed = "";
    for ($i = strlen($word) - 1; $i >= 0; $i--) {
        $reversed .= $word[$i];
    }
    echo "Original: $word <br> Reversed: $reversed";
}
?>
<form method="post">
    Enter a word: <input type="text" name="word" required>
    <input type="submit" value="Reverse">
</form>
