<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the supplier ID is provided
    if (!empty($_POST['supplier_id_update'])) {
        // Retrieve form data
        $supplier_id = $_POST['supplier_id_update'];
        $first_name = !empty($_POST['first_name_update']) ? $_POST['first_name_update'] : null;
        $last_name = !empty($_POST['last_name_update']) ? $_POST['last_name_update'] : null;
        $quantity = !empty($_POST['quantity_update']) ? $_POST['quantity_update'] : null;
        $phone_number = !empty($_POST['phone_number_update']) ? $_POST['phone_number_update'] : null;
        $email = !empty($_POST['email_update']) ? $_POST['email_update'] : null;

        // Prepare SQL statement to update supplier details
        $sql = "UPDATE supplier SET ";
        $params = array();

        if ($first_name !== null) {
            $sql .= "FirstName = ?, ";
            $params[] = &$first_name;
        }
        if ($last_name !== null) {
            $sql .= "LastName = ?, ";
            $params[] = &$last_name;
        }
        if ($quantity !== null) {
            $sql .= "Quantity = ?, ";
            $params[] = &$quantity;
        }
        if ($phone_number !== null) {
            $sql .= "PhoneNumber = ?, ";
            $params[] = &$phone_number;
        }
        if ($email !== null) {
            $sql .= "Email = ?, ";
            $params[] = &$email;
        }

        // Remove the trailing comma and space
        $sql = rtrim($sql, ", ");

        // Add WHERE clause for SupplierID
        $sql .= " WHERE SupplierID = ?";

        // Bind parameters
        $types = str_repeat("s", count($params)) . "i";
        array_unshift($params, $types);
        $params[] = &$supplier_id;

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        call_user_func_array(array($stmt, "bind_param"), $params);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Supplier details updated successfully";
        } else {
            echo "Error updating supplier: " . $conn->error;
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
