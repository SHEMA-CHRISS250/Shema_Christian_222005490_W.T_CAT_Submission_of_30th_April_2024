<?php
// Assuming your database connection details
require_once "db_connection.php";

// Retrieve form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$time = $_POST['time'];
$service = $_POST['service'];
$notes = $_POST['notes'];

// Prepare SQL statement to insert data into appointment table
$sql_appointment = "INSERT INTO appointment (Full_Name, Email, Phone_Number, Appointment_Date, Appointment_Time, Selected_Service, Additional_Request)
        VALUES ('$fullname', '$email', '$phone', '$date', '$time', '$service', '$notes')";

// Insert the appointment data
if ($conn->query($sql_appointment) === TRUE) {
    echo "New appointment record created successfully<br>";
} else {
    echo "Error inserting appointment record: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
