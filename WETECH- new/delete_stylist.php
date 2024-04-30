<!--Shema_Christian_222005490-->
<!--Group One-->

<?php
// Include the database connection file
require_once "db_connection.php";

// Initialize message variable
$message = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the stylist ID is provided
    if (!empty($_POST['stylist_id'])) {
        // Sanitize input to prevent SQL injection
        $stylist_id = $_POST['stylist_id'];

        // Prepare SQL statement to delete stylist
        $sql = "DELETE FROM stylist WHERE StylistID = ?";

        // Prepare and bind parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $stylist_id);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Stylist deleted successfully";
        } else {
            $message = "Error deleting stylist: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        $message = "Stylist ID is required";
    }
}

// Close connection
$conn->close();

// Output message
echo $message;
?>
<!--Shema_Christian_222005490-->
<!--Group One-->
