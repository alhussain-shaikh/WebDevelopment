<?php
// Replace with your actual database credentials
$host = "localhost";
$username = "root";
$password = "040703";
$dbname = "web";

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user input from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for comparison
$hashedPassword = md5($password); // Insecure! Use better hashing methods like bcrypt.

// Prepare and execute the SQL query to check user credentials
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$hashedPassword'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    echo "Login successful!";
    // Perform necessary actions after successful login
} else {
    echo "Invalid email or password.";
}

// Close the database connection
$conn->close();
?>
