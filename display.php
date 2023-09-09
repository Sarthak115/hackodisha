<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the selected department, semester, and group from the form
    $selectedDepartment = $_POST["department"];
    $selectedSemester = $_POST["semester"];
    $selectedGroup = $_POST["group"];

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

    // Construct a SQL query to retrieve faculty based on user input
    $sql = "SELECT * FROM faculty1 WHERE department='$selectedDepartment' AND semester='$selectedSemester' AND grp='$selectedGroup'";

    // Execute the query
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    // Display the results in a table
    echo '<h2>Faculty List</h2>';
    if ($num > 0) {
        echo '<table border="1">';
        echo '<tr><th>Name</th><th>Department</th><th>Semester</th><th>Group</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><a href="rating1.php?name=' . urlencode($row['name']) . '">' . $row['name'] . '</a></td>';
            echo '<td>' . $row['department'] . '</td>';
            echo '<td>' . $row['semester'] . '</td>';
            echo '<td>' . $row['grp'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<script>
        alert("No faculty members found matching the criteria");
        window.location.href = "filter.html"; // Redirect to filter.html
    </script>';
        

    }

    // Close the database connection
    mysqli_close($conn);
}
?>
