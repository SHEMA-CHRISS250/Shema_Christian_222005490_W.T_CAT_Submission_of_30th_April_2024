<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $transaction_date = $_POST['TransactionDate'];
    $amount_paid = $_POST['AmountPaid'];
    $payment_method = $_POST['PaymentMethod'];
    $customer_id = $_POST['CustomerID'];

    // Prepare SQL statement to insert payment
    $sql = "INSERT INTO payment (TransactionDate, AmountPaid, PaymentMethod, CustomerID) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $transaction_date, $amount_paid, $payment_method, $customer_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Payment added successfully";
    } else {
        echo "Error adding payment: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
