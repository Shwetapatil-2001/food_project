<?php
// Database credentials
$servername = "localhost";  // Change if your host is different
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "food";           // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the SQL delete query
    $sql = "DELETE FROM customer WHERE id = ?";

    // Prepare the statement to avoid SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); // Bind the customer id to the statement

    if ($stmt->execute()) {
        // If deletion is successful, redirect back to the customers list with a success message
        header("Location: user-count.php?message=Customer deleted successfully");
        

    } else {
        // If deletion fails, redirect back with an error message
        header("Location: customer_list.php?error=Error deleting customer");
    }

    $stmt->close();
} else {
    // If no 'id' parameter is provided, redirect back with an error message
    header("Location: customer_list.php?error=Invalid request");
}

// Close the connection
$conn->close();
?>
