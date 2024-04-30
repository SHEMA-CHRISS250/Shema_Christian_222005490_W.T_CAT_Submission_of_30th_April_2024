<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the customer ID is provided
    if (!empty($_POST['customer_id'])) {
        // Prepare SQL statement to update customer details
        $sql = "UPDATE customer SET Full_Name=?, Email=?, Address=?, Password=? WHERE CustomerID=?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $Full_Name, $Email, $Address, $Password, $CustomerID);

        // Set parameters and execute
        $Full_Name = $_POST['Full_Name'];
        $Email = $_POST['Email'];
        $Address = $_POST['Address']; // Add address field
        $Password = $_POST['Password'];
        $CustomerID = $_POST['customer_id']; // Corrected variable name

        if ($stmt->execute()) {
            echo "Customer details updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Customer ID is required";
    }
}

// Close connection
$conn->close();
?>
