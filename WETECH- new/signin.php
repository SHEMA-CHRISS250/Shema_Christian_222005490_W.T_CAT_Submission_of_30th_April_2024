<!--Shema_Christian_222005490-->
<!--Group One-->
<?php
// Start session
session_start();

// Database connection parameters
require_once "db_connection.php";

// Process sign-in form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query using prepared statement
    $sql = "SELECT * FROM customer WHERE Email=? AND Password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, set session variable
        $_SESSION["email"] = $email;
        // Redirect to dashboard or desired page
        header("Location: dashboard.php");
        exit();
    } else {
        // User not found or incorrect credentials
        echo "Invalid email or password. Please try again.";
    }
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!--Shema_Christian_222005490-->
<!--Group One-->
