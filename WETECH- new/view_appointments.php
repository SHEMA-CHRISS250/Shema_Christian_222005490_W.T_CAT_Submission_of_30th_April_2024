<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve appointments from the database
$sql = "SELECT * FROM appointments";
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any appointments
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<div class='container'>";
        echo "<table border='1'>";
        echo "<tr><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Appointment Date</th><th>Appointment Time</th><th>Selected Service</th><th>Additional Request</th></tr>"; // Table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Full_Name"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Phone_Number"] . "</td>";
            echo "<td>" . $row["Appointment_Date"] . "</td>";
            echo "<td>" . $row["Appointment_Time"] . "</td>";
            echo "<td>" . $row["Selected_Service"] . "</td>";
            echo "<td>" . $row["Additional_Request"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No appointments found.";
    }
}

// Close the database connection
$conn->close();
?>
