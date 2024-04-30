<!--Shema_Christian_222005490-->
<!--Group One-->
<?php
// Include the database connection file
require_once "db_connection.php";

// Debugging: Check if the database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful<br>";
}

// Retrieve form data
$servicename = $_POST['servicename'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';

// Debugging: Check if form data is retrieved correctly
var_dump($servicename, $description, $price);

// Prepare SQL statement to insert data into services table
$sql_service = "INSERT INTO services (ServiceName, Description, Price)
        VALUES ('$servicename', '$description', '$price')";

// Insert the service data
if ($conn->query($sql_service) === TRUE) {
    echo "New service record created successfully";
} else {
    echo "Error inserting service record: " . $conn->error;
}

// Close connection
$conn->close();
?>
<!--Shema_Christian_222005490-->
<!--Group One-->

