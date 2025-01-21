<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    // Here, you would typically check if the email exists in your database
    // and generate a password reset token to send to the user's email.

    // For demonstration purposes, we will assume the email exists and send a reset link.
    $resetToken = bin2hex(random_bytes(16)); // Generate a random token
    $resetLink = "https://yourwebsite.com/reset_password.php?token=$resetToken";

    // In a real application, you'd use your own SMTP configuration here
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: $resetLink";
    $headers = "From: no-reply@yourwebsite.com";

    if (mail($email, $subject, $message, $headers)) {
        echo "An email has been sent to your email address with instructions to reset your password.";
    } else {
        echo "Failed to send email. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form id="forgot-password-form" action="forgot_password.php" method="POST" onsubmit="return validateForm()">
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Submit">
        </form>
        <p id="error-message"></p>
    </div>
	
    <script src="script.js">
		function validateForm() {
    const email = document.getElementById('email').value;
    const errorMessage = document.getElementById('error-message');

    // Basic email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailPattern.test(email)) {
        errorMessage.textContent = "Please enter a valid email address.";
        return false;
    }

    return true;
}


	</script>
</body>
</html>
