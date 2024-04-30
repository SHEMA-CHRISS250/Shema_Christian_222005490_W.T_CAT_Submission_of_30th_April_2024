<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylists Table</title>
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
        
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .back-button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 20px;
            margin-bottom: 20px;
            display: block; /* Ensure it's displayed as a block element */
            width: fit-content; /* Adjust width based on content */
        }
        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Stylists Table</h1>

        <?php
// Database connection details
require_once "db_connection.php";

// SQL query to select all records from the stylists table
$sql = "SELECT * FROM Stylists";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data in a table
    echo "<table>";
    echo "<tr><th>Stylist ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["StylistID"]."</td>";
        echo "<td>".$row["FirstName"]."</td>";
        echo "<td>".$row["LastName"]."</td>";
        echo "<td>".$row["PhoneNumber"]."</td>";
        echo "<td>".$row["Email"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<a class="back-button" href="index.html">Back</a>
</div>
</body>
</html>
