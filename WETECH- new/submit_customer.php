<?php
// Database connection details
 require_once "db_connection.php";

// Prepare SQL statement to insert a new record into the customer table
$sql = "INSERT INTO customer (Full_Name, Email, Phone_Number, Address, Password)
        VALUES (?, ?, ?, ?, ?)";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $full_name, $email, $phone_number, $address, $password);

    // Set parameters and execute
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
