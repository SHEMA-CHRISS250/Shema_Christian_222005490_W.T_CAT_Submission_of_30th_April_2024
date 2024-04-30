<!--Shema_Christian_222005490-->
<!--Group One-->

<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the supplier ID is provided
    if (!empty($_POST['supplier_id_delete'])) {
        // Retrieve the supplier ID
        $supplier_id = $_POST['supplier_id_delete'];

        // Prepare SQL statement to delete the supplier
        $sql = "DELETE FROM supplier WHERE SupplierID = ?";

        // Prepare and bind parameter
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $supplier_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Supplier deleted successfully";
        } else {
            echo "Error deleting supplier: " . $conn->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Supplier ID is required";
    }
} else {
    echo "Error: Form data not submitted";
}

// Close connection
$conn->close();
?>
<!--Shema_Christian_222005490-->
<!--Group One-->

