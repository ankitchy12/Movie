<?php 
include("header.php"); 
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = uploadPortfolioFile($_FILES['portfolio']);
    if (strpos($result, "portfolio_") === 0) {
        echo "<p style='color:green;'>File uploaded successfully: $result</p>";
    } else {
        echo "<p style='color:red;'>Error: $result</p>";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    Select file (PDF, JPG, PNG, max 2MB): 
    <input type="file" name="portfolio" required><br><br>
    <input type="submit" value="Upload">
</form>

<?php include("footer.php"); ?>
