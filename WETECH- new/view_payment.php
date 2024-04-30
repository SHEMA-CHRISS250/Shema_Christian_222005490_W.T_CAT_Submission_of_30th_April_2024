<?php
// Include the database connection file
require_once "db_connection.php";

// Retrieve payments from the database
$sql = "SELECT * FROM payment";
$result = $conn->query($sql);

// Check if the query executed successfully
if ($result === false) {
    echo "Error executing the SQL query: " . $conn->error;
} else {
    // Check if there are any payments
    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<div class='container'>";
        echo "<table border='1'>";
        echo "<tr><th>Payment ID</th><th>Transaction Date</th><th>Amount Paid</th><th>Payment Method</th><th>Customer ID</th></tr>"; // Table header
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["PaymentID"] . "</td>";
            echo "<td>" . $row["TransactionDate"] . "</td>";
            echo "<td>" . $row["AmountPaid"] . "</td>";
            echo "<td>" . $row["PaymentMethod"] . "</td>";
            echo "<td>" . $row["CustomerID"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "No payments found.";
    }
}

// Close the database connection
$conn->close();
?>
