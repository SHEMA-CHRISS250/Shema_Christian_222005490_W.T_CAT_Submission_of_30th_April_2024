
<!--Shema_Christian_222005490-->
<!--Group One-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments Table</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: deepskyblue;
            background-position: center;
            color: black; /* Set text color to white */
        }
        /* Example styles for the table */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
         }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            padding: 10px 20px;
            border: 1px solid #777; /* Border styles */
            border-radius: 5px; /* Rounded corners */
            text-decoration: none; /* Remove default link underline */
            color: #333; /* Button text color */
            background-color: #fff; /* Button background color */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition */
        }
        .back-button:hover {
            background-color: #eee; /* Hover background color */
            color: #555; /* Hover text color */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Appointments Table</h1>

        <?php
        // Include the database connection file
        require_once "db_connection.php";

        // Perform SQL query to retrieve appointments
        $sql = "SELECT * FROM appointment"; 
        $result = $conn->query($sql);

        // Check if there are any results
        if ($result === false) {
            echo "Error executing the SQL query: " . $conn->error;
        } else {
            // Check if there are any appointments
            if ($result->num_rows > 0) {
                // Output data in a table
                echo "<table>";
                echo "<tr><th>Full Name</th><th>Email</th><th>Phone Number</th><th>Appointment Date</th><th>Appointment Time</th><th>Selected Service</th><th>Additional Request</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["Full_Name"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Phone_Number"] . "</td>";
                    echo "<td>" . $row["Appointment_Date"] . "</td>";
                    echo "<td>" . $row["Appointment_Time"] . "</td>";
                    echo "<td>" . $row["Selected_Service"] . "</td>";
                    echo "<td>" . $row["Additional_Request"] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No appointments found.";
            }
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
<!--Shema_Christian_222005490-->
<!--Group One-->

