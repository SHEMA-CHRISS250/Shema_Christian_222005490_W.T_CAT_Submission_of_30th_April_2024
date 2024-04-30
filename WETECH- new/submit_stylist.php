<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['FirstName'];
    $last_name = $_POST['LastName'];
    $phone_number = $_POST['PhoneNumber'];
    $email = $_POST['Email'];

    // Prepare SQL statement to insert stylist
    $sql = "INSERT INTO stylist (FirstName, LastName, PhoneNumber, Email) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $phone_number, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Stylist added successfully";
    } else {
        echo "Error adding stylist: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
