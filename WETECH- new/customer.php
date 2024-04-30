<!--Shema_Christian_222005490-->
<!--Group One-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Table</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            color: #333;
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
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Table</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: deepskyblue;
            background-position: center;
            color: black;
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
        <h1>Customer Table</h1>

        <?php
        // Database connection details
        $servername = "localhost";
        $username = "BIT";
        $password = "ShemaChriss@123";
        $dbname = "saloon_management_system";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to select all records from the customer table
        $sql = "SELECT * FROM customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data in a table
            echo "<table>";
            echo "<tr><th>Customer ID</th><th>Name</th><th>Email</th><th>Phone Number</th><th>Address</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["CustomerID"]."</td><td>".$row["Full_Name"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td><td>".$row["Address"]."</td></tr>";
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
<!--Shema_Christian_222005490-->
<!--Group One-->


