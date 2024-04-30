<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $quantity = $_POST['quantity'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];

    // Prepare SQL statement to insert supplier
    $sql = "INSERT INTO supplier (FirstName, LastName, Quantity, PhoneNumber, Email) VALUES (?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $first_name, $last_name, $quantity, $phone_number, $email);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Supplier added successfully";
    } else {
        echo "Error adding supplier: " . $conn->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Error: Form data not submitted";
}

// Close connection
$conn->close();
?>
