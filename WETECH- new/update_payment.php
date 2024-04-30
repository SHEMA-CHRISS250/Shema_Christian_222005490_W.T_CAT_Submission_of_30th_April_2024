<?php
// Include the database connection file
require_once "db_connection.php";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the payment ID is provided
    if (!empty($_POST['payment_id'])) {
        // Retrieve form data
        $transaction_date = $_POST['TransactionDate'];
        $amount_paid = $_POST['AmountPaid'];
        $payment_method = $_POST['PaymentMethod'];

        // Prepare SQL statement to update payment details
        $sql = "UPDATE payment SET TransactionDate=?, AmountPaid=?, PaymentMethod=? WHERE PaymentID=?";

        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $transaction_date, $amount_paid, $payment_method, $_POST['payment_id']);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Payment details updated successfully";
        } else {
            echo "Error updating payment details: " . $conn->error;
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
