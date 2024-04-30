<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the stylist ID is provided
    if (!empty($_POST['stylist_id'])) {
        // Retrieve form data
        $stylist_id = $_POST['stylist_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];

        // Prepare SQL statement to update stylist details
        $sql = "UPDATE stylist SET FirstName=?, LastName=?, PhoneNumber=?, Email=? WHERE StylistID=?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $first_name, $last_name, $phone_number, $email, $stylist_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Stylist details updated successfully";
        } else {
            echo "Error updating stylist: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Stylist ID is required";
    }
} else {
    echo "No data submitted";
}

// Close connection
$conn->close();
?>
