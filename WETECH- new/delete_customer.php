<!--Shema_Christian_222005490-->
<!--Group One-->

<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the customer ID is provided
    if (!empty($_POST['customer_id_delete'])) {
        // Sanitize input to prevent SQL injection
        $customer_id = $_POST['customer_id_delete'];

        // Prepare SQL statement to delete customer
        $sql = "DELETE FROM customer WHERE CustomerID = ?";

        // Prepare and bind parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $customer_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Customer deleted successfully";
        } else {
            echo "Error deleting customer: " . $conn->error;
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
<!--Shema_Christian_222005490-->
<!--Group One-->

