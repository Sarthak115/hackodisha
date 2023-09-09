<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected rating from the form
    $selectedRating = $_POST["rating"];

    // Get the faculty name from the URL parameter
    $facultyName = $_GET["name"];

    // Here, you can save the rating data to your database or perform other actions as needed

    // For this example, we'll simply display the name and rating
    echo "<h2>Rating Submitted</h2>";
    echo "<p>You have rated $facultyName with a rating of $selectedRating out of 5.</p>";
}
?>
