<!--Shema_Christian_222005490-->
<!--Group One-->

<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the payment ID is provided
    if (!empty($_POST['payment_id_delete'])) {
        // Prepare SQL statement to delete payment
        $sql = "DELETE FROM payment WHERE PaymentID = ?";

        // Prepare and bind parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_POST['payment_id_delete']);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Payment deleted successfully";
        } else {
            echo "Error deleting payment: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Payment ID is required";
    }
}

// Close connection
$conn->close();
?>
<!--Shema_Christian_222005490-->
<!--Group One-->

