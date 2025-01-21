<?php
// Start session
session_start();

// Check if customer ID is set in the session
if (!isset($_SESSION['customer_id'])) {
    die("Customer is not logged in. Please log in to view your order history.");
}

// Database connection
$servername = "localhost";
$username = "root"; // change to your DB username
$password = ""; // change to your DB password
$dbname = "food"; // change to your DB name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve customer ID from session
$customer_id = $_SESSION['customer_id']; // Now this should be properly set

// Fetch order history for the logged-in customer
$sql = "SELECT order_id, order_date, total_amount, status FROM view_orders WHERE customer_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $customer_id); // Bind the customer_id parameter
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<h3>Your Order History</h3>";
    echo "<table border='1'>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>";
    // Display order history in a table
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['order_id'] . "</td>
                <td>" . $row['order_date'] . "</td>
                <td>" . $row['total_amount'] . "</td>
                <td>" . $row['status'] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "No order history available.";
}

// Close connection
$conn->close();
?>
