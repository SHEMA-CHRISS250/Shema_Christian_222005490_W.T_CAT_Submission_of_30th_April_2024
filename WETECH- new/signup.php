<!--Shema_Christian_222005490-->
<!--Group One-->
<?php
// Database connection parameters
require_once "db_connection.php";
// Process sign-up form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST["address"];
    $password = $_POST["password"];

    // SQL query to insert new customer record
    $sql = "INSERT INTO customer (Full_Name, Email, Phone_Number, Address, Password)
            VALUES ('$full_name', '$email', '$phone_number', '$address', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to signup page with success parameter
        header('Location: signup.html?success=true');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
