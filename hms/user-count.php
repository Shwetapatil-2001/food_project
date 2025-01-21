<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 18px;
            text-align: center;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
        }
        .action-buttons a {
            margin: 0 5px;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .action-buttons a.delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Total Number of Customers</h1>
        <?php
        // Database credentials
        $servername = "localhost";  // Change if your host is different
        $username = "root";         // Your database username
        $password = "";             // Your database password
        $dbname = "food";  // Your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to count the total number of users
        $sql = "SELECT COUNT(*) AS total_users FROM customer";
        $result = $conn->query($sql);

        // Check if the query was successful
        if ($result->num_rows > 0) {
            // Fetch the result as an associative array
            $row = $result->fetch_assoc();
            echo "<p>Customer Count: " . $row['total_users'] . "</p>";
        } else {
            echo "<p>No users found.</p>";
        }

        // SQL query to fetch customer data
        $sql = "SELECT id,username,password FROM customer";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Username</th><th>Password</th><th>Action</th></tr>";

            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["username"] . "</td>
                        <td>" . $row["password"] . "</td>
                        <td class='action-buttons'>
                            <a href='delete_customer.php?id=" . $row["id"] . "' class='delete' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>
                        </td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No customer data found.</p>";
        }

        // Close the connection
        $conn->close();
        ?>
    </div>
</body>
</html>
