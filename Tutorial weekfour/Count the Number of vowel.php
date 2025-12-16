<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sentence = strtolower($_POST['sentence']);
    $vowels = ['a','e','i','o','u'];
    $count = 0;
    for ($i = 0; $i < strlen($sentence); $i++) {
        if (in_array($sentence[$i], $vowels)) {
            $count++;
        }
    }
    echo "Sentence: $sentence <br> Vowel Count: $count";
}
?>
<form method="post">
    Enter a sentence: <input type="text" name="sentence" required>
    <input type="submit" value="Count Vowels">
</form>
