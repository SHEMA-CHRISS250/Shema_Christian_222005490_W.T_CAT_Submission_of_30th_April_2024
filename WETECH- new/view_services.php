<!--Shema_Christian_222005490-->
<!--Group One-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Services</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightskyblue;
            color: #333;
        }
        /* Example styles for the table */
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
            display: block;
            width: fit-content;
        }
        .back-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Services Table</h1>

        <table>
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <?php
            // Assuming your database connection details
         require_once "db_connection.php";

            // SQL query to select all records from the services table
            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data in a table
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>".$row["ServiceID"]."</td><td>".$row["ServiceName"]."</td><td>".$row["Description"]."</td><td>".$row["Price"]."</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            $conn->close();
            ?>
        </table>

        <a class="back-button" href="index.html">Back</a>
    </div>
</body>
</html>
