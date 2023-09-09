<?php
// Check if the name parameter is set in the URL
if (isset($_GET["name"])) {
    // Get the faculty name from the URL
    $facultyName = $_GET["name"];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Initialize variables for sum and count
        $sum = 0;
        $count = 0;

        // Calculate the sum of all dropdown values
        for ($i = 1; $i <= 6; $i++) { // Assuming there are 6 dropdowns
            $dropdownName = "education" . $i;
            if (isset($_POST[$dropdownName]) && is_numeric($_POST[$dropdownName])) {
                $sum += intval($_POST[$dropdownName]);
                $count++;
            }
        }

        // Calculate the average
        if ($count > 0) {
            $average = $sum / $count;

            // Database connection settings
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "cgu";

            // Create a connection
            $conn = mysqli_connect($servername, $username, $password, $database);

            // Check the connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Construct an SQL query to insert the rating into the database
            $sql = "INSERT INTO ratings (faculty_name, education_rating) VALUES ('$facultyName', $average)";
            // Add more columns and ratings as needed

            // Execute the query
            if (mysqli_query($conn, $sql)) {
                echo '<script>
                    alert("Rating Submitted Successfully");
                    window.location.href = "filter.html"; // Redirect to filter.html
                </script>';
            } else {
                echo '<h2>Error: ' . mysqli_error($conn) . '</h2>';
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo '<h2>Error: No valid ratings submitted.</h2>';
        }
    }
} else {
    echo '<h2>Error: Faculty name not provided.</h2>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Your+Font+Here">
    <style>
        /* Your CSS styles here */
        body {
            font-family: 'Your Font Here', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Header Styles */
        header {
            background-color: #007BFF;
            padding: 16px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        header h1 {
            color: #fff;
            font-family: Arial, sans-serif;
            font-weight: 200;
            font-size: 28px;
        }

        /* Form Styles */
        .container {
            max-width: 90%;
            height: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border: 3px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            font-size: 18px;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: #007BFF;
        }

        /* Rating Labels */
        .rating-label {
            font-style: italic;
            color: #555;
        }

        /* Submit Button */
        #submit-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #submit-button:hover {
            background-color: #0056b3;
        }

        /* Footer Styles */
        footer {
            text-align: center;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Rate The Faculty</h1>
    </header>
    <div class="container">
        <form id="rating-form" method="post">
             <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Faculty interaction with students:</label>
                <select id="education1" name="education1" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Teaching quality:</label>
                <select id="education2" name="education2" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Providing materials:</label>
                <select id="education3" name="education3" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Concept clearance:</label>
                <select id="education4" name="education4" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Teaching style:</label>
                <select id="education5" name="education5" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <!-- Add more rating factors here -->
            <div class="form-group">
                <label class="rating-label">Behaviour and nature of faculty towards students:</label>
                <select id="education6" name="6" required>
                    <option value="1"> select</option>
                    <option value="2">1 Average</option>
                    <option value="3">2 Good</option>
                    <option value="4">3 Better</option>
                    <option value="5">4 Best</option>
                    <option value="6">5 Excellent</option>
                </select>
            </div>
            <input type="hidden" id="education" name="education" value="0">
            <div class="form-group">
                <button type="submit" id="submit-button">Submit Rating</button>
            </div>
        </form>
    </div>
    <footer>&copy; Copyright@2k23</footer>
</body>
</html>
